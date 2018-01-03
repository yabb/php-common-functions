<?php 

/**
 * 创建文件目录
 * @param string $path
 */
function createDir($dir,$mode=0777){
	if(!is_dir($dir)) {
		@createDir(dirname($dir));
		@mkdir($dir);
	}
}
?>