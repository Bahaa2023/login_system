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
        $errors = [];

        if (is_form_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Please fill up all fields!";
        }
        if (is_email_invalid( $email)) {
            $errors["invalid_email"] = "Your email is invalid!";
        }
        if (is_username_taken($pdo,  $username)) {
            $errors["username_taken"] = "Sorry, your username is already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Your email is already registered!";
        }


        require_once 'config_session.php';

        if ( $errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("location: ../index.php");
            die();
        }

        create_user($pdo, $username,  $pwd,  $email);

        header("location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("location: ../index.php");
    die();
}
