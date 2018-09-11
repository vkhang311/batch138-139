<?php
for($i=1;$i<=40;$i++){
    echo "<br>";
    if($i%15==0) echo "MUOI LAM";
    else if($i%3==0) echo "BA";
    else if($i%5==0) echo "NAM";
    else echo "KHONG CHIA HET CHO 3, 4, 15";

}
?>