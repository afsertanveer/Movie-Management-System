<?php
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = fms";
   $credentials = "user = postgres password=afserdb";

 $db = pg_connect( "$host $port $dbname $credentials"  );

?>