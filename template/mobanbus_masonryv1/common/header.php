<?php echo 'ģ���ʿԭ��ģ�壬��Ȩ���У�����ؾ������� www.mobanbus.cn';exit;?>
<!--{subtemplate common/header_common}-->
	<meta name="application-name" content="$_G['setting']['bbname']" />
	<meta name="msapplication-tooltip" content="$_G['setting']['bbname']" />
	<!--{if $_G['setting']['portalstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][1]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G[siteurl].'portal.php'};icon-uri={$_G[siteurl]}{IMGDIR}/portal.ico" /><!--{/if}-->
	<meta name="msapplication-task" content="name=$_G['setting']['navs'][2]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G[siteurl].'forum.php'};icon-uri={$_G[siteurl]}{IMGDIR}/bbs.ico" />
	<!--{if $_G['setting']['groupstatus']}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][3]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G[siteurl].'group.php'};icon-uri={$_G[siteurl]}{IMGDIR}/group.ico" /><!--{/if}-->
	<!--{if helper_access::check_module('feed')}--><meta name="msapplication-task" content="name=$_G['setting']['navs'][4]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G[siteurl].'home.php'};icon-uri={$_G[siteurl]}{IMGDIR}/home.ico" /><!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' && $_G['setting']['archiver']}-->
		<link rel="archives" title="$_G['setting']['bbname']" href="{$_G[siteurl]}archiver/" />
	<!--{/if}-->
	<!--{if !empty($rsshead)}-->$rsshead<!--{/if}-->
	<!--{if widthauto()}-->
		<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_{STYLEID}_widthauto.css?{VERHASH}" />
		<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
	<!--{/if}-->
	<!--{if $_G['basescript'] == 'forum' || $_G['basescript'] == 'group'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'home' || $_G['basescript'] == 'userapp'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
	<!--{elseif $_G['basescript'] == 'portal'}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
		<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
		<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
	<!--{/if}-->
	<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
	<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_{STYLEID}_css_diy.css?{VERHASH}" />
	<!--{/if}-->
<script type="text/javascript" src="template/mobanbus_masonryv1/mobanbus_st/js/mobanbus_pace.js"></script>
<script type="text/javascript" src="template/mobanbus_masonryv1/mobanbus_st/js/jQuery.js"></script>
<script type="text/javascript" src="template/mobanbus_masonryv1/mobanbus_st/js/mobanbusjs.js"></script>
<script type="text/javascript">
 function load(time){
   var x = new XMLHttpRequest()
 };

 load(20);
 load(100);
 load(500);
 load(2000);
 load(3000);

 setTimeout(function(){
   Pace.ignore(function(){
     load(3100);
   });
 }, 4000);

 Pace.on('hide', function(){

 });
</script>
</head>
<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
<!--{template common/header_diy}-->
<!--{/if}-->
<!--{if check_diy_perm($topic)}--> 
<!--{block diynav}-->
<a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();">DIY</a> 
<!--{/block}-->
<!--{/if}-->
<!--{if CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)}--> 
$diynav
<!--{/if}-->
<!--{if empty($topic) || $topic['useheader']}-->
<!--{if $_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')}-->
<div class="xi1 bm bm_c">
{lang your_mobile_browser}<a href="{$_G['siteurl']}forum.php?mobile=yes">{lang go_to_mobile}</a> <span class="xg1">|</span> <a href="$_G['setting']['mobile']['nomobileurl']">{lang to_be_continue}</a>
</div>
<!--{/if}-->
<!--{if $_G['setting']['shortcut'] && $_G['member'][credits] >= $_G['setting']['shortcut']}-->
			<div id="shortcut">
				<span><a href="javascript:;" id="shortcutcloseid" title="{lang close}">{lang close}</a></span>
				{lang shortcut_notice}
				<a href="javascript:;" id="shortcuttip">{lang shortcut_add}</a>

			</div>
			<script type="text/javascript">setTimeout(setShortcut, 2000);</script>
<!--{/if}-->
<div class="bus_hads"><!--{ad/headerbanner/wp}--></div>

<div class="bus_header bus_relative">
	<div id="box">
	<div id="bus_nv">
		<div class="bus_w98">
			<!--{eval $mnid = getcurrentnav();}-->
			<div class="bus_logo bus_fl"><h1><!--{if !isset($_G['setting']['navlogos'][$mnid])}--><a href="{if $_G['setting']['domain']['app']['default']}http://{$_G['setting']['domain']['app']['default']}/{else}./{/if}" title="$_G['setting']['bbname']">{$_G['style']['boardlogo']}</a><!--{else}-->$_G['setting']['navlogos'][$mnid]<!--{/if}--></h1></div>
			<ul class="bus_box animated fadeInUp">
				<!--{loop $_G['setting']['navs'] $nav}-->
					<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><li {if $mnid == $nav[navid]}class="select" {/if}$nav[nav]></li><!--{/if}-->
				<!--{/loop}-->
			</ul>
			<!--{hook/global_nav_extra}-->
			
			<!-- Block user information module HEADER --> 
			<div id="header_user">
			<!--{if $_G['uid']}-->
				<ul id="header_nav">
				  <li id="shopping_cart"> <span><a href="home.php?mod=space&do=pm" id="pm_ntc"{if $_G[member][newpm]} class="new"{/if}>{lang pm_center} 
				  <!--{if $_G[member][newpm]}--> 
				  ({$_G[member][newpm]}) 
				  <!--{/if}--> 
				  </a></span>
				  <div  id="newprompter" style="float: left;"><span><a href="home.php?mod=space&do=notice" id="myprompt"{if $_G[member][newprompt]} class="new"{/if}>{lang remind} 
					<!--{if $_G[member][newprompt]}--> 
					($_G[member][newprompt]) 
					<!--{/if}--> 
					</a></span></div>
				  <!--{if $_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])}--> 
				  <span><a href="home.php?mod=task&item=doing" id="task_ntc" class="new">{lang task_doing}</a></span> 
				  <!--{/if}--> 
				  <span class="avatarimg"> <a href="home.php?mod=space&uid=$_G[uid]" target="_blank" title="{lang visit_my_space}" id="umnav" class="username" onMouseOver="showMenu({'ctrlid':this.id,'ctrlclass':'a'})"> 
				  <!--{avatar($_G[uid],small)}--> 
				  </a></span></li>
				</ul>
			<!--{elseif !empty($_G['cookie']['loginuser'])}-->
				<ul id="header_nav">
				<li id="shopping_cart"> <span><a id="loginuser" class="username"> 
				  <!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--> 
				  </a></span> <span><a href="member.php?mod=logging&action=login" onClick="showWindow('login', this.href)">{lang activation}</a></span> <span><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></span> </li>
				</ul>
			<!--{elseif !$_G[connectguest]}-->
				<ul id="header_nav">
					<li class="login_list"><a class="register_block"  href="member.php?mod=register" class="btn-register">$_G['setting']['reglinkname']</a></li>
					<li class="login_list"><a class="login_block" href="javascript:;" onClick="javascript:lsSubmit();" class="nousername">{lang login}</a></li>
				</ul>
				<div style="display:none"> 
				  <!--{template member/login_simple}--> 
				</div>
			<!--{else}-->
				<ul id="header_nav">
					<li id="shopping_cart"> <span><a href="home.php?mod=spacecp&ac=usergroup" class="nousername">{$_G[member][username]}</a></span> <span><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></span> </li>
				</ul>
			<!--{/if}-->
			<!--{if $_G['uid']}-->
			<!-- /Block user information module HEADER -->
			<div class="header_user_drop">
			<ul lass="p_pop nav_pop">
				<span class="tt">{$_G[member][username]} , $_G[group][grouptitle]<!--{if $_G[member]['freeze']}--><span class="xi1">({lang freeze})</span><!--{/if}--> , {lang credits}: $_G[member][credits]</span>
				<li class="tt">My</li>
				<!--{hook/global_usernav_extra4}-->
				<!--{hook/global_usernav_extra2}-->
				<!--{hook/global_usernav_extra3}-->
				<!--{hook/global_usernav_extra1}-->
				<!--{hook/global_cpnav_top}-->
				<!--{hook/global_cpnav_extra1}-->
				<li><a href="forum.php?mod=guide&view=my">My post</a></li>
				<li><a href="home.php?mod=space&do=favorite&view=me">{lang favorite}</a></li>
				<li><a href="home.php?mod=space&do=friend">{lang friends}</a></li>
				<!--{hook/global_myitem_extra}-->
				<li class="tt">{lang my_nav}</li>
				<!--{loop $_G['setting']['mynavs'] $nav}-->
				<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--> 
				{eval $nav[code] = str_replace('style="', '_style="', $nav[code]);}
				<li>$nav[code]</li>
				<!--{/if}-->
				<!--{/loop}-->
				<li><a href="home.php?mod=spacecp">{lang setup}</a></li>
				<!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
				<li class="tt">{lang setup}</li>
				<li><a href="portal.php?mod=portalcp">
				<!--{if $_G['setting']['portalstatus'] }--> {lang portal_manage} <!--{else}--> {lang portal_block_manage} <!--{/if}--> </a></li><!--{/if}-->
				<!--{if $_G['uid'] && $_G['group']['radminid'] > 1}--><li><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a></li><!--{/if}-->
				<!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}--><li><a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank">{lang cloudcp}</a></li><!--{/if}-->
				<!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}--><li><a href="admin.php" target="_blank">{lang admincp}</a></li><!--{/if}--> 
				<!--{if check_diy_perm($topic)}--><li>$diynav</li><!--{/if}-->
			  <li><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></li>
			</ul>
			</div>
			<!--{/if}-->
			</div><!--Mobanbus_cn header_nav end-->
			<div class="bus_push"><a href="forum.php?mod=misc&amp;action=nav" onClick="showWindow('nav', this.href, 'get', 0)" class="bus_push_addnew">{lang publish}</a></div>
			<div class="bus_search"><!--{subtemplate common/pubsearchform}--> </div>
		</div>
	</div>
	</div>
</div>
<!--��������-->

	<!--{if !IS_ROBOT}-->
		<!--{if $_G['uid']}-->
		<ul id="myprompt_menu" class="p_pop" style="display: none;">				
			<li><a href="home.php?mod=space&do=pm" id="pm_ntc" style="background-repeat: no-repeat; background-position: 0 50%;"><em class="prompt_news{if empty($_G[member][newpm])}_0{/if}"></em>{lang pm_center}</a></li>
			<li><a href="home.php?mod=follow&do=follower"><em class="prompt_follower{if empty($_G[member][newprompt_num][follower])}_0{/if}"></em><!--{lang notice_interactive_follower}-->{if $_G[member][newprompt_num][follower]}($_G[member][newprompt_num][follower]){/if}</a></li>
			<!--{if $_G[member][newprompt] && $_G[member][newprompt_num][follow]}-->
				<li><a href="home.php?mod=follow"><em class="prompt_concern"></em><!--{lang notice_interactive_follow}-->($_G[member][newprompt_num][follow])</a></li>
			<!--{/if}-->
			<!--{if $_G[member][newprompt]}-->
				<!--{loop $_G['member']['category_num'] $key $val}-->
					<li><a href="home.php?mod=space&do=notice&view=$key"><em class="notice_$key"></em><!--{echo lang('template', 'notice_'.$key)}-->(<span class="rq">$val</span>)</a></li>
				<!--{/loop}-->
			<!--{/if}-->
			<!--{if empty($_G['cookie']['ignore_notice'])}-->
				<li class="ignore_noticeli"><a href="javascript:;" onClick="setcookie('ignore_notice', 1);hideMenu('myprompt_menu')" title="{lang temporarily_to_remind}"><em class="ignore_notice"></em></a></li>
			<!--{/if}-->
		</ul>
		<!--{/if}-->
		<!--{if $_G['uid'] && !empty($_G['style']['extstyle'])}-->
			<div id="sslct_menu" class="cl p_pop" style="display: none;">
				<!--{if !$_G[style][defaultextstyle]}--><span class="sslct_btn" onClick="extstyle('')" title="{lang default}"><i></i></span><!--{/if}-->
				<!--{loop $_G['style']['extstyle'] $extstyle}-->
					<span class="sslct_btn" onClick="extstyle('$extstyle[0]')" title="$extstyle[1]"><i style='background:$extstyle[2]'></i></span>
				<!--{/loop}-->
			</div>
		<!--{/if}-->
		<!--{if $_G['uid']}-->
			<ul id="myitem_menu" class="p_pop" style="display: none;">
				<li><a href="forum.php?mod=guide&view=my">{lang mypost}</a></li>
                <!--
				<li><a href="home.php?mod=space&do=favorite&view=me">{lang favorite}</a></li>
				-->
				<li><a href="home.php?mod=space&do=friend">{lang friends}</a></li>
				<!--{hook/global_myitem_extra}-->
			</ul>
		<!--{/if}-->
		<!--{subtemplate common/header_qmenu}-->
	<!--{/if}-->
	
	<!--{if !empty($_G['setting']['plugins']['jsmenu'])}-->
	<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
	<!--{loop $_G['setting']['plugins']['jsmenu'] $module}-->
		 <!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}-->
		 <li>$module[url]</li>
		 <!--{/if}-->
	<!--{/loop}-->
	</ul>
	<!--{/if}-->
	$_G[setting][menunavs]
	<div id="mu" class="cl">
	<!--{if $_G['setting']['subnavs']}-->
	<!--{loop $_G[setting][subnavs] $navid $subnav}-->
		<!--{if $_G['setting']['navsubhover'] || $mnid == $navid}-->
		<ul class="cl {if $mnid == $navid}current{/if}" id="snav_$navid" style="display:{if $mnid != $navid}none{/if}">
		$subnav
		</ul>
		<!--{/if}-->
	<!--{/loop}-->
	<!--{/if}-->
	</div>
	<!-- /Block user information module HEADER -->

</div>
<!--{/if}-->

<div class="bus_hads"><!--{ad/subnavbanner/a_mu}--></div>
<!--{hook/global_header}-->

<div class="clear"></div>
<!--{if $_G['basescript'] == 'portal' && CURMODULE == 'index'}--><!--{else}--><div class="mobanbus"><!--{/if}-->
