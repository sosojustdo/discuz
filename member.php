<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: member.php 34253 2013-11-25 03:36:23Z nemohou $
 */
define("ROOT", dirname(__FILE__));

define('APPTYPEID', 0);
define('CURSCRIPT', 'member');
define('IN_UC', TRUE);

require './dangdang/dangdang.php';
require './source/class/class_core.php';
require './uc_client/control/dduser.php';

$discuz = C::app();

$modarray = array('activate', 'emailverify', 'getpasswd',
	'groupexpiry', 'logging', 'lostpasswd',
	'register', 'regverify', 'switchstatus');


$mod = !in_array($discuz->var['mod'], $modarray) && (!preg_match('/^\w+$/', $discuz->var['mod']) || !file_exists(DISCUZ_ROOT.'./source/module/member/member_'.$discuz->var['mod'].'.php')) ? 'register' : $discuz->var['mod'];

define('CURMODULE', $mod);

$discuz->init();
if($mod == 'register' && $discuz->var['mod'] != $_G['setting']['regname']) {
	showmessage('undefined_action');
}elseif($mod == 'logging' && empty($_GET['infloat']) && empty($_GET['inajax']) ){
    $action = $_GET['action'];
    $sessionID = getSessionId();
    if(!empty($sessionID) && $_GET['action'] == 'login'){
        $user_json = getDangDangUser($sessionID);
        $params_array = handlerLoginUser($user_json);
        #将sessionID放入参数数组
        $params_array['sessionID'] = $sessionID;
        #设置行为类型
        $params_array['action'] = 'login';
        #设置当当登录用户默认密码
        $params_array['password'] = DEFAULT_PASSWORD;
        setParameters($params_array);
    }
}

/**
 * 处理当当用户登录
 * @param $user_json
 */
function handlerLoginUser($user_json){
    $array = array();
    if(!empty($user_json)) {
        $user_array = json_decode($user_json);
        $statusCode = $user_array->statusCode;
        $errorCode = $user_array->errorCode;
        #成功获取用户信息
        if($statusCode == 0 && $errorCode == 0){
            $customerid = $user_array->customerid;
            $nickname = "";
            if(array_key_exists("nickname", $user_array)){
                $nickname = $user_array->nickname;
            }
            $mobilephone = "";
            if(array_key_exists("mobilephone", $user_array)){
                $mobilephone = $user_array->mobilephone;
            }
            $email = $user_array->email;
            $ddusercontrol =  new ddusercontrol();
            $username = $ddusercontrol->process_dd_login($customerid, $nickname, $mobilephone, $email);
            $array['username'] = $username;
        }else{
            header("Location:https://login.dangdang.com/signin.aspx?returnurl=http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin");
            exit;
        }
    }
    return $array;
}

function setParameters($params_array){
    if(!empty($params_array)){
        $_GET['username'] = $params_array['username'];
        $_GET['password'] = $params_array['password'];
        $_GET['sessionID'] = $params_array['sessionID'];
        $_GET['action'] = $params_array['action'];
    }
}


require libfile('function/member');
require libfile('class/member');
runhooks();

require DISCUZ_ROOT.'./source/module/member/member_'.$mod.'.php';

