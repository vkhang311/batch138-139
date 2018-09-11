
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$emailErr = $passwordErr = "";

if(isset($_POST['submit'])) {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "Password is	required";
  }
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="#">  
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="text" name="password">
  <span class="error"><?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>