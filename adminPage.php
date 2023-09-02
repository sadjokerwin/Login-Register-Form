<?php
    session_start();
    require 'DbConnection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <a href="RegistrationPageMain.php" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>firsName</th>
                                    <th>lastName</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($db, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $users)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $users['firstName']; ?></td>
                                                <td><?= $users['lastName']; ?></td>
                                                <td><?= $users['username']; ?></td>
                                                <td><?= $users['password']; ?></td>
                                                <td><?= $users['email']; ?></td>
                                                <td>
                                                    <a href="user-view.php?username=<?= $users['username']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="user-edit.php?username=<?= $users['username']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>