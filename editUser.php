<?php include_once "includes/sqlFunctions.php" ?>

    <link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">

            <?php
                if(isset($_GET['userid'])){
                    $uid = $_GET['userid'];
                    $user = getUserId($uid);
                    $userid = $user['userid'];
                    $firstname = $user['firstname'];
                    $lastname = $user['lastname'];
                    $phone = $user['phone'];
                    $email = $user['email'];
                    $username = $user['username'];
                }
                if(isset($_POST['editUser'])){
                    editUser($_POST['userid'], $_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['username']);
                }
            ?>
                
            <div class = "login-page" style = "width: 600px;">
                <h1>Edit User</h1>
                <p class="errors"></p>
                <form class="contact-form" id="adduserForm" method="post" name="editUserForm">
                        <input type="hidden" name="userid" id="userid" value="<?php if(!empty($userid)){ echo $userid;} ?>"><br/>

                        <label style="color:black; padding-left:40px;">First Name:</label> 
                        <input type="text" name="firstname" id="firstname" value="<?php if(!empty($firstname)){echo $firstname;}?>"><br/>

                        <label style="color:black; padding-left:40px;">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" value="<?php if(!empty($lastname)){ echo $lastname; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Phone:</label>
                        <input type="text" name="phone" id="phone" value="<?php if(!empty($phone)){ echo $phone; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Email:</label>
                        <input type="text" name="email" id="email" value="<?php if(!empty($email)){ echo $email; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Username:</label>
                        <input type="text" name="username" id="username" value="<?php if(!empty($username)){ echo $username; }?>"><br/>
                        

                        <input type="submit" name="editUser" value="Edit User">
                </form>
            </div>
            </section>
        </main>     
    </body>