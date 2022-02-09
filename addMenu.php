<?php include "includes/sqlFunctions.php"?>
    <link rel = "stylesheet" href = "css/style.css">
    <script src = "js/jQuery.js"></script>
    <body style = "background-color: #191f3a;">
        <main class = "container page">
            <section id = "content">
                <?php 
                    if(isset($_POST['addMenu'])){
                        $name = $_POST['name'];
                        $type = $_POST['type'];
                        $price = $_POST['price'];
                        $image = $_POST['image'];
                        
                        addMenu($name, $type, $price, $image);
                    }

                ?>
                <div class = "login-page" style = "width:600px;">
                    <h1>Add a Menu</h1>
                    <p class = "errors"></p>
                    <form class = "contact-form" id = "addMenuForm" method = "post" name = "addMenuForm" onsubmit = "return ValidimRegister()"></br>
                        <input type="text" name="name" id="name" placeholder="Menu Name"><br>
                        <input type="text" name="type" id="type" placeholder="Menu Type"><br>
                        <input type="text" name="price" id="price" placeholder="Menu Price"><br>
                        <input type="text" name="image" id="image" placeholder="Menu Image"><br>

                        <input type="submit" name="addMenu" value="Add Menu">
                    </form>
                </div>
            </section>
        </main>
        <script> 
            function ValidimRegister() { 
                var name =  
                    document.forms["addMenuForm"]["name"];
                var type =
                    document.forms["addMenuForm"]["type"];
				var price =  
                    document.forms["addMenuForm"]["price"]; 
                var image =  
                    document.forms["addMenuForm"]["image"]; 
            
                if (name.value == "") { 
                    window.alert("Please enter the menu name!"); 
                    name.focus(); 
                    return false; 
                } 
                
                if (type.value == ""){
                    window.alert("Please enter the type of menu!");
                    type.focus();
                    return false;
                }else if(type.value != "Lunch" && type.value != "Dinner" && type.value != "Drink" && type.value != "Dessert"){
                    window.alert("Please enter a valid type of food!");
                    type.focus();
                    return false;
                }

                if (price.value == "") { 
                    window.alert("Please enter the menu price!"); 
                    price.focus(); 
                    return false; 
                } 
  
                if (image.value == "") { 
                    window.alert("Please insert the image of menu!");
                    image.focus(); 
                    return false; 
                } 
  
                return true; 
            } 
        </script> 
    </body>