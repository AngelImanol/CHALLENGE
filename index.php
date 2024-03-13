<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Database</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "config.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Create User
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_GET['id'];
        $name = input($_POST["name"]);
        $username = input($_POST["username"]);
        $email = input($_POST["email"]);
        $phone = input($_POST["phone"]);
        $jobs = input($_POST["jobs"]);

        //Query input menginput data kedalam tabel anggota
        $create = "insert into users (name,username,email,phone,jobs) values
		('$name','$username','$email','$phone','$jobs')";

        //Mengeksekusi/menjalankan query diatas
        $result = mysqli_query($conn, $create);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($result) {
            echo "<div class='alert alert-success'> Data Berhasil disimpan.</div>";
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="margin">CRUD Database</h3>
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">User Database</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Create</button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left d-inline" id="exampleModalLabel">Create New User
                                                <button type="button" class="close d-inline" data-dismiss="modal">&times;</button></h5>
                                            </div>
                                            <div class="modal-body text-left">
                                                <form form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="form1">
                                                    <div class="form-group mb-2">
                                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                                        <input type="text" class="form-control" id="user-name" name="name" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="recipient-name" class="col-form-label">Username:</label>
                                                        <input type="text" class="form-control" id="user-name" name="username" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                                        <input type="text" class="form-control" id="user-email" name="email" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="recipient-name" class="col-form-label">Number Phone:</label>
                                                        <input type="text" class="form-control" id="user-phone" name="phone" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="recipient-name" class="col-form-label">Jobs:</label>
                                                        <input type="text" class="form-control" id="user-jobs" name="jobs" required>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left" id="updateModalLabel">Update User
                                    <button type="button" class="close d-inline" data-dismiss="modal">&times;</button></h5>
                                </div>
                                <div class="modal-body text-left">
                                    <form form action="update.php" method="post" name="update_user">
                                        <div class="form-group mb-2">
                                            <label for="user-name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="user-name" name="name" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="user-username" class="col-form-label">Username:</label>
                                            <input type="text" class="form-control" id="user-username" name="username" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="user-emai" class="col-form-label">Email:</label>
                                            <input type="text" class="form-control" id="user-email" name="email" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="user-phone" class="col-form-label">Number Phone:</label>
                                            <input type="text" class="form-control" id="user-phone" name="phone" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="user-jobs" class="col-form-label">Jobs:</label>
                                            <input type="text" class="form-control" id="user-jobs" name="jobs" required>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>" />
                                        <button type="button" class="btn btn-secondary text-right" data-dismiss="modal">Close</button>
                                        <button type="submit" name="update" value="Update" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Jobs</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once("config.php");

                                $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                                ?>
                                <?php
                                while ($user_data = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $user_data['id'] . "</td>";
                                    echo "<td>" . $user_data['name'] . "</td>";
                                    echo "<td>" . $user_data['username'] . "</td>";
                                    echo "<td>" . $user_data['email'] . "</td>";
                                    echo "<td>" . $user_data['phone'] . "</td>";
                                    echo "<td>" . $user_data['jobs'] . "</td>";
                                    echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#updateModal' data-whatever='@fat'>Update</button>
                                    <a href='delete.php?id=$user_data[id]'><button type='button' class='btn btn-danger'>Delete</button></a></td></tr>"; 
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">Page 1 of 5
                            </div>
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>