<?php 
$var1 =100;
$var2Ref=&$var1;
$var3Cop=$var1;
echo "$var2Ref<br>";
echo "$var3Cop<br>";
$var1=300;
echo "$var2Ref<br>";
echo "$var3Cop<br>";
$var1 = 400;
echo "$var1<br>";
echo "$var2Ref<br>";
echo "$var3Cop<br>";
?>