<?php
	echo "<br> Bai tap 1 <br>";
	$a = 5;
	if($a%2==0) {
		echo $a . " la so chan";
	} else {
		echo $a . " la so le <br>";
		if($a%3==0) {
			echo $a . " chia het cho 3";
		} else{
			echo $a . " khong chia het cho 3";
		}
	}
	echo "<br> Bai tap 2 <br>";
	$b = 9;
	switch($b) {
		case '1':
			echo "Day la thang 1";
			break;
		case '2':
			echo "day la thang 2";
			break;
		case '3':
			echo "day la thang 3";
			break;
		case '4':
			echo "day la thang 4";
			break;
		case '5':
			echo "day la thang 5";
			break;
		case '6':
			echo "day la thang 6";
			break;
		case '7':
			echo "day la thang 7";
			break;
		case '8':
			echo "day la thang 8";
			break;
		case '9':
			echo "day la thang 9";
			break;
		case '10':
			echo "day la thang 10";
			break;	
		case '11':
			echo "day la thang 11";
			break;	
		case '12':
			echo "day la thang 12";
			break;		
		default:
			echo "khong phai thang trong nam";
			break;
	}
	
	echo "<br> Bai tap 3 <br>";
	
?>