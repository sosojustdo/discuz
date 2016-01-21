<?php
/**
 * Created by PhpStorm.
 * User: daipeng
 * Date: 2015/3/31
 * Time: 0:19
 */

#online
#http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin

#e.dangdang.com:8088
#http%3A%2F%2Fe.dangdang.com%3A8088%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin

#test
#http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin
#http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin

#$url = "http://e.dangdang.com/bbs/member.php?mod=logging&action=login";
#echo urlencode($url);

function getRandChar($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol)-1;
    for($i=0;$i<$length;$i++){
        $str.=$strPol[rand(0,$max)];
    }
    return $str;
}
#echo getRandChar(10);

/**
$con = mysql_connect("127.0.0.1","root","dangdang");
if(!$con)
{
    echo "Could not connect:".mysql_error();
}else{
    echo "Connect MySql Success!";
}**/


echo  phpinfo();

