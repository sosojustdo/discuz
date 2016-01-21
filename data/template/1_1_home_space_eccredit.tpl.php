<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_eccredit');
0
|| checktplrefresh('./template/default/home/space_eccredit.htm', './template/default/home/space_userabout.htm', 1431669874, '1', './data/template/1_1_home_space_eccredit.tpl.php', './template/default', 'home/space_eccredit')
;?>
<?php $filter = array( 'common' => '已发表', 'save' => '草稿箱', 'close' => '已关闭', 'aduit' => '待审核', 'recyclebin' => '回收站');
$_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&amp;uid=$space[uid]&amp;do=thread&amp;view=me\">信用评价</a>";?><?php include template('home/space_header'); ?><div id="ct" class="ct2 wp cl">
<div class="mn">
<div class="bm">
<div class="bm_h cl">
<h1>
信用评价
</h1>
</div>
<div class="bm_c">

<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<p class="mtm mbw">
<?php if($member['alipay']) { ?><a href="https://www.alipay.com/trade/i_credit.do?email=<?php echo $member['alipay'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/alipaysmall.gif" alt="支付宝账户信用信息" class="vm" /></a>&nbsp;&nbsp;<?php } if($member['taobao']) { ?><script type="text/javascript">document.write('<a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&amp;uid='+encodeURIComponent('<?php echo $member['taobaoas'];?>')+'&amp;s=2"><img src="http://amos1.taobao.com/online.ww?v=2&amp;uid='+encodeURIComponent('<?php echo $member['taobaoas'];?>')+'&amp;s=1" alt="阿里旺旺" class="vm" /></a>&nbsp;');</script>&nbsp;&nbsp;<?php } ?>
买家好评率: <?php echo $sellerpercent;?>%;&nbsp;&nbsp;
卖家好评率: <?php echo $buyerpercent;?>%;&nbsp;&nbsp;

</p>
<!-- 注册时间: <?php echo $member['regdate'];?> -->
<table id="sellcredit" summary="eccredit" cellspacing="0" cellpadding="0" class="dt">
<caption><h3 class="pbm">买家信用 <?php echo $member['sellercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/seller/<?php echo $member['sellerrank'];?>.gif" alt="seller rank" class="vm" /></h3></caption>
<tr class="alt">
<td style="width: 45px;">&nbsp;</td>
<td>最近1周</td>
<td>最近 1 个月</td>
<td>最近 6 个月</td>
<td>6 个月前</td>
<td>总计</td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/good.gif" width="14" height="16" alt="good" class="vm" /> <span style="color:red">好评</span></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thisweek&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thisweek']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thismonth&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thismonth']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=halfyear&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['halfyear']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=before&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['before']['good'];?></a></td>
<td><?php echo $caches['sellercredit']['all']['good'];?></td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/soso.gif" width="14" height="16" alt="soso" class="vm" /> <span style="color:green">中评</span></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thisweek&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thisweek']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thismonth&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thismonth']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=halfyear&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['halfyear']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=before&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['before']['soso'];?></a></td>
<td><?php echo $caches['sellercredit']['all']['soso'];?></td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/bad.gif" width="14" height="16" alt="bad" class="vm" /> 差评</td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thisweek&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thisweek']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thismonth&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thismonth']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=halfyear&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['halfyear']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=before&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['before']['bad'];?></a></td>
<td><?php echo $caches['sellercredit']['all']['bad'];?></td>
</tr>
<tr>
<td>总计</td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thisweek#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thisweek']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=thismonth#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['thismonth']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=halfyear#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['halfyear']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer&amp;filter=before#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['sellercredit']['before']['total'];?></a></td>
<td><?php echo $caches['sellercredit']['all']['total'];?></td>
</tr>
</table>

<table id="buyercredit" summary="eccredit" cellspacing="0" cellpadding="0" class="dt">
<caption><h3 class="ptw pbm">卖家信用 <?php echo $member['buyercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/buyer/<?php echo $member['buyerrank'];?>.gif" alt="buyer rank" class="vm" /></h3></caption>
<tr class="alt">
<td style="width: 45px;">&nbsp;</td>
<td>最近1周</td>
<td>最近 1 个月</td>
<td>最近 6 个月</td>
<td>6 个月前</td>
<td>总计</td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/good.gif" width="14" height="16" alt="good" class="vm" /> <span style="color:red">好评</span></td><td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thisweek&amp;level=good" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thisweek']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thismonth&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thismonth']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=halfyear&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['halfyear']['good'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=before&amp;level=good#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['before']['good'];?></a></td>
<td><?php echo $caches['buyercredit']['all']['good'];?></td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/soso.gif" width="14" height="16" alt="soso" class="vm" /> <span style="color:green">中评</span></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thisweek&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thisweek']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thismonth&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thismonth']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=halfyear&amp;level=soso#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['halfyear']['soso'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=before&amp;level=soso" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['before']['soso'];?></a></td>
<td><?php echo $caches['buyercredit']['all']['soso'];?></td>
</tr>
<tr>
<td><img src="<?php echo STATICURL;?>image/traderank/bad.gif" width="14" height="16" alt="bad" class="vm" /> 差评</td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thisweek&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thisweek']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thismonth&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thismonth']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=halfyear&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['halfyear']['bad'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=before&amp;level=bad#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['before']['bad'];?></a></td>
<td><?php echo $caches['buyercredit']['all']['bad'];?></td>
</tr>
<tr>
<td>总计</td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thisweek#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thisweek']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=thismonth#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['thismonth']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=halfyear#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['halfyear']['total'];?></a></td>
<td><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller&amp;filter=before#" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);"><?php echo $caches['buyercredit']['before']['total'];?></a></td>
<td><?php echo $caches['buyercredit']['all']['total'];?></td>
</tr>
</table>
<div id="ajaxrate"></div>
<?php if($_G['uid']) { ?>
<script type="text/javascript">ajaxget('home.php?mod=spacecp&ac=eccredit&op=list&uid=<?php echo $uid;?>', 'ajaxrate');var explainmenu='ajax_explain_menu';</script>
<?php } ?>

</div>
</div>
</div>
<div class="sd"><div id="pcd" class="bm cl"><?php $encodeusername = rawurlencode($space[username]);?><div class="bm_c">
<div class="hm">
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>" class="avtm"><?php echo avatar($space[uid],middle);?></a></p>
<h2 class="xs2"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></h2>
</div>
<ul class="xl xl2 cl ul_list">
<?php if($space['self']) { if($_G['setting']['homepagestyle']) { ?>
<li class="ul_diy"><a href="home.php?mod=space&amp;do=index&amp;diy=yes">装扮空间</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_msg"><a href="home.php?mod=space&amp;do=wall">查看留言</a></li>
<?php } ?>
<li class="ul_avt"><a href="home.php?mod=spacecp&amp;ac=avatar">编辑头像</a></li>
<li class="ul_profile"><a href="home.php?mod=spacecp&amp;ac=profile">更新资料</a></li>
<?php } else { if(helper_access::check_module('follow')) { ?>
<li class="ul_broadcast"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>">查看广播</a></li>
<?php } if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<li class="ul_flw"><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>">收听TA</a>
<?php } else { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>">取消收听</a>
<?php } ?>
</li>
<?php } require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li class="ul_add"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">加为好友</a></li>
<?php } else { ?>
<li class="ul_ignore"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">解除好友</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_contect"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">给我留言</a></li>
<?php } ?>
<li class="ul_poke"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">打个招呼</a></li>

<li class="ul_pm"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<hr class="da mtn m0">
<ul class="ptn xl xl2 cl">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">内容管理</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<ul id="usermanageli_menu" class="p_pop" style="width: 80px; display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">禁止用户</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">编辑用户</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<ul id="umanageli_menu" class="p_pop" style="width: 80px; display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">管理帖子</a></li>
<?php if(helper_access::check_module('doing')) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理记录</a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理日志</a></li>
<?php } if(helper_access::check_module('feed')) { ?>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理动态</a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理相册</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理图片</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">管理评论</a></li>
<?php } if(helper_access::check_module('share')) { ?>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理分享</a></li>
<?php } if(helper_access::check_module('group')) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组主题</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组帖子</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
</div>
</div>
<script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod');
if(values['type'] == 'add') {
fObj.innerHTML = '取消收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
</script></div>
</div><?php include template('common/footer'); ?>