<?php 
/**
 * RMB数字转文字
 * @param number $num
 * @return string
 */
function num2rmb($num) {
	$c1 = "零壹贰叁肆伍陆柒捌玖";
	$c2 = "分角元拾佰仟万拾佰仟亿";
	$num = round($num, 2);
	$num = $num * 100;
	if (strlen($num) > 10) {
		return "oh,sorry,the number is too long!";
	}
	$i = 0;
	$c = "";
	while (1) {
		if ($i == 0) {
			$n = substr($num, strlen($num)-1, 1);
		} else {
			$n = $num % 10;
		}
		$p1 = substr($c1, 3 * $n, 3);
		$p2 = substr($c2, 3 * $i, 3);
		if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {
			$c = $p1 . $p2 . $c;
		} else {
			$c = $p1 . $c;
		}
		$i = $i + 1;
		$num = $num / 10;
		$num = (int)$num;
		if ($num == 0) {
			break;
		}
	} //end of while| here, we got a chinese string with some useless character
	$j = 0;
	$slen = strlen($c);
	while ($j < $slen) {
		$m = substr($c, $j, 6);
		if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {
			$left = substr($c, 0, $j);
			$right = substr($c, $j + 3);
			$c = $left . $right;
			$j = $j-3;
			$slen = $slen-3;
		}
		$j = $j + 3;
	}
	if (substr($c, strlen($c)-3, 3) == '零') {
		$c = substr($c, 0, strlen($c)-3);
	} // if there is a '0' on the end , chop it out
	return $c . "整";
}
?>