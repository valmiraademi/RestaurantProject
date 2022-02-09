<?php include_once "includes/sqlFunctions.php" ?>

    <link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">
            <?php
                if(isset($_GET['chefsid'])){
                    $cid = $_GET['chefsid'];
                    $chef = getChefsId($cid);
                    $chefsid = $chef['chefsid'];
                    $firstname = $chef['firstname'];
                    $lastname = $chef['lastname'];
                    $position = $chef['position'];
                    $image = $chef['image'];
                    $description = $chef['description'];
                }
                if(isset($_POST['editChef'])){
                    $chefsid = $_POST['chefsid'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $position = $_POST['position'];
                    $image = $_POST['image'];
                    $description = $_POST['description'];
                    
                    editChef($chefsid, $firstname, $lastname, $position, $image, $description);
                }
            ?>
                
            <div class = "login-page" style = "width: 600px;">
                <h1>Edit Chef</h1>
                <p class="errors"></p>
                <form class="contact-form" id="adduserForm" method="post" name="editMenuForm">
                        <input type="hidden" name="chefsid" id="chefsid" value="<?php if(!empty($chefsid)){ echo $chefsid;} ?>"><br/>

                        <label style="color:black; padding-left:40px;">FirstName:</label> 
                        <input type="text" name="firstname" id="firstname" value="<?php if(!empty($firstname)){echo $firstname;}?>"><br/>

                        <label style="color:black; padding-left:40px;">LastName:</label>
                        <input type="text" name="lastname" id="lastname" value="<?php if(!empty($lastname)){ echo $lastname; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Position:</label>
                        <input type="text" name="position" id="position" value="<?php if(!empty($position)){ echo $position; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Image:</label>
                        <input type="text" name="image" id="image" value="<?php if(!empty($image)){ echo $image; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Description:</label>
                        <input type="text" name="description" id="description" value="<?php if(!empty($description)){ echo $description; }?>"><br/>

                        <input type="submit" name="editChef" value="Edit Chef">
                </form>
            </div>
            </section>
        </main>     
    </body>