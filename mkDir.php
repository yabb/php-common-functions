<?php 

/**
 * 遍历创建文件夹
 * @param	string	$dir	路径
 * @param	integer	$mode	文件夹权限
 * @return	boolean
 */
function mk_dir($dir,$mode=0777,$index=true) {
	if(!is_dir($dir)) {
		mk_dir(dirname($dir));
		mkdir($dir);
		if($index)@file_put_contents($dir.'/index.htm','');
	}
}
?>