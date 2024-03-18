<?php
require_once 'includes/config_session.php';
require_once 'includes/signup_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>


<h3>Sign up</h3>

<form action="includes/signup.php" method="post">

    <?php   
 signup_inputs();   
    ?>
    
    <button>Sign Up</button>
</form>

<?php
check_signup_errors();
?>


</body>



</html>

