<?php

$xhrDoc = new DOMDocument();
$xhrDoc -> load("books.xml");
$b = $xhrDoc-> getElementsByTagName('book');

$q = $_GET['q'];
if(strlen($q)>0)
{
    $hint="";
    for($i=0; $i<($b->length);$i++)
    {
        $y=$b->item($i)->getElementsByTagName('author');
        $z=$b->item($i)->getElementsByTagName('author'); 
        if ($y->item(0)->nodeType==1) {
            //find a link matching the search text
           if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
           {
            if ($hint=="")
            {
            $hint="<a href='" . $z->item(0)->childNodes->item(0)->nodeValue .
            "' target='_blank'>" . $y->item(0)->childNodes->item(0)->nodeValue . "</a>"; }
            else {
            $hint=$hint . "<br /><a href='" . $z->item(0)->childNodes->item(0)->nodeValue .
            "' target='_blank'>" . $y->item(0)->childNodes->item(0)->nodeValue . "</a>"; 
               }
              } 
             }
            }
           }

if ($hint=="")
    {
    $response="no suggestion";
    }
    else {
        $response=$hint; 
    }
    echo $response;

?>