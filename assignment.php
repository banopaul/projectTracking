<?php
include 'header.php';
$member_id = $_SESSION['user_id'];

$sql = "SELECT * from assign_task where member = '$member_id'";
$query = mysqli_query($conn, $sql);
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
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Assignment Name</th>
                        <th scope="col">Assignment</th>
                        <th scope="col">Assign Date</th>
                        <th scope="col">Submission Date</th>
                        <th scope="col">Submission Upload</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($fetch = mysqli_fetch_assoc($query)) {
                        $member_id = $fetch['member'];
                        $project_id = $fetch['projects'];
                        $assign_id = $fetch['id'];

                        $sql2 = "select * from projects where id = '$project_id'";
                        $query2 = mysqli_query($conn, $sql2);
                        $fetch2 = mysqli_fetch_assoc($query2);

                        $sql1 = "select * from user where id = '$member_id'";
                        $query1 = mysqli_query($conn, $sql1);
                        $fetch1 = mysqli_fetch_assoc($query1);
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $fetch2['project_name'] ?></td>
                            <td><a href="<?php echo $fetch2['file'] ?>"><?php echo $fetch2['file'] ?></a></td>
                            <td><?php echo $fetch['assign_date'] ?></td>
                            <td><?php echo $fetch['submission_date'] ?></td>
                            <?php
                            $sql3 = "select * from submitted_task where assign_task = '$assign_id'";
                            $query3 = mysqli_query($conn, $sql3);
                            $fetch3 = mysqli_fetch_assoc($query3);

                            if ($fetch3['assign_task'] != $fetch['id']) {
                            ?>
                                <td><button><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="assign_submit.php?id=<?php echo $fetch['id'] ?>">Upload</a></button>

                                </td>
                            <?php
                            } else {
                            ?>
                                <td>
                                    <a href="<?php echo $fetch3['submitted_file'] ?>"><?php echo $fetch3['submitted_file'] ?></a>
                                </td>
                            <?php
                            }
                                if ($fetch3['approval_status'] == 0) {
                                ?>
                                    <td>In Checking</td>
                                <?php
                                } elseif($fetch3['approval_status'] == 1) {
                                ?>
                                    <td> Approved</td>
                                <?php
                                }
                                else {
                                    ?>
                                    <td>Disapproved</td>
                                    <?php
                                }
                                ?>
                        </tr>
                    <?php
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /courses -->
<?php
include 'footer.php';
?>