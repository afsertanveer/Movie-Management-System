<!DOCTYPE html>
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
</head>
<body>
  <?php
  include('config.php');   
     
  ?>

  <?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = pg_query($db, "select * from users where username='$username'");
    $num_of_row=pg_num_rows($result);
    if($num_of_row==1){
    while ($rows =  pg_fetch_assoc($result)) {
        
        $u_id=$rows['u_id'];
        $role= $rows['role'];
        $pw=$rows['password'];
    }
    if($password==$pw){
      //role 1-> for admin 2-> user 3->filmRelatedperson
      if($role==1) {
        session_start();
        $_SESSION['user_id'] = $u_id;
        $_SESSION['flag']=1;
        header("Location: admin_index.php");
      }
      else if ($role==2) {
        session_start();
        $_SESSION['user_id'] =$u_id;
        $_SESSION['flag']=1;
        header("Location: users_index.php");
      }
      else{

        session_start();
        $_SESSION['user_id'] = $u_id;
        $_SESSION['flag']=1;
        header("Location: frp_index.php");

      }
    }
    else{
      echo '<script>alert("Wrong Password")</script>';
    }
    
  }
else{
  echo '<script>alert("Wrong Username")</script>';
}
  }
  ?>
    <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.php" class="logo">
                          Cineplex System
                      </a>
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                          <li><a href="logIn.php">LogIn</a></li>
                          <li class="scroll-to-section"><a href="contact.php">Contact</a></li> 
                      </ul> 
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <section class="contact-us" id="contact" style="height: 1420px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12"  style="margin-top: 10%; margin-left: 25%;">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Log In</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <p>User Name</p>
                      <input name="username" type="text" id="username" placeholder="ENTER YOUR USER NAME" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <p>Password</p>
                      <input name="password" type="Password" id="password" placeholder="ENTER PASSWORD" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12" style="margin-top: 10px;">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">Log In</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>