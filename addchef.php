<?php include_once "includes/sqlFunctions.php" ?>

<link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">
                <?php
                    if(isset($_POST['addChef'])){
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $position = $_POST['position'];
                        $image = $_POST['image'];
                        $description = $_POST['description'];

                        addChef($firstname, $lastname, $position, $image, $description);
                    }
                ?>
            <div class = "login-page" style = "width: 600px;">
                <h1>Add a Chef</h1>
                <p class="errors"></p>
                <form class="contact-form" id="addchefForm" method="post" name="addchefForm" onsubmit="return Validation()"> 
                        <input type="text" name="firstname" id="firstname" placeholder="First Name"><br>
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name"><br>
                        <input type="text" name="position" id="position" placeholder="Position"><br>
                        <input type="text" name="image" id="image" placeholder="Image"><br>
                        <input type="text" name="description" id="description" placeholder="Description"><br>

                        <input type="submit" name="addChef" value="Add Chef">
                </form>
            </div>
            </section>
        </main>  
        <script>
            function Validation(){
                var firstname = document.forms['addchefForm']['firstname'];
                var lastname = document.forms['addchefForm']['lastname'];
                var position = document.forms['addchefForm']['position'];
                var image = document.forms['addchefForm']['image'];
                var description = document.forms['addchefForm']['description'];

                if(firstname.value == ""){
                    window.alert("Please enter the chef firstname!"); 
                    firstname.focus(); 
                    return false;
                }
                
                if(lastname.value == ""){
                    window.alert("Please enter the chef lastname!"); 
                    lastname.focus(); 
                    return false;
                }

                if(position.value == ""){
                    window.alert("Please enter the chef position!"); 
                    position.focus(); 
                    return false;
                }

                if(image.value == ""){
                    window.alert("Please enter the chef image!"); 
                    image.focus(); 
                    return false;
                }

                if(description.value == ""){
                    window.alert("Please enter the chef description!"); 
                    description.focus(); 
                    return false;
                }
            }
                    
        </script>
    </body>
