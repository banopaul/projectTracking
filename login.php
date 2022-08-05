<?php
include 'config.php';
if(isset($_POST['login']))
{

	$login_email = $_POST['loginEmail'];
	$password= $_POST['loginPassword'];
	$select_login = "SELECT * from user where email = '$login_email' AND password = '$password'";
	$result = mysqli_query($conn, $select_login);

	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_id'] =$row['id'];
		$_SESSION['name'] =$row['name'];
		
		
		?>
		<script>
					
			window.location.replace("<?php echo SITEURL?>index.php");
			
		</script>
        <?php
	}
	else
	{
	?>
		<script>
			alert('Incorrect Login details!');		
			window.location.replace("<?php echo SITEURL?>index.php");
			
		</script>
        <?php
	}
		
}
?>