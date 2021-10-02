<?php

function fetchData($url)
{
    $init = curl_init();

    curl_setopt($init,CURLOPT_URL,$url );
    curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($init);

if ($e = curl_error($init))
    {
        curl_close($init);
        return $e;
    }
    else {
        $result = json_decode($resp, true);
        $data = $result;
        curl_close($init);
        return $data;
    }
    
}