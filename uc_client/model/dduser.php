<?php
/**
 * Created by PhpStorm.
 * User: daipeng
 * Date: 2015/4/23
 * Time: 11:00
 */

/**
 * 定义当当user类
 * Class dduser
 */
class ddusermodel{

    /** 当当用户id **/
    var $customerid;
    /** 当当用户邮箱   */
    var $email;
    /** 用户电话号码 */
    var $mobilephone;
    /** 用户昵称 */
    var $nickname;

    var $db;
    var $base;

    function __construct(&$base){
        $this->ddusermodel($base);
    }

    function ddusermodel(&$base){
        $this->base = $base;
        $this->db = $base->db;
    }

    /**
    function __init($customerid, $email, $mobilephone, $nickname){
        $this->$customerid = $customerid;
        $this->$email = $email;
        if(!empty($mobilephone)){
            $this->$mobilephone = $mobilephone;
        }
        $this->$nickname = $this->get_final_nickname($email, $mobilephone, $nickname);
    }
     **/

    function get_final_nickname($email, $mobilephone, $nickname){
        if(!empty($nickname)){
            return $nickname;
        }elseif(!empty($mobilephone)){
            return substr($mobilephone, 0, 3)."****".substr($mobilephone, 7);
        }elseif(!empty($email)){
            $pos = $pos = stripos($email, '@');
            if($pos == false){
                return self::getRandChar(10);
            }else{
                return substr($email, 0, $pos);
            }
        }else
        return "匿名";
    }

    function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        return $str;
    }

    function update_username($uid, $username){
        $this->db->query("UPDATE tb_common_member SET username = '$username' WHERE uid = '$uid'");
    }

    function get_user_refer_dduser_id($customerid) {
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_dangdang WHERE dduid = '$customerid'");
        return $arr;
    }

    function insert_user_refer_dduser($uid, $customerid){
        $this->db->query("INSERT IGNORE  INTO tb_common_member_dangdang SET uid='$uid', dduid='$customerid' ");
    }

    function insert_common_member($uid, $email, $username){
        $password = md5(random(10));
        $groupid = DEFAULT_GROUP_ID;
        $this->db->query("INSERT IGNORE INTO tb_common_member (uid, email, username, password, groupid) VALUES ('$uid', '$email', '$username', '$password', '$groupid')");
    }

    function get_common_member_by_uid($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member WHERE uid = '$uid'");
        return $arr;
    }

    function insert_common_member_count($uid){
        $this->db->query("INSERT IGNORE INTO tb_common_member_count(uid) VALUES('$uid')");
    }

    function get_common_member_count_by_uid($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_count WHERE uid = '$uid'");
        return $arr;
    }

    function insert_common_member_field_forum($uid){
        $this->db->query("INSERT IGNORE INTO tb_common_member_field_forum(uid) VALUES('$uid')");
    }

    function get_common_member_field_forum_by_uid($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_field_forum WHERE uid = '$uid'");
        return $arr;
    }

    function insert_common_member_field_home($uid){
        $this->db->query("INSERT IGNORE INTO tb_common_member_field_home(uid) VALUES('$uid')");
    }

    function get_common_member_field_home_by_uid($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_field_home WHERE uid = '$uid'");
        return $arr;
    }

    function insert_common_member_profile($uid){
        $this->db->query("INSERT IGNORE INTO tb_common_member_profile(uid) VALUES('$uid')");
    }

    function get_common_member_profile_by_uid($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_profile WHERE uid = '$uid'");
        return $arr;
    }

    function insert_common_member_status($uid){
        $ip = getIP();
        $time = time();
        $this->db->query("INSERT IGNORE INTO tb_common_member_status(uid, regip, lastip, lastvisit, lastactivity) VALUES('$uid', '$ip', '$ip', '$time', '$time')");
    }

    function get_common_member_status($uid){
        $arr = $this->db->fetch_first("SELECT * FROM tb_common_member_status WHERE uid = '$uid'");
        return $arr;
    }

}

?>