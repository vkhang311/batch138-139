<?php
/*
	$arr_sp = array('Bánh kẹo','Trái cây','Đồ chơi');
	InDS($arr_sp);
	array_push($arr_sp, 'Áo quần');
	InDS($arr_sp);
	$arr_sp[0] = "Thực phẩm";
	InDS($arr_sp);
	unset($arr_sp[1]);
	InDS($arr_sp);
	function InDS($arr){
		echo "<br>---------------------<br>";
		foreach($arr as $key => $value){
		echo $key . " - " .$value;
		echo "<br>";
	}
	}
*/	
	$arr3 = array(
		array(
			'name' => 'Khoi',
			'birthday' => 1997,
			'gender' => 'Male',
		),
		array(
			'name' => 'Trung',
			'birthday' => 1985,
			'gender' => 'Male',
		),
		array(
			'name' => 'Huyen',
			'birthday' => 1987,
			'gender' => 'Female',
		)
	);
	foreach($arr3 as $key => $value){
	$tuoi = 2018 - $value['birthday'];	
    echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
    echo "<br/>";
	}
	echo "<br>-----------------------<br>";
	//doi ten Trung
	$arr3[1]['name'] = "Trung Doan";
	foreach($arr3 as $key => $value){
	$tuoi = 2018 - $value['birthday'];	
    echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
    echo "<br/>";
	}
	echo "<br>-----------------------<br>";
	//them 1 thanh vien
	array_push($arr3,array(
			'name' => 'Cuong',
			'birthday' => 1996,
			'gender' => 'Male',
		));
	foreach($arr3 as $key => $value){
	$tuoi = 2018 - $value['birthday'];	
    echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
    echo "<br/>";
	}
	echo "<br>-----------------------<br>";
	//xoa Khoi ra khoi danh sach;
	array_shift($arr3);
	foreach($arr3 as $key => $value){
	$tuoi = 2018 - $value['birthday'];	
    echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
    echo "<br>";
	}
	echo "<br>-----------------------<br>";
	//in ra ds hoc sinh nam
	foreach($arr3 as $key => $value){
		if($value['gender'] == "Male"){
			$tuoi = 2018 - $value['birthday'];	
			echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
			echo "<br>";
		}
	}
	//Hàm in ra danh sách học sinh
	function inDSHS($arr3){
		foreach($arr3 as $key => $value){
		$tuoi = 2018 - $value['birthday'];	
		echo $key . "." . " {$value['name']}" . " -- " . $tuoi . " tuoi -- {$value['gender']}" ;
		echo "<br/>";
	}
	}
?>