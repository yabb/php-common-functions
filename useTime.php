<?php 

/**
 * 计算用时
 * @param int $stime
 * @param int $etime
 * @return string
 */
function getUseTime($stime,$etime){
	if($etime<=$stime){
		return '0ms';
	}
	$useTime= $etime-$stime;
	$date	= floor($useTime/86400);
	$hour	= floor($useTime%86400/3600);
	$minute	= floor($useTime%86400/60);
	$second	= floor($useTime%86400%60);
	return sprintf("%d day, %d hour, %d min, %d sec",$date,$hour,$minute,$second);
}
?>