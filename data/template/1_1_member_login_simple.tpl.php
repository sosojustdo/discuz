<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if(CURMODULE != 'logging') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>logging.js?<?php echo VERHASH;?>" type="text/javascript"></script>

    <div class="y pns">
        <a href="https://login.dangdang.com/signin.aspx?returnurl=http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin" target="_blank">登录</a>
        <a href="https://login.dangdang.com/lostpassword.php" target="_blank">找回密码</a>
        <a href="https://login.dangdang.com/register.php" target="_blank">立即注册</a>
    </div>

<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } } ?>