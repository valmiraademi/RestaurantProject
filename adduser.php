<?php include "includes/sqlFunctions.php"?>
    <link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">
                <?php
                    if(isset($_POST['addUser'])){
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $password =password_hash($_POST['password'],PASSWORD_DEFAULT);
                        $role = $_POST['role'];
                       

                        $emailcheck = checkEmail($email);
                        $usernamecheck = checkUsername($username);

                        if(mysqli_num_rows($emailcheck) > 0 ){
                            $email_error = "Sorry,this email is already taken!";
                        }else if(mysqli_num_rows($usernamecheck) > 0){
                            $username_error = "Sorry,this username is already taken!";
                        }else{
                            header('Location: login.php');
                            $result = addUser($firstname,$lastname,$phone,$email,$username,$password,$role);
                        }
                        
                    }
                ?>
            <div class = "login-page" style = "width: 600px;">
                <h1>Add a User</h1>
                <p class="errors"></p>
                <form class="contact-form" id="adduserForm" method="post" name="adduserform" onsubmit="return ValidimUser()"> 
                        <input type="text" name="firstname" id="firstname" placeholder="First Name"><br />
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name"><br />
                        <input type="text" name="phone" id="phone" placeholder="Phone"><br>
                        <input type="email" name="email" id="email" placeholder="Email"><br />
                            <?php if(isset($email_error)): ?>
                            <span style="color:red;margin-left:40px;"><?php echo $email_error; ?></span>
                            <?php endif ?>
                        <input type="text" name="username" id="username" placeholder="Username"><br />
                            <?php if(isset($username_error)): ?>
                            <span style="color:red;margin-left:40px;"><?php echo $username_error; ?></span>
                            <?php endif ?>
                        <input type="password" name="password" id="password" placeholder="Password"><br />
                        <input type="text" name="role" id="role" placeholder="Role"><br>
                                
                        <input type="submit" name="addUser" value="Add User">
                </form>
            </div>
            </section>
        </main> 
        <script>
            function ValidimUser(){
                var firstname = document.forms["adduserform"]["firstname"];
                var lastname = document.forms["adduserform"]["lastname"];
                var phone = document.forms["adduserform"]["phone"];
                var phoneno = /^\+383[- ](43|44|45|46|48|49)[- ]([0-9]{3})[- ]([0-9]{3})/;
                var email = document.forms["adduserform"]["email"];
                var emailvalidation = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var username = document.forms["adduserform"]["username"];
                var password = document.forms["adduserform"]["password"];
                var role = document.forms["adduserform"]["role"];


                if(firstname.value == ""){
                    window.alert("Please enter the user firstname!");
                    firstname.focus();
                    return false;
                }

                if(lastname.value == ""){
                    window.alert("Please enter the user lastname!");
                    lastname.focus();
                    return false;
                }
                
                if(phone.value == ""){
                    window.alert("Please enter the user phone!");
                    phone.focus();
                    return false;
                }else if(!phone.value.match(phoneno)){
                    window.alert("Please enter a valid phone number in right format: +383-xx-xxx-xxx");
                    phone.focus();
                    return false;
                }

                if(email.value == ""){
                    window.alert("Please enter the user email!");
                    email.focus();
                    return false;
                }else if(!email.value.match(emailvalidation)){
                    window.alert("Please enter a valid email!");
                    email.focus();
                    return false;
                }

                if(username.value == ""){
                    window.alert("Please enter the user username!");
                    username.focus();
                    return false;
                }

                if(password.value == ""){
                    window.alert("Please enter the user password!");
                    password.focus();
                    return false;
                }

                if(role.value == ""){
                    window.alert("Please enter the user role!");
                    role.focus();
                    return false;
                }else if(!(role.value == 1 || role.value == 0)){
                    window.alert("Please enter a valid role!!!");
                    role.focus();
                    return false;
                }   
            }
        </script>    
    </body>

    

