<?php
	$arr = array();
	//var_dump($arr); -- debug du lieu
	//console.log(s);
	$arr = array('Trung','Huyen','Khanh');
	$arr1 = array(0=> 'Trung',1=> 'Huyen',2=> 'Khanh');
	$arr2 = array('t'=> 'Trung','h'=> 'Huyen','k'=> 'Khanh');
	//var_dump($arr);
	//var_dump($arr1);
	//var_dump($arr2);
	echo $arr[0];
	echo "<br>";
	echo $arr2['h'];
	//sua gia tri cua mot phan tu
	$arr2['h'] = "Bich Huyen";
	echo "<br>";
	echo $arr2['h'];
	echo "<br>";
	foreach($arr2 as $key => $value){
		echo $value;
		echo "<br>";
	}
	//them 1 phan tu vao mang
	$arr2['k'] = "Khang";
	echo "<br>";
	echo $arr2['k'];
	//them 1 phan tu vao mang bang array_push
	array_push($arr2, 'Hung');
	foreach($arr2 as $key => $value){
		echo $value;
		echo "<br>";
	}
?>