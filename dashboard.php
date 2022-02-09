<?php include_once('includes/sqlFunctions.php'); ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

<head>
    <style>
        body{
            margin-top:50px;
            background-color: #191f3a;
        }
        .tableuser{
            width: 95%;
            margin: 0 auto;
        }
        .tableuser h1{
            color: #eaa023;
            padding: 20px 0px 10px 10px;
            margin: 0px 15px;
            font-size: 25px;
            border-bottom: 2px solid #eaa023;
        }
        #users_table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 98%;
            margin: 30px 15px 0px 15px;
        }
        #users_table td,
        #users_table th {
            border: 1px solid #eaa023;
            padding: 8px;
        }
        #users_table tr{
            background-color: #eee;
        }
        #users_table tr{
            color: #191f3a;
        }
        /* #users_table tr:hover {
            background-color: #191f3a;
        } */
        #users_table th {
            padding: 12px;
            text-align: left;
            background-color: #c8c8c8;
            color: #191f3a;
        }
        .fa-trash{
        color: #191f3a;
        }
        #delete i {
        margin-left: 50%;
        transform: translateX(-50%);
        }
        .btn-default{
            margin-top: 50px;
            margin-left: 1400px;  
        }
        .tab {
        overflow: hidden;
        border: 1px solid #191f3a;
        background-color: #191f3a;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: #191f3a;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 25px;
        color: #eaa023;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #191f3a;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        border-top: 1px solid #eaa023;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #191f3a;
        border-top: none;
        }
    </style>
</head>
<body>
    <!-- <h2 style="margin:30px;padding-left:690px">Dashboard</h2> -->

    <div class="tab" style="padding-left:600px;">
        <button class="tablinks" onclick="dashboard(event,'users')" id="defaultOpen">Users</button>
        <button class="tablinks" onclick="dashboard(event,'chefs')">Chefs</button>
        <button class="tablinks" onclick="dashboard(event,'contacts')">Contact Us</button>
        <button class="tablinks" onclick="dashboard(event,'testimonials')">Testimonials</button>
    </div>
        

        <div id="users" class="tabcontent">
                <div class="tableuser">
                    <h1>Users</h1>
                    <table id="users_table">
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                            <?php
                                $users=getUsers();
                                while ($user = mysqli_fetch_assoc($users)) {
                                    $userid = $user['userid'];
                            ?>
                            <tr>
                                <td><?php echo $user['userid']; ?></td>
                                <td><?php echo $user['firstname']; ?></td>
                                <td><?php echo $user['lastname']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['role']; ?></td>
                                <td id="delete">
                                    <form action="deleteuser.php" method="post">
                                        <input type="text" name="userid" hidden value="<?php echo $user['userid'] ?>">
                                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deleteUser" onclick="return deleteUser()">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                    </form>
                                </td>
                                <td><?php echo "<a href='editUser.php?userid={$userid}'><i class='fas fa-edit' style='color:red;'></i></a>"?></td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
                <a href="adduser.php" class="btn btn-default"><i class="fas fa-plus"></i></a>
                <!-- <a href="index.php" class="btn btn-default">Home</a> -->
        </div>

        <div id="chefs" class="tabcontent">
            <div class="tableuser">
            <h1>Chefs</h1>
                <table id="users_table">
                    <tr>
                        <th>Chef Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                        <?php
                            $chefs=getChefs();
                            while ($chef = mysqli_fetch_assoc($chefs)) {
                                $chefsid = $chef['chefsid'];
                        ?>
                        <tr>
                            <td><?php echo $chef['chefsid']; ?></td>
                            <td><?php echo $chef['firstname']; ?></td>
                            <td><?php echo $chef['lastname']; ?></td>
                            <td><?php echo $chef['position']; ?></td>
                            <td><?php echo $chef['image']; ?></td>
                            <td><?php echo $chef['description']; ?></td>
                            <td id="delete">
                                <form action="deleteChef.php" method="post">
                                    <input type="text" name="chefsid" hidden value="<?php echo $chef['chefsid'] ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deleteChef" onclick="return deleteChef()">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                </form>
                            </td>
                            <td><?php echo "<a href='editChefs.php?chefsid={$chefsid}'><i class='fas fa-edit' style='color:red;'></i></a>"?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <a href="addchef.php" class="btn btn-default"><i class="fas fa-plus"></i></a>
        </div>

        <div id="contacts" class="tabcontent">
            <div class="tableuser">
                <h1>Contact Us</h1>
                    <table id="users_table">
                        <tr>
                            <th>User Id</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Message</th>
                        </tr>
                            <?php 
                                $contactsus = getContactUs();
                                while ($contactus = mysqli_fetch_assoc($contactsus)){
                            ?>
                            <tr>
                                <td><?php echo $contactus['userid'];?></td>
                                <td><?php echo $contactus['firstname'];?></td>
                                <td><?php echo $contactus['lastname'];?></td>
                                <td><?php echo $contactus['email'];?></td>
                                <td><?php echo $contactus['phone'];?></td>
                                <td><?php echo $contactus['username'];?></td>
                                <td><?php echo $contactus['message'];?></td>
                            </tr>
                            <?php } ?>
                    </table>
            </div>
        </div>

        <div id="testimonials" class="tabcontent">
            <div class="tableuser">
                <h1>Testimonials</h1>
                <table id="users_table">
                    <tr>
                        <th>Testimonial Id</th>
                        <th>User Id</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Rating</th>
                    </tr>
                        <?php 
                            $testimonials = getTestimonials();
                            while ($testimonial = mysqli_fetch_assoc($testimonials)){
                        ?>
                        <tr>
                            <td><?php echo $testimonial['testimonialid'];?></td>
                            <td><?php echo $testimonial['userid'];?></td>
                            <td><?php echo $testimonial['firstname'];?></td>
                            <td><?php echo $testimonial['lastname'];?></td>
                            <td><?php echo $testimonial['email'];?></td>
                            <td><?php echo $testimonial['phone'];?></td>
                            <td><?php echo $testimonial['username'];?></td>
                            <td><?php echo $testimonial['position'];?></td>
                            <td><?php echo $testimonial['description'];?></td>
                            <td><?php echo $testimonial['rating'];?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>


    <script>
        function dashboard(evt, dashboardItem) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(dashboardItem).style.display = "block";
        evt.currentTarget.className += " active";
    }
     document.getElementById("defaultOpen").click();
    </script>
</body>
