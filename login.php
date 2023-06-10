<?php 
require 'koneksi.php';


if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE 
  username = '$username'");


  if( mysqli_num_rows($result) === 1) {
    
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"]) ){
      header("Location: : hello.php");
      exit;

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AndiB Coffe Beans</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  </head>
  <body >
    <div class="header">
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <img src="images/logo.jpg.jfif" width="100px" />
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="index.html">Home</a></li>
              <li><a href="products.html">Products</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="account.html">Account</a></li>
            </ul>
          </nav>
          <a href="cart.html"><img src="images/logo shopping.png" width="30px" height="30px" /></a>
          <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
        </div>
      </div>
    </div>

    <!---------- account-page ---------->

    <div class="account-page" style="background-image: url(../TES/images/background.jpg);background-size: 150%; background-repeat: no-repeat;" >
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="images/home-png.png" width="100%" />
          </div>

          <div class="col-2">
            <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span> 
                <span onclick="register()">Register</span>
                <hr id="Indicator" />
              </div>

              <form id="LoginForm" method="post">
                <input type="text" name = "username" id="username" placeholder="Username" />
                <input type="password" name ="password" id="password "placeholder="Password" />
                <button type="submit" name = "login">Login</button>
                <button type="submit" btn><a href="admin/dist/index.html">Login as admin</button></a> 
                <a href="lupapassword.html">Forgot Password</a>
              </form>

              <form id="RegForm">
                <input type="text" placeholder="Username" />
                <input type="text" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button type="submit class=" btn>Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!---------- footer ---------->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>HOPE YOU'RE ENJOY</h3>
            <p>This is our first website</p>
          </div>
          <div class="footer-col-2">
            <img src="images/logo.jpg.jfif" />
            <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Coffe Beans to the Many</p>
          </div>
          <div class="footer-col-3">
            <h3>Follow Us</h3>
            <ul>
              <li>FaceBook</li>
              <li>Instagram</li>
              <li>Twitter</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright - proyek 1</p>
      </div>
    </div>

    <!----------js for toggle menu---------->
    <script>
      var MenuItems = document.getElementById('MenuItems');

      MenuItems.style.maxHeight = '0px';

      function menutoggle() {
        if (MenuItems.style.maxHeight == '0px') {
          MenuItems.style.maxHeight = '200px';
        } else {
          MenuItems.style.maxHeight = '0px';
        }
      }
    </script>

    <!----------js for toggle menu---------->

    <script>
      var LoginForm = document.getElementById('LoginForm');
      var RegForm = document.getElementById('RegForm');
      var Indicator = document.getElementById('Indicator');

      function register() {
        RegForm.style.transform = 'translateX(0px)';
        LoginForm.style.transform = 'translateX(0px)';
        Indicator.style.transform = 'translateX(100px)';
      }
      function login() {
        RegForm.style.transform = 'translateX(300px)';
        LoginForm.style.transform = 'translateX(300px)';
        Indicator.style.transform = 'translateX(0px)';
      }
    </script>
  </body>
</html>