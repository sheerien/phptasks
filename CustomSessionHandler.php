<?php
define('SESSION_SAVE_PATH', dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions');
class CustomSessionHandler extends SessionHandler
{
    // session properties;

    private string $sessionName = 'HDLRSESS';
    private int $sessionMaxLifetime = 0;
    private string $sessionPath = '/';
    private string $sessionSavePath = SESSION_SAVE_PATH;
    private string $sessionDomain = 'localhost';
    private bool $sessionSSL = false;
    private bool $sessionHTTPOnly = true;

    // unset time cookie property

    private int $unsetTimeCookie = 1000;
    private string $cookieContentName = '';


    // cipher properties

    private string $sessionCipherAlgo = 'aes-256-cbc';
    private string $sessionCipherKey = 'r(@F_R=ee#B$a%B!a^j)';
    private string $sessionCipherIv = '1234567812345678';

    private int $time_to_live = 1;

    /**
     * override a few directives php.ini And set a few session functionality
     */
    public function __construct()
    {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');

        session_name($this->sessionName);
        session_save_path($this->sessionSavePath);
        // Responsible for the handler is this object;
        // To carry out the operations of opening, writing and reading through this object
        session_set_save_handler($this, true);
        
        session_set_cookie_params(
            $this->sessionMaxLifetime,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
    }

    public function __set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public function __get($key)
    {
        return $_SESSION[$key] != false ? $_SESSION[$key] : false;
    }

    public function __isset($key){
        return isset($_SESSION[$key]) ? true : false;
    }
    /**
     * is called function run session_start();
     * @return void
     */

    public function sessionStart()
    {
        if(session_id() === '')
        {
            if(session_start()){
                $this->setSessionStartTime();
                $this->checkSessionValidity();
            }
            
        }
    }

    private function setSessionStartTime()
    {
        if(!isset($this->sessionStartTime)){
            $this->sessionStartTime = time();
        }
        return true;
    }

    private function checkSessionValidity()
    {
        if((time()-$this->sessionStartTime ) > ($this->time_to_live *60)){
            $this->renewSession();
        }
        return true;
    }

    private function renewSession()
    {
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }


    public function read($id)
    {
        return parent::read($id);
    }

    public function write($id, $data)
    {
        return parent::write($id, $data);
    }

    public function killSession()
    {
        // session_unset();
        session_destroy();
        setcookie(
            $this->sessionName,$this->cookieContentName,
            time() - $this->unsetTimeCookie, $this->sessionPath, 
            $this->sessionDomain, $this->sessionSSL,
            $this->sessionHTTPOnly
        );
    
    }

    // /**
    //  * Summary of read
    //  * @param mixed $id
    //  * @return void
    //  */
    // public function read($id):string|bool
    // {
    //     // return $this->decryptedData(parent::read($id));
    //     return openssl_decrypt(parent::read($id), $this->sessionCipherAlgo, $this->sessionCipherKey, 0, $this->sessionCipherIv);
    // }

    // /**
    //  * Summary of write
    //  * @param mixed $id
    //  * @param mixed $data
    //  * @return void
    //  */
    // public function write($id, $data):bool
    // {
    //     // $encryptData = $this->encryptedData($data);
    //     return parent::write($id, openssl_encrypt($data,$this->sessionCipherAlgo,$this->sessionCipherKey,0,$this->sessionCipherIv )); 
    // }

}

$session = new CustomSessionHandler();
// var_dump($session);

$session->sessionStart();
$session->killSession();

// echo date("H:i:s",$session->sessionStartTime);

