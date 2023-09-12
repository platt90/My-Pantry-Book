<link rel="stylesheet" href="login.css">
<div class="wrapper">
  <div id="formContent">
    <title>My Pantry Book</title>
    <!-- Tabs Titles -->
    <h1> My Pantry Book </h1>

    <!-- Icon -->
    <div class="Logo">
      <img src="Images/logo.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="login.php" method="post" enctype="multipart/form-data">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <?php
      if (isset($_GET["msg"]) == 'failed') {
        echo '<div id="failed"> Invalid Username / Password </div>';
      } 
      if (isset($_GET["msg2"]) == 'account_created') {
        echo '<div id="account_created"> Account Created Succesfully </div>';
      }
      if (isset($_GET["msg3"]) == 'account_deleted') {
        echo '<div id="account_created"> Account Deleted Succesfully </div>';
      }
      ?>
      <p><input type="submit" value="Login" name="submit"></p>
    </form>

    <hr class="solid">
    <!-- Create Account Form-->
    <form action="create-account.html" method="post" enctype="multipart/form-data">
      <p><input type="submit" value="Create New Account" name="submit"></p>
    </form>

  </div>
</div>