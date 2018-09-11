<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="#" method="post">
  Name:<br>
  <input type="text" name="name" value="">
  <br>
  Email:<br>
  <input type="text" name="email" value="">
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form> 
<?php
	if(isset($_POST['submit'])) {
		echo "Da submit" . "<br>";
		echo $_POST['name'] . "<br>";
		echo $_POST['email'] . "<br>";
	}
	//có thể thay POST bằng GET
?>
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>
