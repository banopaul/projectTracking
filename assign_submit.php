<?php
include 'header.php';
$member_id = $_SESSION['user_id'];
if (isset($_POST['upload'])) {
    $assign_id = $_GET['id'];
    $target_dir = "submitted_task/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);

    $file = $_FILES["upload"]["name"];


    $url = SITEURL . $target_dir . $_FILES["upload"]["name"];



    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {


        $sql = "INSERT INTO submitted_task(assign_task,member_id,submitted_file) 
          VALUES ('$assign_id','$member_id','$url')";
        if (mysqli_query($conn, $sql)) {
?>
            <script>
                alert('Uploaded Successfuly!');
                window.location.replace("assignment.php");
            </script>
        <?php


        } else {
        ?>
            <script>
                alert('Error!');
                window.location.replace("assignment.php");
            </script>
<?php
        }
    }
}
?>

<style>
    td button {
        border: none;
        background-color: #ffc107;
        border-radius: 8px;
        color: #fff;
    }
</style>
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Our Assignment</a></li>
                    <li class="list-inline-item text-white h3 font-secondary "></li>
                </ul>
                <p class="text-lighten">Our assignment offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="assignment mt-5 mb-5">
    <div class="container">
        <form class="row" action="" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <label>Upload Your Submission</label>
                <input type="file" class="form-control pt-3 mb-3" id="upload" name="upload">
            </div>
            <br>
            <div class="col-12">
                <button type="submit" name="upload" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
</section>
<!-- /courses -->
<?php
include 'footer.php';
?>