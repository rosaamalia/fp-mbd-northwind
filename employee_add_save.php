<?php
    require 'connection.php';

    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $title = $_POST["title"];
    $title_of_courtesy = $_POST["title_of_courtesy"];
    $birth_date = $_POST["birth_date"];
    $hire_date = $_POST["hire_date"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $home_phone = $_POST["home_phone"];
    $extension = $_POST["extension"];

    $photo = $_FILES["photo"];
    $nama_photo = $_FILES["photo"]["name"];
    $tempat_photo = $_FILES["photo"]["tmp_name"];

    $ekstensi_gambar = explode('.', $nama_photo);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));

    $nama_photo = uniqid();
    $nama_photo .= '.';
    $nama_photo .= $ekstensi_gambar;
    
    move_uploaded_file($tempat_photo, 'image/employee/' . $nama_photo);
    $tempat_photo = 'image/employee/' . $nama_photo;

    $notes = $_POST["notes"];
    $reports_to = $_POST["reports_to"];
    $photo_path = $tempat_photo;
   
    // insert data
    $query = "INSERT INTO employees VALUES (nextval('increment_employee'), '$last_name', '$first_name', '$title', '$title_of_courtesy', '$birth_date', '$hire_date', '$address', '$city', '$region', '$postal_code', '$country', '$home_phone', '$extension',  bytea('$tempat_photo'), '$notes', '$reports_to', '$photo_path')";
    pg_query($db, $query);

    header('location: employee.php');
?>