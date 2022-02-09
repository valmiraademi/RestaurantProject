<?php 
    session_start();
    include_once 'includes/sqlFunctions.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #191f3a;">
    <?php 
        $userid = $_SESSION['userid'];
        $firstname = $_SESSION['firstname'];
        if(isset($_POST['register'])){
            $useridd = $userid;
            $message = $_POST['message'];
            addContactUs($useridd,$message);
        }    
    ?>

    <div class="login-page" style="width: 600px;">
        <h1>Contact Us</h1>

        <p class="errors"></p>
        <form class="contact-form" name="contactForm" id="contactForm" method="post" onsubmit="return contactValidation()">
            <input type="text" name="userid" value="<?php echo $userid ?>" readonly>
            <input type="text" name="firstname" value="<?php echo $firstname ?>" readonly>
            <input type="text" placeholder="Write something" name="message">
            <input type="submit" value="Submit" name="register">
        </form>
    </div>
    <script>
        function contactValidation(){
            var message = document.forms['contactForm']['message'];
            if(message.value == ""){
                window.alert("You have to write something!");
                message.focus();
                return false;
            }
        }
    </script>
</body>
</html>