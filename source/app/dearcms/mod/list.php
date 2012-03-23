<?php
require dirname(__FILE__).'/inc/common.inc.php';
require 'form.class.php';

if(!isset($CAT[$cat])) showmessage('访问的栏目不存在！');

//获取栏目属性
$C = $CAT[$cat];extract($C);
$_settingcat = substr($cat,0,2);
$_setting = ($CAT[$_settingcat][module] == 'shop') ? $CAT[$_settingcat][setting] : '';
extract(string2array($_setting));

$template = $template ? "list_$template" : "list";


//获取栏目信息列表
        $where = "  `status`=99 ";
        if($typeid) $where .= " AND `typeid`='$typeid' ";
        if($shopid) $where .= " AND `shopid`='$shopid' ";
        if($areacode)               $where .= " AND `areacode` LIKE '%$areacode%'";
        if($cat)                 $where .= " AND `catcode` LIKE '%$cat%'";

        if($q)
        {
                if($field == 'title')
                {
                    $where .= " AND `title` LIKE '%$q%'";
                }
                elseif($field == 'userid')
                {
                    $userid = intval($q);
                    if($userid)	$where .= " AND `userid`=$userid";
                }
                    elseif($field == 'username')
                {
                    $userid = userid($q);
                    if($userid)	$where .= " AND `userid`=$userid";
                }
                    elseif($field == 'contentid')
                {
                    $contentid = intval($q);
                    if($contentid) $where .= " AND `contentid`=$contentid";
                }
        }

        $infos = $c->listinfo($where, '`listorder` DESC,`contentid` DESC', $page, 20);
        $pages = $c->pages;



$head['title'] = catname($cat).'_'.$DC['sitename'];
$head['keywords'] = catname($cat).','.$DC['sitename'];
$head['description'] = $M['name'].'_'.$M['seo_description'].'_'.$DC['sitename'];

include template($template);
?>