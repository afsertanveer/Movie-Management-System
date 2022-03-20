<?php
      include('config.php');  
      session_start();
      if($_SESSION['flag']!=1)
      {
        header("Location:index.php");
      }
       $user_id = $_SESSION['user_id'] ;

       


   ?>

<!-- Show profile of the frp here --><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Film Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <style type="text/css">
        table, th, td {
        border: 1px solid white;
      }

      th,td{
        color: white;
        padding-left: 20px;
        padding-top: 15px;
      }

      table {
        width: 920px;
        margin-left: 30%;
        border-color: white;
      }

</style>
</head>
<body>
  
  <header class="header-area header-sticky">
  <?php
    include('users_header.php');
  ?>
  </header>
  <section class="contact-us" style="height: 1420px;">
  	<?php
  	$sql = pg_query($db,"SELECT f_id,rating from ratingfilm where u_id='$user_id' order by rating desc");
		$numofrow=pg_num_rows($sql);
		$i=0;
    if($numofrow>0){
      while($row=pg_fetch_assoc($sql))
      {
        $ratedfilm[$i]=$row['f_id'];
        $rating[$i]=$row['rating'];
        $i++;
        
      }
      
    }
      $sql=pg_query($db,"SELECT COUNT(f_id) AS total from film");
      while($row=pg_fetch_assoc($sql))
      {
        $tot=$row['total'];
      }
      $sizeRF=sizeof($ratedfilm);
      $sizeR=sizeof($rating);
      echo $sizeRF;
      print_r($ratedfilm);
      if($sizeRF<$tot && $sizeRF>0){
      ?>
  	<table  style="margin-top: 35px;">
    	<tr style="background-color:#a12c2f; height: 60px; border:1px solid black">
	     	<th style="border:1px solid black" >Title </th>
         <th style="border:1px solid black" >Genre </th>
         <th style="border:1px solid black" >Release Date </th>
     	</tr>
	<?php 
  $j=0;
		  for($i=0;$i<$sizeRF;$i++){
        $fmid=$ratedfilm[$i];

        $sql=pg_query($db,"SELECT genre from film where f_id='$fmid'");
        
        while($row=pg_fetch_assoc($sql))
        { 
          $g=$row['genre'];
          if($j>0){
            $flag=0;
            for($k=0;$k<$j;$k++){
              if($genre[$k]==$g)
              {
                $flag=1;

              }
            }
            if($flag==0){
              $genre[$j]=$g;
              $j++;
            }
          }else{
            $genre[$j]=$g;
            $j++;
          }
        }
        
      }
      $sizeg=sizeof($genre);
      print_r($genre);
      for($i=0;$i<$sizeg;$i++){
        $g=$genre[$i];
        $sql=pg_query($db,"SELECT film.f_id,title,genre,releasedate from film,ratingfilm where film.f_id=ratingfilm.f_id AND genre='$g'  order by rating desc");

        $x=0;
    while($rows=pg_fetch_assoc($sql)){    
     		$f_id=$rows['f_id'];

     		$flag1=0;
        for($p=0;$p<$sizeRF;$p++){
          if($f_id==$ratedfilm[$p]){
            $flag1=1;
          }
          
        }
        if($flag1==0){
          $flag2=0;
          if($x>0){
            for($q=0;$q<$x;$q++){
                if($f_id==$takenFilm[$q]){
                  $flag2=1;
                }
            }
            if($flag2==0)
            {
              $takenFilm[$x]=$f_id;
              $x++;
            }

          }else
          {
            $takenFilm[$x]=$f_id;
            $x++;
          }
          if($flag2==0){

     	
	?>
	   <tr style="background-color:#a12c2f; vertical-align:top; border:1px solid black;">
	    	<td style="border:1px solid black" > <?php echo $rows['title'] ; ?> </td>
			<td style="border:1px solid black" ><?php echo $rows['genre']; ?> </td>
      <td style="border:1px solid black" ><?php echo $rows['releasedate']; ?> </td>
		
	   </tr>
   <?php        
                      }
                    }
                 }
              }  
          } 
   ?> 
   </table>
  </section>
</body>
</html>