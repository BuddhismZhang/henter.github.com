<? if(!defined('IN_DC')) exit('Access Denied'); ?>
<?php
defined('IN_DC') or exit('Access Denied');
include atpl('header');
?>
<?php echo $menu;?>
    <div class="space">
        <div class="subtitle">关键词管理</div>
        
<form method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=listorder">
<table class="maintable" border="0" cellspacing="0" cellpadding="0">
    <tr class="altbg1">
        <td width="5%"><b>排序</b></td>
        <td><b>关键词</b></td>
        <td width="10%"><b>引用次数</b></td>
        <td width="20%"><b>最后引用</b></td>
        <td width="10%"><b>点击次数</b></td>
        <td width="20%"><b>最后访问</b></td>
        <td width="20%"><b>管理操作</b></td>
    </tr>
<?php
if(is_array($infos)){
foreach($infos as $info){
?>
    <tr class="altbg1">
        <td class="align_c"><input name='listorder[<?=$info['tagid']?>]' type='text' size='3' value='<?=$info['listorder']?>'></td>
        <td class="align_c"><a href="tag.php?tag=<?=urlencode($info['tag'])?>" target="_blank"><span  class="<?=$info['style']?>"><?=$info['tag']?></span></a></td>
        <td class="align_c"><?=$info['usetimes']?></td>
         <td class="align_c"><?=$info['lastusetime'] ? date('Y-m-d H:i', $info['lastusetime']):''?></td>
       <td class="align_c"><?=$info['hits']?></td>
        <td class="align_c"><?=$info['lasthittime']?date('Y-m-d H:i', $info['lasthittime']):''?></td>
        <td class="align_c"><a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&tag=<?=urlencode($info['tag'])?>">修改</a> | <a href="javascript:confirmurl('?mod=<?=$mod?>&file=<?=$file?>&action=delete&tagid=<?=$info['tagid']?>', '是否删除该关键词？')">删除</a> </td>
    </tr>
<?php
}
}
?>
</table>
<div class="button_box"><input name="submit" type="submit" size="4" value=" 排序 "></div>
<div id="pages"><?=$keyword->pages?></div>
</form>
    
</div>
</body>
</html>