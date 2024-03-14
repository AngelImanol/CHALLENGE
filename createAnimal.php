<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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