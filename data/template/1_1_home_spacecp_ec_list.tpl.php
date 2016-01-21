<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_ec_list');?><?php include template('common/header'); ?><table cellspacing="0" cellpadding="0" class="dt">
<caption>
<p class="tbmu bw0" style="padding: 10px 0;">
<?php if(in_array($filter, array('thisweek', 'thismonth', 'halfyear', 'before')) && in_array($from, array('buyer', 'seller'))) { ?>
<a class="a" href="javascript:;" hidefocus="true">
<?php if($filter == 'thisweek') { ?>最近1周<?php } elseif($filter == 'thismonth') { ?>最近 1 个月<?php } elseif($filter == 'halfyear') { ?>最近 6 个月<?php } else { ?>6 个月前<?php } ?> 来自<?php if($from == 'buyer') { ?>买家<?php } else { ?>卖家<?php } ?>的<?php if($level == 'good') { ?>好评<?php } elseif($level == 'soso') { ?>中评<?php } elseif($level == 'bad') { ?>差评<?php } else { ?>评价<?php } ?>
</a><span class="pipe">|</span>
<?php } if(!$from) { ?>
<a class="a" href="javascript:;" hidefocus="true">收到的所有评价</a>
<?php } else { ?>
<a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);">收到的所有评价</a>
<?php } if($from == 'buyer' && !$filter) { ?>
<span class="pipe">|</span><a class="a" href="javascript:;" hidefocus="true">来自买家的评价</a>
<?php } else { ?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=buyer" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);">来自买家的评价</a>
<?php } if($from == 'seller' && !$filter) { ?>
<span class="pipe">|</span><a class="a" href="javascript:;" hidefocus="true">来自卖家的评价</a>
<?php } else { ?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=seller" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);">来自卖家的评价</a>
<?php } if($from == 'myself') { ?>
<span class="pipe">|</span><a class="a" href="javascript:;" hidefocus="true">给他人的评价</a>
<?php } else { ?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=list&amp;uid=<?php echo $uid;?>&amp;from=myself" hidefocus="true" onclick="ajaxget(this.href, 'ajaxrate', 'specialposts');doane(event);">给他人的评价</a>
<?php } ?>
</p>
</caption>
<tr class="alt">
<td style="width: 45px;">&nbsp;</td>
<td>评价内容</td>
<td>宝贝名称/评价人</td>
<td style="width: 90px;">成交价</td>
</tr>
<?php if($comments) { if(is_array($comments)) foreach($comments as $comment) { ?><tr>
<td>
<?php if($comment['score'] == 1) { ?>
<img src="<?php echo STATICURL;?>image/traderank/good.gif" width="14" height="16" alt="good" class="vm" /> <span style="color:red">好评</span>
<?php } elseif($comment['score'] == 0) { ?>
<img src="<?php echo STATICURL;?>image/traderank/soso.gif" width="14" height="16" alt="soso" class="vm" /> <span style="color:green">中评</span>
<?php } else { ?>
<img src="<?php echo STATICURL;?>image/traderank/bad.gif" width="14" height="16" alt="bad" class="vm" /> 差评
<?php } ?>
</td>
<td>
<span class="xg1"><?php echo $comment['dateline'];?></span><br /><?php echo $comment['message'];?><br />
<?php if($comment['explanation']) { ?>
解释: <?php echo $comment['explanation'];?>
<?php } elseif($_G['uid'] && $_G['uid'] == $comment['rateeid'] && $comment['dbdateline'] >= TIMESTAMP - 30 * 86400) { ?>
<span id="ecce_<?php echo $comment['id'];?>"><a href="home.php?mod=spacecp&amp;ac=eccredit&amp;op=explain&amp;id=<?php echo $comment['id'];?>&amp;ajaxmenuid=ajax_<?php echo $comment['id'];?>_explain_menu" id="ajax_<?php echo $comment['id'];?>_explain" onclick="ajaxmenu(this, 0, 0);doane(event);">[ 我要解释 ]</a><br /><span class="xg1">您可以在 <?php echo $comment['expiration'];?> 之前作出解释</span></span>
<?php } ?>
</td>
<td>
<a href="forum.php?mod=redirect&amp;goto=findpost&amp;pid=<?php echo $comment['pid'];?>" target="_blank"><?php echo $comment['subject'];?></a><br />
<?php if($from == 'myself') { if($comment['type']) { ?>买家: <?php } else { ?>卖家: <?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $comment['rateeid'];?>" target="_blank"><?php echo $comment['ratee'];?></a>
<?php } else { if($comment['type']) { ?>卖家: <?php } else { ?>买家: <?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $comment['raterid'];?>" target="_blank"><?php echo $comment['rater'];?></a>
<?php } ?>
</td>
<td>
<?php if($comment['price'] > 0) { ?>
<?php echo $comment['price'];?> 元&nbsp;&nbsp;
<?php } if($_G['setting']['creditstransextra']['5'] != -1 && $comment['credit'] > 0) { if($comment['price'] > 0) { ?><br /><?php } ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['title'];?> <?php echo $comment['credit'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['5']]['unit'];?>
<?php } ?>
</td>
</tr>
<?php } } else { ?>
<tr><td colspan="4"><p class="emp">没有找到相关评价！</p></td></tr>
<?php } ?>
</table>
<?php if($multipage) { ?><div class="pgs cl mtm"><?php echo $multipage;?></div><?php } include template('common/footer'); ?>