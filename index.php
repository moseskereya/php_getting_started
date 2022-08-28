<?php
require "dbcon.php"
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>App</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h4>Students Details</h4>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary">
                    <a class="text-light" href="student-create.php">Add Student</a>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped m-4">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>

                    <?php
                    $query = "SELECT * from students";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $student) {
                    ?>
                    <tr>
                                <td><?= $student['id']; ?></td>
                                <td><?= $student['name']; ?></td>
                                <td><?= $student['email']; ?></td>
                                <td><?= $student['phone']; ?></td>
                                <td><?= $student['course']; ?></td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">View</a>
                                    <a href="student-edit.php?id=<?= $student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo '<h5>No record found.</h5>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>