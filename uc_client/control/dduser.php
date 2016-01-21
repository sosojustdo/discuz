<?php
/**
 * Created by PhpStorm.
 * User: daipenge
 * Date: 2015/4/23
 * Time: 11:07
 */

!defined('IN_UC') && exit('Access Denied');
define("UC_ROOT", dirname(dirname(__FILE__))."/");
require ROOT.'/uc_client/model/base.php';
require ROOT.'/dangdang/define_const.php';


class ddusercontrol extends  base{

    function __construct() {
        $this->ddusercontrol();
    }

    function ddusercontrol() {
        parent::__construct();
        $this->load('dduser');
        $this->load('user');
    }

    function process_dd_login($customerid, $nickname, $mobilephone, $email){
        $this->init_input();
        $really_username = $_ENV['dduser']->get_final_nickname($email, $mobilephone, $nickname);
        $refer_user = $_ENV['dduser']->get_user_refer_dduser_id($customerid);
        if(empty($refer_user)){
            #获取$uid
            $uid = "";
            $user = $_ENV['user']->get_user_by_username($really_username);
            if(!empty($user)){
                $uid = $user['uid'];
            }else{
                $uid = $_ENV['user']->add_user($really_username, DEFAULT_PASSWORD, $email);
            }
            if(isset($uid) && $uid != 0 && $uid != false){
                #保存discuz与当当用户关联表记录
                $_ENV['dduser']->insert_user_refer_dduser($uid, $customerid);
                #保存prefix_common_member相关表记录
                $common_member_array = $_ENV['dduser']->get_common_member_by_uid($uid);
                if(empty($common_member_array)){
                    $_ENV['dduser']->insert_common_member($uid, $email, $really_username);
                }

                $common_member_count_array = $_ENV['dduser']->get_common_member_count_by_uid($uid);
                if(empty($common_member_count_array)){
                    $_ENV['dduser']->insert_common_member_count($uid);
                }

                $common_member_field_forum_array = $_ENV['dduser']->insert_common_member_field_forum($uid);
                if(empty($common_member_field_forum_array)){
                    $_ENV['dduser']->insert_common_member_field_forum($uid);
                }

                $common_member_field_home_array = $_ENV['dduser']->get_common_member_field_home_by_uid($uid);
                if(empty($common_member_field_home_array)){
                    $_ENV['dduser']->insert_common_member_field_home($uid);
                }

                $common_member_profile_array = $_ENV['dduser']->get_common_member_profile_by_uid($uid);
                if(empty($common_member_profile_array)){
                    $_ENV['dduser']->insert_common_member_profile($uid);
                }

                $common_member_status_array = $_ENV['dduser']->get_common_member_status($uid);
                if(empty($common_member_status_array)){
                    $_ENV['dduser']->insert_common_member_status($uid);
                }
            }
        }else{
            $u_id = $refer_user['uid'];
            $already_user = $_ENV['user']->get_user_by_uid($u_id);
            if(!empty($already_user) && $really_username != $already_user['username']){
                //更新用户名称：tb_ucenter_member and tb_common_member表
                $_ENV['dduser']->update_username($u_id, $really_username);
                $_ENV['user']->update_username($u_id, $really_username);
            }
        }
        return $really_username;
    }

}
