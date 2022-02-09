<?php

    global $dbconn;

    function connection(){

        $dbconn = mysqli_connect('localhost','root','','restaurantdb');
        if(!$dbconn){
            die(mysqli_error($dbconn));
        }
        return $dbconn;
    }

    connection();

    function register($firstname, $lastname, $phone, $email, $username, $password){
        $dbconn = connection();
        $sql = "INSERT INTO users(firstname,lastname,phone,email,username,password) VALUE ('$firstname','$lastname','$phone','$email','$username','$password')";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }
    
    function checkUsername($username){
        $dbconn = connection();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function checkEmail($email){
        $dbconn = connection();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function login($username, $password){
        $dbconn = connection();
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($dbconn, $sql);
        if($result){
            if(mysqli_num_rows($result)==1){
                $res = mysqli_fetch_assoc($result);
                if(password_verify($password, $res['password'])){
                    header("Location: index.php");
                    session_start();
                    $_SESSION['userid'] = $res['userid'];
                    $_SESSION['firstname'] = $res['firstname'];
                    $_SESSION['lastname'] = $res['lastname'];
                    $_SESSION['role'] = $res['role'];
                }else {
                     echo "<script>alert('Username or password wrong!');</script>";
                }
            }
        }
    }

    function getUsers(){
        $dbconn = connection();
        $sql = "SELECT * FROM users";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function getUserId($userid){
        $dbconn = connection();
        $sql = "SELECT userid,firstname,lastname,phone,email,username,role FROM users WHERE userid = '$userid' ";
        $result = mysqli_query($dbconn,$sql);
        return $user = mysqli_fetch_assoc($result);
    }

    function addUser($firstname, $lastname, $phone, $email, $username, $password, $role){
        $dbconn = connection();
        $sql = "INSERT INTO users(firstname,lastname,phone,email,username,password,role) VALUES('$firstname','$lastname','$phone','$email','$username','$password','$role')";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            header('Location: dashboard.php');
        }else{
            die("Nuk arriti ta shtoj userin" .mysqli_error($dbconn));
        }
    }
    
    function editUser($userid,$firstname,$lastname,$phone,$email,$username){
        $dbconn = connection();
        $sql = "UPDATE users SET firstname ='$firstname', lastname = '$lastname', phone = '$phone', email = '$email', username = '$username' WHERE userid = '$userid'";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: dashboard.php");
        }else{
            die("Nuk arriti te modifikohej useri " .mysqli_error($dbconn));
        }
    }

    function getMenu(){
        $dbconn = connection();
        $sql = "SELECT * FROM menus";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function getMenuDistinct(){
        $dbconn = connection();
        $sql = "SELECT DISTINCT type FROM menus";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }
    function getMenuId($menuid){
        $dbconn = connection();
        $sql = "SELECT * FROM menus WHERE menuid = '$menuid' ";
        $result = mysqli_query($dbconn,$sql);
        return mysqli_fetch_assoc($result);
    }


    function addMenu($name, $type, $price, $image){
        $dbconn = connection();
        $sql = "INSERT INTO menus(name,type,price,image) VALUES('$name','$type','$price','$image')";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            header('Location: Index.php#our-menu');
        }else{
            die("Nuk arriti te shtohet menu" .mysqli_error($dbconn));
        }
    }

    function editMenu($menuid, $name, $type, $price, $image){
        $dbconn = connection();
        $sql = "UPDATE menus SET name='$name', type='$type', price='$price', image='$image' WHERE menuid='$menuid'";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: index.php#our-menu");
        }else{
            die("Nuk u modifikua menu! " . mysqli_error($dbconn));
        }
    }

    function getChefs(){
        $dbconn = connection();
        $sql = "SELECT * FROM chefs";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function getChefsId($chefsid){
        $dbconn = connection();
        $sql = "SELECT * FROM chefs WHERE chefsid = '$chefsid'";
        $result = mysqli_query($dbconn,$sql);
        return $chef = mysqli_fetch_assoc($result);
    }
    
    function get3LastChefs(){
        $dbconn = connection();
        $sql = "SELECT * FROM chefs ORDER BY chefsid DESC LIMIT = 3";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function addChef($firstname, $lastname, $position, $image,$description){
        $dbconn = connection ();
        $sql = "INSERT INTO chefs(firstname,lastname,position,image,description) VALUES('$firstname','$lastname','$position','$image','$description')";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: index.php#team");
        }else{
            die("Error for adding chef " .mysqli_error($dbconn));
        }
    }

    function editChef($chefsid, $firstname, $lastname, $position, $image, $description){
        $dbconn = connection();
        $sql = "UPDATE chefs SET firstname='$firstname', lastname='$lastname', position='$position', image='$image', description='$description' WHERE chefsid=$chefsid";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: index.php#team");
        }else{
            die("Error for modifying chefs! " . mysqli_error($dbconn));
        }
    }
    
    
    function addContactUs($userid,$message){
        $dbconn = connection();
        $sql = "INSERT INTO contactus(userid,message) VALUES('$userid','$message')";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: index.php#contactus");
        }else{
            die("Error for adding a message into contact us " .mysqli_error($dbconn));
        }
    }

    function getContactUs(){
        $dbconn = connection();
        $sql = "SELECT u.userid, u.firstname, u.lastname , u.email , u.phone , u.username , c.message FROM users u INNER JOIN contactus c ON u.userid = c.userid";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function getTestimonials(){
        $dbconn = connection();
        $sql = "SELECT t.testimonialid, u.userid, u.firstname, u.lastname, u.email, u.phone, u.username, t.position, t.description, t.rating, t.image FROM users u INNER JOIN testimonials t ON u.userid = t.userid";
        $result = mysqli_query($dbconn,$sql);
        return $result;
        if($result){
            Header("Location: dashboard.php");
        }else{
            die("Error " .mysqli_error($dbconn));
        }
    }

    function get3LastTestimonials(){
        $dbconn = connection();
        $sql = "SELECT t.testimonialid, u.userid, u.firstname, u.lastname, u.email, u.phone, u.username, t.position, t.description, t.rating, t.image FROM users u INNER JOIN testimonials t ON u.userid = t.userid ORDER BY t.testimonialid DESC LIMIT 3";
        $result = mysqli_query($dbconn,$sql);
        return $result;
    }

    function addTestimonial($userid,$position,$image,$description,$rating){
        $dbconn = connection();
        $sql = "INSERT INTO testimonials(userid,position,image,description,rating) VALUES('$userid','$position','$image','$description','$rating')";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: index.php#testimonials");
        }else{
            die("Error for adding a testimonial " .mysqli_error($dbconn));
        }
    }
?>