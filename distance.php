<?php

/**
 * 根据经纬度计算两地距离
 * @param number $lat1 位置1经度
 * @param number $lng1 位置1纬度
 * @param number $lat2 位置2经度
 * @param number $lng2 位置2纬度
 */
function getDistance($lat1, $lng1, $lat2, $lng2){
	$earthRadius = 6367000;
	$lat1 = ($lat1 * pi()) / 180;
	$lng1 = ($lng1 * pi()) / 180;
	$lat2 = ($lat2 * pi()) / 180;
	$lng2 = ($lng2 * pi()) / 180;
	

	$calcLongitude = $lng2 - $lng1;
	$calcLatitude  = $lat2 - $lat1;

	$step1 = cos($lat1) * cos($lat2) * pow( sin($calcLongitude/2), 2);
	$step1 +=  pow( sin( $calcLatitude / 2 ), 2);
	$step2 = 2 * asin( min(1, sqrt($step1)) );

	$calcDistance = $step2 * $earthRadius;
	
	echo "distance: " . round($calcDistance,0) . "m";

}


//"113.33173", "23.133513" 广州市天河区黄埔大道西163号
//"113.344229", "23.131777" 广州市天河区黄埔大道西108号
getDistance("113.33173", "23.133513", "113.344229", "23.131777");

?>