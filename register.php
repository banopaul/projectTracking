<?php
include 'config.php';
if (isset($_POST['register'])) {
    $name = $_POST['signupName'];
    $phone = $_POST['signupPhone'];
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];



    $result = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
    if (mysqli_num_rows($result) > 0) { ?>
        <script>
            alert('Email already exists.');
        </script>
        <?php    } else {
        $sql = "INSERT INTO user (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
        if (mysqli_query($conn, $sql)) {
        ?>
            <script>
                alert('Registered successfully.');
                window.location.replace("<?php echo SITEURL ?>index.php");
            </script>
        <?php


        } else {
        ?>
            <script>
                alert('Error!');
            </script>
<?php
        }
    }
}
?>