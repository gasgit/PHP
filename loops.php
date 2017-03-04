<?php

echo("For Loop!\n");
for($f=0; $f<10; $f++){
    echo("For @: $f\n");
}

echo("While Loop!\n");
$w = 0;
$num = 50;

while($w < 20){
    $num--;
    $w++;
}
echo("Loop Stopped @ i = $w and num $num\n");

echo("Do While Loop!\n");
$d = 0;

do{
    $d++;

}while($d <5);
    echo("Stopped  @ $d\n");

echo("ForEach Loop!\n");

$array = array(1,2,3,4,5,6,7);

foreach($array as $value){
    echo("Value is $value\n");
}


?>