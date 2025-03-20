<!DOCTYPE html>
<html>
<body>

<?php

// data-types in php
/*
String
Integer
Float
Boolean
Array
Object
NULL
Resource
----------------
The var_dump() function returns the data type and the value
*/
$a = 'Random String';
print_r($a);
$b = 5874;
$c = 10.541;
$d = true;
$e = array('Volvo','BMW','Toyota');



var_dump($a); echo("<br>");
var_dump($b); echo("<br>");
var_dump($c); echo("<br>");
var_dump($d); echo("<br>");
var_dump($e); echo("<br>");
var_dump($d); echo("<br>");

//php object
class Car{
    public $color;
    public $brand;

    public function __construct($color, $brand) {
        $this->color = $color;
        $this->brand = $brand;
      }

    public function message(){
        return "My car brand is " .$this->brand . " and color is " .$this->color;
    }
}

$myCar = new Car('red','Toyota');
print_r($myCar);

?>



</body>
</html>
