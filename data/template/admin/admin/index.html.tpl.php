<? if(!defined('IN_DC')) exit('Access Denied'); ?>

<?php include atpl('header'); ?>

<script type="text/javascript">
function gotoMenu(obj,parentid,param) {
    var selmenu = obj.parentNode;
    var menus = document.getElementById('nav').getElementsByTagName('li');
    if(selmenu){
        selmenu.className = "selected";
        for(var i = 0;i < menus.length;i++) {
            if(menus[i] != selmenu) menus[i].className = "unselected";
        }
        menu.location = '?file=menu&action=left&parentid='+parentid;
        main.location = '?' + param;
    }
    return false;
}

function gotohome() {
        menu.location = '?file=menu&action=left';
        main.location = '?file=home';
}

</script>

<div style="position: absolute;top: 0px;left: 0px; z-index: 2;height: 100px;width: 100%">


<div id="header">
    <div id="logo"><?php echo $DC[sitename];?></div>
    <div id="op">
            <b><?php echo get_cookie('a_username');?></b> &nbsp;<font color=blue><?php echo $ROLE[$_roleid][rolename];?></font>&nbsp;

            <a href="<?php echo $DC[siteurl];?>" target="_blank">网站首页</a>&nbsp;
            <a href="javascript:gotohome();">后台首页</a>&nbsp;
            <a href="?file=menu" target="main">菜单管理</a>&nbsp;
            <a href="?file=admin&action=edit&id=<?php echo $_adminid;?>" target="main">修改密码</a>&nbsp;
            <a href="?file=logout" target="_top">退出</a>
    </div>
    
    <ul id="nav">
<?php $DATA = get("SELECT * FROM `dc_menu` WHERE `pass`=1 AND `parentid`=0 $menusql AND menuid not in(1,84) ORDER BY `listorder`, `menuid`", 0, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>

<? if($r[menuid]==2) { ?>
       <li class="selected">
       <a href="#" onclick="return gotoMenu(this,'<?php echo $r[menuid];?>','file=menu&action=goto&menuid=<?php echo $r[menuid];?>');" onfocus="this.blur()"><?php echo $r[name];?></a>
       </li>
<? } else { ?>
       <li class="unselected">
       <a href="#" onclick="return gotoMenu(this,'<?php echo $r[menuid];?>','file=menu&action=goto&menuid=<?php echo $r[menuid];?>');" onfocus="this.blur()"><?php echo $r[name];?></a>
       </li>
<? } ?>
<?php } unset($DATA); ?>
    </ul>

  <div style="clear:both"></div>
</div>


</div>

<table border="0" cellPadding="0" cellSpacing="0" height="100%" width="100%" style="table-layout: fixed;">
<tr>
<td width="188" height="100"></td><td></td></tr>
<tr>

<td><iframe frameborder="0" id="menu" name="menu" src="?app=admin&mod=menu&action=left&parentid=2" scrolling="auto" style="height: 100%; visibility: inherit; width: 100%; z-index: 1;overflow: auto; "></iframe></td>

<td><iframe frameborder="0" id="main" name="main" src="?app=admin&mod=home" scrolling="yes" style="height: 100%; visibility: inherit; width: 100%; z-index: 1;overflow: auto;"></iframe></td>

</tr></table>

</body>
</html>