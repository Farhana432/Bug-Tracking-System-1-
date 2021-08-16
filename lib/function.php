<?php
session_start();
$host = 'localhost';
$user = 'root';
$host_pass = '';
$db_name = 'tfbugtracker';
$conn = new mysqli($host, $user, $host_pass, $db_name);

function signup()
{
    // echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>';
    if (isset($_POST['signupbtn'])) {
        $username = $_POST['username'];
        $pass = $_POST['upassword'];
       
        if (empty($username) || empty($pass) ) {
            echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">No field can\'t be empty!</div>';
        }  else {
            global $conn;
            $qusername = "SELECT `username` FROM `user` WHERE `username`='$username'";
            $result = mysqli_query($conn, $qusername);
            if (mysqli_num_rows($result) > 0 ) {
                echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">username or email is already taken!</div>';
            } else {
                $e_pass = password_hash($pass, PASSWORD_BCRYPT);
                $qinsert = "INSERT INTO `user`(`username`,`password`) VALUES ('$username','$e_pass')";
                mysqli_query($conn, $qinsert);
                $_SESSION['massage'] = '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-success" role="alert">Successfully Registerd!</div>';
                header('location:login.php');
            }
        }
    }
}


function login()
{
    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $pass = $_POST['password'];
        if (empty($username) || empty($pass)) {
            echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">No field can\'t be empty!</div>';
        } else {
            global $conn;
            $qusername = "SELECT * FROM user WHERE username='$username'";
            $result = mysqli_query($conn, $qusername);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hash = $row['password'];
                $flag = password_verify($pass, $hash);
                if ($flag) {
                    $_SESSION['username'] = $username;
                    header('location:success.php');
                } else {
                    echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Incorrect username or password!</div>';
                }
            } else {
                echo '<div style="margin-bottom:0px; margin-top:-5px" class="alert alert-danger" role="alert">Incorrect username or password!</div>';
            }
        }
    }
}


