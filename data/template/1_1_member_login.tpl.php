<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');?><?php include template('common/header'); $loginhash = 'L'.random(4);?><?php if(empty($_GET['infloat'])) { ?>
<div id="ct" class="ptm wp w cl">
<div class="nfl" id="main_succeed" style="display: none">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>
<div class="mn" id="main_message">
<div class="bm">
<div class="bm_h bbs">
<span class="y">
<?php if(!empty($_G['setting']['pluginhooks']['logging_side_top'])) echo $_G['setting']['pluginhooks']['logging_side_top'];?>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2">没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></a>
</span>
<?php if(!$secchecklogin2) { ?>
<h3 class="xs2">登录</h3>
<?php } else { ?>
<h3 class="xs2">请输入验证码后继续登录</h3>
<?php } ?>
</div>
<div>
<?php } ?>

<div id="main_messaqge_<?php echo $loginhash;?>"<?php if($auth) { ?> style="width: auto"<?php } ?>>
<div id="layer_login_<?php echo $loginhash;?>">
<h3 class="flb">
<em id="returnmessage_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat'])) { if(!empty($_GET['guestmessage'])) { ?>您需要先登录才能继续本操作<?php } elseif($auth) { ?>请补充下面的登录信息<?php } else { ?>用户登录<?php } } ?>
</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="" onclick="hideWindow('<?php echo $_GET['handlekey'];?>', 0, 1);" title="关闭">关闭</a><?php } ?></span>
</h3>
<?php if(!empty($_G['setting']['pluginhooks']['logging_top'])) echo $_G['setting']['pluginhooks']['logging_top'];?>
        <div style="padding-left: 50px; padding-bottom: 50px;">
            <a href="https://login.dangdang.com/signin.aspx?returnurl=http%3A%2F%2Fe.dangdang.com%2Fbbs%2Fmember.php%3Fmod%3Dlogging%26action%3Dlogin" target="_blank">登录</a>
            <a href="https://login.dangdang.com/lostpassword.php" target="_blank">找回密码</a>
            <a href="https://login.dangdang.com/register.php" target="_blank">立即注册</a>
        </div>
</div>
<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } ?>

</div>

<div id="layer_message_<?php echo $loginhash;?>"<?php if(empty($_GET['infloat'])) { ?> class="f_c blr nfl"<?php } ?> style="display: none;">
<h3 class="flb" id="layer_header_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?>
<em>用户登录</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a></span>
<?php } ?>
</h3>
<div class="c"><div class="alert_right">
<div id="messageleft_<?php echo $loginhash;?>"></div>
<p class="alert_btnleft" id="messageright_<?php echo $loginhash;?>"></p>
</div>
</div>

<script type="text/javascript" reload="1">
<?php if(!isset($_GET['viewlostpw'])) { ?>
var pwdclear = 0;
function initinput_login() {
document.body.focus();
<?php if(!$auth) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
$('loginform_<?php echo $loginhash;?>').username.focus();
}
<?php if(!$this->setting['autoidselect']) { ?>
simulateSelect('loginfield_<?php echo $loginhash;?>');
<?php } } elseif($seccodecheck && !(empty($_GET['auth']) || $questionexist)) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
safescript('seccodefocus', function() {$('loginform_<?php echo $loginhash;?>').seccodeverify.focus()}, 500, 10);
}			
<?php } ?>
}
initinput_login();
<?php if($this->setting['sitemessage']['login']) { ?>
showPrompt('custominfo_login_<?php echo $loginhash;?>', 'mouseover', '<?php echo trim($this->setting['sitemessage']['login'][array_rand($this->setting['sitemessage']['login'])]); ?>', <?php echo $this->setting['sitemessage']['time'];?>);
<?php } ?>

function clearpwd() {
if(pwdclear) {
$('password3_<?php echo $loginhash;?>').value = '';
}
pwdclear = 0;
}
<?php } else { ?>
display('layer_login_<?php echo $loginhash;?>');
display('layer_lostpw_<?php echo $loginhash;?>');
$('lostpw_email').focus();
<?php } ?>
</script><?php updatesession();?><?php if(empty($_GET['infloat'])) { ?>
</div></div></div></div>
</div>
<?php } include template('common/footer'); ?>