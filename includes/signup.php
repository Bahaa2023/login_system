<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbconnexion.php';
        require_once 'signup_model.php';
        require_once 'signup_controller.php';

        //Error Handler
        if (is_form_empty($username, $pwd, $email)) {

        }
        if (is_email_invalid( $email)) {

        }
        if (is_username_taken($pdo,  $username)) {

        }

    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("location: ../index.php");
    die();
}
