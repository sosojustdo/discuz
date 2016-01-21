<?php
/**
 * Created by PhpStorm.
 * User: daipeng
 * Date: 2015/4/17
 * Time: 16:41
 */

#define('IN_DISCUZ', true);

require 'define_const.php';
#require '../source/function/function_core.php';

/**
 * @description 根据seesionID获取当当用户
 * @param $sessionID
 * @param string $method
 * @return mixed
 * @throws Exception
 */
function getDangDangUser($sessionID, $method='GET'){
    $params = array('sessionID'=>$sessionID,
        'isFromBD'=>'0',
        'appkey'=>APP_KEY,
        'result_format'=>'json',
        'platform'=>'php');

    $url = SESSION_ID_VERIFY_LOGIN_STATUS;
    if(strtoupper($method) == 'GET'){
        $url = $url.http_build_query($params);
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    if(strtoupper($method) == 'POST'){
        curl_setopt($curl, CURLOPT_POST, 1);
        if(!empty($params)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }
    }

    curl_setopt($curl, CURLOPT_TIMEOUT, HTTP_REQUEST_MAX_TIMEOUT);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    #以流的形式返回数据
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    if ($error) {
        throw new Exception('请求发生错误：' . $error);
    }
    return $result;
}

/**
 * cookie 获取session id
 * @return string
 */
function getSessionId(){
    return $_COOKIE["sessionID"];
}

/**
 * 获取请求ip
 * @return array|string
 */
function getIP(){
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}





