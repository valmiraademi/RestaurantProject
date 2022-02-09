<?php 
    session_start();
    include "includes/sqlFunctions.php";
?>
    <link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">
            <?php

                $userid = $_SESSION['userid'];
                if(isset($_POST['addTestimonial'])){
                    $useridd = $userid;
                    $position = $_POST['position'];
                    $image = $_POST['image'];
                    $description = $_POST['description'];
                    $rating = $_POST['rating'];
                    addTestimonial($userid, $position, $image, $description, $rating);
                }    
            ?>
            <div class = "login-page" style = "width: 600px;">
                <h1>Write a Feedback</h1>
                <p class="errors"></p>
                <form class="contact-form" id="writeTestimonial" method="post" name="writeTestimonial" onsubmit="return ValidimTestimonial()"> 
                        <input type="text" name="userid" id="userid" value="<?php echo $userid?>"><br />
                        <input type="text" name="position" id="position" placeholder="Your position"><br>
                        <input type="text" name="image" id="image" placeholder="Your image"><br />
                        <input type="text" name="description" id="description" placeholder="Write your review"><br />
                        <input type="text" name="rating" id="rating" placeholder="Write a rate from 1 to 5"><br />

                        <input type="submit" name="addTestimonial" value="Add Feedback">
                </form>
            </div>
            </section>
        </main> 
        <script>
            function ValidimTestimonial(){
                var position = document.forms['writeTestimonial']['position'];
                var image = document.forms['writeTestimonial']['image'];
                var description = document.forms['writeTestimonial']['description'];
                var rating = document.forms['writeTestimonial']['rating'];

                if(position.value == ""){
                    window.alert("Please enter your position!");
                    position.focus();
                    return false;
                }
                
                if(description.value == ""){
                    window.alert("Please enter your description!");
                    description.focus();
                    return false;
                }

                if(rating.value == ""){
                    window.alert("Please enter your rating from 1 to 5!");
                    rating.focus();
                    return false;
                }
   
            }
        </script>    
    </body>

    

