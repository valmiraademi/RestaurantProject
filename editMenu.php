<?php include_once "includes/sqlFunctions.php" ?>

    <link rel="stylesheet" href="css/style.css">
    <body style = "background-color: #191f3a;">
        <main class="container page">
            <section id="content">
            <?php
                if(isset($_GET['menuid'])){
                    $menuid = $_GET['menuid'];
                    $menu = getMenuId($menuid);
                    $menuid = $menu['menuid'];
                    $name = $menu['name'];
                    $type = $menu['type'];
                    $price = $menu['price'];
                    $image = $menu['image'];
                }
                if(isset($_POST['editMenu'])){
                    editMenu($_POST['menuid'], $_POST['name'], $_POST['type'], $_POST['price'], $_POST['image']);
                }
            ?> 
                
            <div class = "login-page" style = "width: 600px;">
                <h1>Edit Menu</h1>
                <p class="errors"></p>
                <form class="contact-form" id="adduserForm" method="post" name="editMenuForm">
                        <input type="hidden" name="menuid" id="menuid" value="<?php if(!empty($menuid)){ echo $menuid;} ?>"><br/>

                        <label style="color:black; padding-left:40px;">Name:</label> 
                        <input type="text" name="name" id="name" value="<?php if(!empty($name)){echo $name;}?>"><br/>

                        <label style="color:black; padding-left:40px;">Type:</label>
                        <input type="text" name="type" id="type" value="<?php if(!empty($type)){ echo $type; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Price:</label>
                        <input type="text" name="price" id="price" value="<?php if(!empty($price)){ echo $price; }?>"><br/>

                        <label style="color:black; padding-left:40px;">Image:</label>
                        <input type="text" name="image" id="image" value="<?php if(!empty($image)){ echo $image; }?>"><br/>

                        <input type="submit" name="editMenu" value="Edit Menu">
                </form>
            </div>
            </section>
        </main>     
    </body>