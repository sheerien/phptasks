<?php

define('SESSION_SAVE_PATH',dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions');

class appSessionHandler extends SessionHandler {

    // This My Session Property
    private $sessionName        = 'MY_APP_SESSION';  // Session Name
    private $sessionMaxLifeTime = 0;  // Session Life Time
    private $sessionSSL         = false;  // Session SSL
    private $sessionHTTPOnly    = true;  // Session HTTP
    private $sessionPath        = '/';  // Path That Session Is Allow For and any sub Folder
    private $sessionDomain      = 'localhost'; // Session Domain (.) any Sub Domain in (mydev.net)
    private $sessionSavePath    = SESSION_SAVE_PATH;  // Session Save Path

    private $timeToLife  = 1;

    private $sessionCipherAlgo     = 'aes-256-cbc-hmac-sha256';  // Session Cipher Algorithm For Encrypt Session
    private $sessionCipherKey      = 'WYCRYPT0K3Y@2021';  // Session Cipher Key For Encrypt Session

    public function __construct(){

        ini_set('session.use_cookies',1);  // This Is For Check That Session Use Cookies
        ini_set('session.use_only_cookies',1);  // This Is For Check That Session Use Only Cookies
        ini_set('session.use_trans_sid',0);  // This Is For Prevent Any Access For Session From URL
        ini_set('session.save_handler','files');  // This Is For Check That Save Handler Is Files

        session_name($this->sessionName);  // New Session Name
        session_save_path($this->sessionSavePath);  // New Save Path For Session

        // Set Session Cookie Parameters For My Session
        session_set_cookie_params(
            $this->sessionMaxLifeTime,$this->sessionPath,
            $this->sessionDomain,$this->sessionSSL,
            $this->sessionHTTPOnly
        );

        session_set_save_handler($this,true);
    }

    public function __get($key){
        return $_SESSION[$key] != false ? $_SESSION[$key] : false;
    }

    public function __set($key , $value){
        return $_SESSION[$key] = $value;
    }

    public function __isset($key){
        return isset($_SESSION[$key]) ? true : false;
    }

     public function read($id)
    {
        if (parent::read($id) === '')
            return parent::read($id);
        return openssl_decrypt(parent::read($id), $this->sessionCipherAlgo, $this->sessionCipherKey);
    }

    public function write($id , $data)
    {
        return parent::write($id,openssl_encrypt($data,$this->sessionCipherAlgo,$this->sessionCipherKey)); // TODO: Change the autogenerated stub
    }

    // This Function To Start Session
    public function start(){
        if (session_id() === ''){
            if (session_start()){
                $this->setSessionStartTime();
                $this->checkSessionValidity();
            }
        }
    }

    public function setSessionStartTime(){
        if (!isset($this->sessionStartTime)){
            $this->sessionStartTime = time();
        }
    }

    public function checkSessionValidity(){
        if ((time() - $this->sessionStartTime) > ($this->timeToLife * 60)){
            $this->renewSession();
            $this->generateFingerPrint();
        }
        return true;
    }

    public function renewSession(){
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }

    public function kill(){
        session_unset();

        setcookie(
            $this->sessionName,'',time() - 1000,
            $this->sessionPath,$this->sessionDomain,
            $this->sessionSSL,$this->sessionHTTPOnly
        );

        session_destroy();
    }

    // Generate FingerPrint
    private function generateFingerPrint(){
        $userAgentId = $_SERVER['HTTP_USER_AGENT'];
        $this->cipherKey = openssl_random_pseudo_bytes(32);
        $sessionId = session_id();
        $this->fingerPrint = sha1($userAgentId . $this->cipherKey . $sessionId);
    }

    // Check FingerPrint Is Valid Or Not
    public function isValidFingerPrint(){
        if (!isset($this->fingerPrint)){
            $this->generateFingerPrint();
        }

        $fingerPrint = sha1($_SERVER['HTTP_USER_AGENT'] . $this->cipherKey . session_id());

        if ($fingerPrint === $this->fingerPrint){
            return true;
        }

        return false;
    }
}

$session = new appSessionHandler();
$session->start();