<?php

/*$arr = array (10, 20, 30, 40, 50, 60);
echo "$arr[0]";
$arr[0] = "30";*/
/*foreach ($arr as $val) {
  echo "$val \n";
}*/

/*$arr = array ("Ram", "Laxman", "Sita");
foreach ($arr as $val) {
  echo "$val \n";
}*/


// function to demonstrate static variables
/*function static_var()
{
  // static variable
  static $num = 5;
  $sum = 2;

  $sum++;
  $num++;

  echo $num, "\n";
  echo $sum, "\n";
}

// first function call
static_var();

// second function call
static_var();*/

/*$val = 5;
$val2 = 2;
$x_Y = "gfg";
$_X = "GeeksforGeeks";

// This is an invalid declaration as it
// begins with a number
$h10_val = 56;

// This is also invalid as it contains
// special character other than _
$fd = "num";*/
/*
$num = 60;

function local_var()
{
  // This $num is local to this function
  // the variable $num outside this function
  // is a completely different variable
  $num = 50;
  echo "local num = $num \n";
}

local_var();

// $num outside function local_var() is a
// completely different Variable than that of
// inside local_var()
echo "Variable num outside local_var() is $num \n";


*/
/*
$num = 20;

// function to demonstrate use of global variable
function global_var()
{
  // we have to use global keyword before
  // the variable $num to access within
  // the function
  global $num;

  echo "Variable num inside function : $num \n";
}

global_var();

echo "Variable num outside function : $num \n";*/
/*$sub = array("DBMS", "Algorithm", "C++", "JAVA");

// Find length of array
$len = count( $sub );

// Loop to print array elements
for( $i = 0; $i < $len; $i++) {
  echo $sub[$i] . "\n";
}*/


/*// Declare an associative array
$detail = array("Name" => "GeeksforGeeks",
  "Address" => "Noida",
  "Type" => "Educational site");

// Display the output
var_dump($detail);*/
/*$detail = array(array(1, 2, 3, 4),
  array(5, 6, 7, 8));

// Display the output
var_dump ($detail);*/
/*function change_case($in_array){
  return(array_change_key_case());
}

// Driver Code
$array = array("Aakash" => 90, "RagHav" => 80,
  "SiTa" => 95, "rohan" => 85, "RISHAV" => 70);
print_r(change_case($array));*/
/*$input_array = array('a', 'b', 'c', 'd', 'e');

print_r(array_chunk($input_array, 2));*/
/*function Column($c): array
{
  $r = array_column($c,'hobby');
  return $r;
}

$c = array(
  array(
    'roll'=>5,
    'name'=>'Aka',
    'hobby'=>'fav',
  ),
  array(
    'roll'=>1,
    'name'=>'Afw',
    'hobby'=>'aev',
  ),
  array(
    'roll'=>3,
    'name'=>'agwvb',
    'hobby'=>'abrfe',
  ),
  array(
    'roll'=>4,
    'name'=>'begbh',
    'hobby'=>'begte',
  ),
  array(
    'roll'=>2,
    'name'=>'agqvv',
    'hobby'=>'afbe',
  ),

);
print_r(Column($c));*/
/*function Combine($array1, $array2): array
{
  return(array_combine($array1, $array2));
}

// Driver Code
$array1 = array("Ram", "Akash", "Rishav");
$array2 = array('24', '30', '45');

print_r(Combine($array1, $array2));*/
/*function Counting($array): array
{
  return(array_count_values($array));
}

// Driver Code
$array = array("Geeks", "for", "Geeks", "Geeks", "Welcome", "for");
print_r(Counting($array));*/
/*function Difference($array1, $array2, $array3){
  return(array_diff($array1, $array2, $array3));
}

// Driver Code
$array1 = array('a', 'b', 'c', 'd', 'e', 'f');
$array2 = array('a', 'b', 'g', 'h');
$array3 = array('a', 'f', 'i');
print_r(Difference($array1, $array2, $array3));*/

/*$array1 = array("10"=>"RAM", "20"=>"LAXMAN", "30"=>"RAVI",
  "40"=>"KISHAN", "50"=>"RISHI");
$array2 = array("10"=>"RAM", "70"=>"LAXMAN", "30"=>"KISHAN",
  "80"=>"RAGHAV");
$array3 = array("20"=>"LAXMAN", "80"=>"RAGHAV");

print_r(array_diff_assoc($array1, $array2, $array3));*/

/*$array1 = array("10"=>"RAM", "20"=>"LAXMAN", "30"=>"RAVI",
  "40"=>"KISHAN", "50"=>"RISHI");
$array2 = array("10"=>"RAM", "70"=>"LAXMAN",
  "30"=>"KISHAN", "80"=>"RAGHAV");
$array3 = array("30"=>"LAXMAN", "80"=>"RAGHAV");

print_r(array_diff_key($array1, $array2, $array3));*/

/*function user_function($a, $b)
{
  if ($a===$b)
  {
    return 0;
  }
  return ($a>$b)? 1: -1;
}

// Input Arrays
$a1=array(10=>"striver", 20=>"raj", 30=>"geek");
$a2=array(20=>"striver", 10=>"raj", 30=>"geek");

$result = array_diff_uassoc($a1, $a2, "user_function");

print_r($result);*/


function arr_diffukeyFunction($one, $two)
{
  if ($one === $two) {
    return 0;
  }
  return ($one > $two) ? 1 : -1;
}

// Driver Code

/*$arr1 = array(
  "one" => "C Program",
  "two" => "PHP Program",
  "three" => "Java Program "
);
$arr2 = array(
  "one" => "Java Program",
  "two" => "C++ Program",
  "six" => "Java Program"
);

$result = array_diff_ukey($arr1, $arr2, "arr_diffukeyFunction");
print_r($result);*/
/*$keys = array('golden', 25, 560, 'age');

// Creating new array with specified keys
$a = array_fill_keys($keys, 'majestic');

print_r($a);*/
/*$today = unixtojd(mktime(0, 0, 0, 6, 20, 2007));

print_r(cal_from_jd($today, CAL_JEWISH));*/
//print_r(cal_info(0));
$date = cal_to_jd(CAL_GREGORIAN, 11, 03, 2007);
echo $date;
?>

