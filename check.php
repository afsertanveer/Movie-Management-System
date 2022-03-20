<?php
 
 $asd='afser,tanveer';
 $a =explode(',',$asd);
 print_r($a);
 $c=',';
 if(strpos($asd,$c)!=False){
 	echo 'Comma exists';
 }

?>