<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();

    //connect to the database
    $db = mysqli_connect('localhost', 'root','', 'registration' );

    //if the register button is clicked
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //pastikan form diisi dengan benar
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($email)) {
            array_push($errors, "Email is required");
        }
        if(empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if($password_1 != $password_2) {
            array_push($errors, "Passwords do not match");
        }

        //kalo ga ada error, simpan ke database
        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) 
                        VALUES ('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            header('location: login.php');
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //pastikan form diisi dengan benar
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                header('location: home.html');
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }    
?>