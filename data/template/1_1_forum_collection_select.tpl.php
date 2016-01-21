<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('collection_select');?><?php include template('common/header'); ?><h3 class="flb">
<em>淘帖</em>
<span><a href="javascript:;" onclick="hideWindow('<?php echo $_GET['handlekey'];?>');" class="flbc" title="关闭">关闭</a></span>
</h3>
<script>
var remaincreateable = <?php echo $reamincreatenum;?>;
var titlelimit = '<?php echo $titlelimit;?>';
var requirecreate = false;
var createnow = false;
var reasonlimit = '<?php echo $reasonlimit;?>';
function succeedhandle_createcollection(url, msg, collectiondata) {
$("createbutton").disabled = false;
if(collectiondata['ctid']) {
$("selectCollection").options[$("selectCollection").length] = new Option($("newcollection").value, collectiondata['ctid'], true, true);
$("collectionlist").style.display='';
remaincreateable--;
if(remaincreateable <= 0) {
$("allowcreate").style.display='none';
} else {
$("reamincreatenum").innerHTML = remaincreateable;
}
display('createcollection');
$("submitnewtitle").value = $("newcollection").value = '';
}
$("nocreate").innerHTML = '';
if(requirecreate == true) {
$("createRemainTips").style.display='';
$("createbutton").style.display='';
$("newcollection").style.width='';
requirecreate = false;
if(createnow == true) {
setTimeout('$("btn_submitaddthread").click();', 101);
}
createnow = false;
}
}
function ajaxcreatecollection() {
if(!$("newcollection").value) {
showError('请将标题填写完整');
return false;
}
if(mb_strlen($("newcollection").value) > titlelimit) {
showError("标题不能超过 "+titlelimit+" 字节");
return false;
}
$("createbutton").disabled = true;
$("submitnewtitle").value = $("newcollection").value;
ajaxpost('fastcreateform', 'fastcreatereturn', 'fastcreatereturn', 'onerror');
}
function checkreasonlen() {
if(mb_strlen($("formreason").value) > reasonlimit) {
showError("淘帖理由不能超过 "+reasonlimit+" 字节");
return false;
}
if(requirecreate == true) {
createnow = true;
ajaxcreatecollection();
return false;
} else {
$("createRemainTips").style.display='';
$("createbutton").style.display='';
$("newcollection").style.width='';
}
return true;
}
</script>
<form action="forum.php?mod=collection&amp;action=edit&amp;op=addthread" method="post" onsubmit="update_collection();ajaxpost(this.id, 'form_addcollectionthread');" id="form_addcollectionthread" name="form_addcollectionthread">
<div class="c">
<div id="collectionlist" <?php if($reamincreatenum > 0 && count($allowcollections) <= 0) { ?>style="display:none;"<?php } ?>>
<p>选择淘专辑：</p>
<select name="ctid" id="selectCollection" style="width: 280px;"><?php if(is_array($collections)) foreach($collections as $collection) { if(!in_array($collection['ctid'], $tidcollections)) { ?>
<option value="<?php echo $collection['ctid'];?>"><?php echo $collection['name'];?></option>
<?php } } ?>
</select>
</div>
<div id="allowcreate" <?php if($reamincreatenum <= 0) { ?>style="display:none;"<?php } ?>>
<span id="nocreate"><?php if(!$collections) { ?>您还没有创建淘专辑。<?php } ?></span>
<div class="mtm ntc_l">现在还可以创建 <span id="reamincreatenum"><?php echo $reamincreatenum;?></span> 个淘专辑。 <a href="javascript:;" onclick="display('createcollection');if($('createcollection').style.display!='none') {$('newcollection').focus();}" class="xi2" id="createRemainTips">创建淘专辑</a></div>
</div>
<div id="createcollection" class="ptm vm" style="display:none">
淘专辑名： <input type="text" value="" id="newcollection" class="px" /> <button type="button" id="createbutton" name="createbutton" onclick="javascript:ajaxcreatecollection();" class="pn pnc"><span>创建淘专辑</span></button>
</div>
<div class="ptm">
<p class="pbn">淘帖理由：</p>
<textarea name="reason" id="formreason" cols="50" rows="2" class="pt"></textarea>
</div>
</div>
<div class="o pns">
<a href="forum.php?mod=collection&amp;op=my" target="_blank" class="z xi2">查看我的专辑</a>
<?php if($tid) { ?>
<input type="hidden" name="tids[]" value="<?php echo $tid;?>">
<?php } elseif(is_array($_GET['tids'])) { if(is_array($_GET['tids'])) foreach($_GET['tids'] as $tid) { ?><input type="hidden" name="tids[]" value="<?php echo $tid;?>">
<?php } } ?>
<input type="hidden" name="inajax" value="1">
<input type="hidden" name="handlekey" value="<?php echo $_GET['handlekey'];?>">
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="addthread" id="addthread" value="1" />
<button type="submit" name="submitaddthread" id="btn_submitaddthread" onclick="return checkreasonlen();" class="pn pnc"><span>添加到淘专辑</span></button>
</div>
</form>
<div style="display:none;">
<form action="forum.php?mod=collection&amp;action=edit&amp;op=add" method="post" id="fastcreateform">
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="collectionsubmit" value="1" />
<input type="hidden" name="submitcollection" value="1" />
<input type="hidden" name="title" id="submitnewtitle" value="" />
</form>
</div>
<span id="fastcreatereturn"></span>
<?php if($reamincreatenum > 0 && count($allowcollections) <= 0) { ?>
<script>
var random = <?php echo TIMESTAMP; ?>;
requirecreate = true;
$("createRemainTips").style.display='none';
$("createbutton").style.display='none';
$("newcollection").style.width='204px';
display('createcollection');
</script>
<?php } include template('common/footer'); ?>