<?php
    $array = ['Kiran','Bhavisya','aasutosh'];
    $array1 = array("name"=>"Kiran","age"=>"22","address"=>"kathmandu");
    $array2 = [
        ["kiran",22],
        ["Bhavisya",21],
        ["aasutosh",20]
    ];
    echo "<br>";
    echo " $array[0]";
    echo "<br>";
    echo $array2[0][1];
   
?>