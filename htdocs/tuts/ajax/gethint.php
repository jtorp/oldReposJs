<?php

$a[]= "tomato soup";
$a[]= "tunament";
$a[]= "chicken";
$a[]= "burrito";
$a[]= "bean salad";
$a[]= "chickpea soup";    
$a[]= "club sandwitch";
$a[]= "panckes";
$a[]= "pizza";
$a[]= "bagel";
$a[]= "banana";
$a[]= "smoothie";
$a[]= "avocado sandwitch";


$q= $_GET['q'];

if (strlen($q) > 0)
{
    $hint="";
    for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
    {
    if ($hint=="")
    { $hint=$a[$i]; }
    else {
    $hint=$hint.", ".$a[$i];
    } }
    } }
    // Set output to "no suggestion" if no hint  found 
    if ($hint == "")
    {
    $response="no suggestion"; }
    else {
    $response=$hint;
    }
    echo $response;
    
    ?>