<?php
session_start();
require "dbcon.php"
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Student</title>
</head>

<body>
    <div class="container mt-5">
        <? include('message.php'); ?>
        <div class="row">
            <div class="col-md-12  m-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Student</h4>
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </div>
                    <div class="card-boy">

                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * from students WHERE id= '$student_id' ";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <input type="text" name="name" value="<?= $student["name"]; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <input type="email" name="email" value="<?= $student["email"]; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <input type="text" name="phone" value="<?= $student["phone"]; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Course</label>
                                        <input type="text" name="course" value="<?= $student["course"]; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No record found</h4>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>