<?php 
require ('connection.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="./webtech_project_css/loginstyling.css">
</head>
<body>
  
  <header style="height:10%;background-color: #e0da89;color:#23ba98;">
    <h2>Web Tech Traning</h2>
    <nav style='color:#23ba98;'>
      <a href="#" style='color:#23ba98;'>HOME</a>
      <a href="#" style='color:#23ba98;'>BLOG</a>
      <a href="#" style='color:#23ba98;'>CONTACT</a> 
      <a href="#" style='color:#23ba98;'>ABOUT</a>
    </nav>
    <?php
      if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']==true)
      {
        echo"
          $_SESSION[username] - <a href='logout.php'>Logout</a>
        ";

      }
      else
      {
        echo" 
          <div class='sign-in-up'>
            <button type='button' onclick=popup('login-popup')>LOGIN</button>
            <button type='button' onclick=popup('register-popup')>REGISTER</button>
          </div>
        ";
      }
    ?>
    <!-- <div class='sign-in-up'>
      <button type='button' onclick="popup('login-popup')">LOGIN</button>
      <button type='button' onclick="popup('register-popup')">REGISTER</button>
    </div> -->
  </header>

  <div class="popup-container"  id="login-popup">
    <div class="popup" style="background-image:url('./images/bg.avif'); background-size:cover;background-repeat:no-repeat;">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup" style="background-image:url('./images/bg2.jpg'); background-size:cover;background-repeat:no-repeat;">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>
  <div style='background-image:url("./images/web_theme.jpg");background-size: cover;background-repeat: no-repeat;width:100vw;height:90vh;display:flex;'> 
  <?php
    if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']==true)
    {
      echo"<h1 style='color:#1b2495;margin-left:30%;margin-top:10%;'>WELCOME TO THE WEBSITE - $_SESSION[username]😊</h1>";
    }else{
      echo"<h1 style='color:#762abf;margin-left:30%;margin-top:10%;'>Please Login to continue further😎</h1>";
    }
  ?>
  </div>

  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

</body>
</html>