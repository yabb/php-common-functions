<?php
/**
 * 引入qqwry类
 * 引入qqwry.bat纯正库gb2312编码
 * 文件编码utf-8
 */
include 'qqwry.class.php';
$ip = "58.248.201.82";
$qqwry = new qqwry();
$qqwry->findQQwry($ip);
$city =  $qqwry->Country;
//广东省广州市
echo iconv('gb2312', 'utf-8',  $city);
?>