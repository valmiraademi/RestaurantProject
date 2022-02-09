<?php 
  session_start();
    include_once 'includes/sqlFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dine Out - Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
          <style>
           

            .image {
              display: block;
              width: 100%;
              height: auto;
            }

            .overlay {
              position: absolute;
              top: 0;
              bottom: 0;
              left: 0;
              right: 0;
              height: 100%;
              width: 100%;
              opacity: 0;
              transition: .5s ease;
              background-color: #eaa023;
              border-radius:8px;
            }

            .team-item:hover .overlay {
              opacity: 1;
            }

            .text {
              color: white;
              font-size: 15px;
              position: relative;
              top: 50%;
              left: 50%;
              -webkit-transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
              text-align: center;
            }
          </style>
</head>
<body>
    <!-- header start -->
    <header class="header">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="logo">
            <a href="#"><img src="img/logo.png" alt="logo"></a>
          </div>
          <button type="button" class="nav-toggler">
            <span></span>
          </button>
          <nav class="nav">
            <ul>
              <li class="nav-item"><a href="#home">Home</a></li>
                <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                  <li class="nav-item"><a href="#about">About Us</a></li>
                  <li class="nav-item"><a href="#our-menu">Our Menu</a></li>
                  <li class="nav-item"><a href="#testimonials">Testimonials</a></li>
                  <li class="nav-item"><a href="#team">Team</a></li>
                  <li class="nav-item"><a href="dashboard.php">dashboard</a></li>
                  <li class="nav-item"><a href="logout.php">Log Out</a></li>
                  <li style = "margin-left:70px;margin-top:200px;"><i class = "fa fa-user"></i><?php echo $_SESSION['firstname'] . " " .$_SESSION['lastname']; ?></li>
                <?php }elseif(isset($_SESSION['userid']) && $_SESSION['role'] == 0){ ?>
                  <li class="nav-item"><a href="#about">About Us</a></li>
                  <li class="nav-item"><a href="#our-menu">Our Menu</a></li>
                  <li class="nav-item"><a href="#testimonials">Testimonials</a></li>
                  <li class="nav-item"><a href="#team">Team</a></li>
                  <li class="nav-item"><a href="contactus.php">Contact Us</a></li>
                  <li class="nav-item"><a href="logout.php">Log Out</a></li>
                  <li style = "margin-left:70px;margin-top:200px;"><i class = "fa fa-user"></i><?php echo $_SESSION['firstname'] . " " .$_SESSION['lastname']; ?></li>
                <?php }else{ ?>
                  <li class="nav-item"><a href="#about">About Us</a></li>
                  <li class="nav-item"><a href="#testimonials">Testimonials</a></li>
                  <li class="nav-item"><a href="#team">Team</a></li>
                  <li class="nav-item"><a href="login.php">Contact Us</a></li>
                  <li class="nav-item"><a href="login.php">Log In</a></li>
                <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- header end -->
    
    <!-- home section start -->
    <section class="home-section" id="home">
      <div class="home-bg"></div>
      <div class="container">
        <div class="row min-vh-100 align-items-center">
          <div class="home-text" data-aos="fade-up" data-aos-duration="1000">
            <h1>Dine Out Restaurant</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
               incididunt ut labore et dolore magna aliqua. </p>
               <?php if(isset($_SESSION['userid']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 0)){ ?>
                  <a href="#our-menu" class="btn btn-default">Our Menu</a>
                  <a href="#team" class="btn btn-default">Our Chefs</a>
                <?php }else{ ?>
                  <a href="login.php" class="btn btn-default">Our Menu</a>
                  <a href="login.php" class="btn btn-default">Our Chefs</a>
                <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <!-- home section end -->

    <!-- about section start -->
    <section class="about-section sec-padding" id="about">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-title = "our story" data-aos="fade-up">About Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="about-text" data-aos="fade-right">
            <h3>Welcome To Dine Out Restaurant</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
                <?php if(isset($_SESSION['userid']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 0)){ ?>
                  <a href="#our-menu" class="btn btn-default">Check Our Menu</a>
                <?php }else{ ?>
                  <a href="login.php" class="btn btn-default">Check Our Menu</a>
                <?php } ?>
          </div>
          <div class="about-img" data-aos="fade-left">
            <div class="img-box">
              <h3>20+ years experience</h3>
              <img src="img/about-img.jpg" alt="about img">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about section end -->

    <!-- menu section start -->
    <?php if(isset($_SESSION['userid']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 0)){ ?>
        <section class="menu-section sec-padding" id="our-menu">
          <div class="container">
            <div class="row">
              <div class="section-title">
                <h2 data-title="order now" data-aos="fade-up">Our Menu</h2>
                <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                  <a href="addMenu.php" class="btn btn-default">Add Menu</a>
                <?php } ?>
              </div>
            </div>
            <div class="row">
              <div class="menu-tabs" data-aos="fade-up">
                <button type="button" class="menu-tab-item active" data-target="#lunch">Lunch</button>
                <button type="button" class="menu-tab-item" data-target="#dinner">Dinner</button>
                <button type="button" class="menu-tab-item" data-target="#drinks">Drinks</button>
                <button type="button" class="menu-tab-item" data-target="#desserts">Dessert</button>
              </div>
            </div>
            <!-- ----------------Lunch----------- -->
            <div class="row menu-tab-content active" id="lunch">
              <?php
                  $menus = getMenu();
                  while($menu = mysqli_fetch_assoc($menus)) :
                    $menuid = $menu['menuid'];
              ?>
                <?php if($menu['type']=='Lunch') {?>
                  <div class="menu-item" data-aos="fade-up-left">
                      <div class="menu-item-title">
                        <img src="img/menu/<?php echo $menu['image'];?>"  alt="Foto">
                        <h3><?php echo $menu['name']; ?></h3>
                      </div>
                      <div class="menu-item-price">
                        <?php echo "$".  $menu['price']; ?><br>
                        <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                        <?php echo "<a href='editMenu.php?menuid={$menuid}'><i class='fas fa-edit' style='color:red;'></i></a>"?>
                        <form action="deletemenu.php" method="post">
                          <input type="text" name="menuid" hidden value="<?php echo $menu['menuid'] ?>">
                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;color:darkblue;" name="deleteMenu" onclick="return deleteMenu()">
                              <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <?php }?>
                      </div>
                  </div>
                <?php }?>
              <?php endwhile; ?>
            </div>
            
            <!-- php echo "<i class='fas fa-edit' style='color:red;'><a href='editMenu.php?menuid={$menu['menuid']}'></a></i>"?> -->



            <!-- -----------Dinner------------- -->
            <div class="row menu-tab-content" id="dinner">
              <?php
                  $menus = getMenu();
                  while($menu = mysqli_fetch_assoc($menus)) :
                    $menuid = $menu['menuid'];
              ?>
                <?php if($menu['type']=='Dinner') {?>
                  <div class="menu-item" data-aos="fade-up-left">
                      <div class="menu-item-title">
                        <img src="img/menu/<?php echo $menu['image'];?>"  alt="Foto">
                        <h3><?php echo $menu['name']; ?></h3>
                      </div>

                      <div class="menu-item-price">
                        <?php echo "$".  $menu['price']; ?><br>
                        <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                        <?php echo "<a href='editMenu.php?menuid={$menuid}'><i class='fas fa-edit' style='color:red;'></i></a>"?>
                        <form action="deletemenu.php" method="post">
                          <input type="text" name="menuid" hidden value="<?php echo $menu['menuid'] ?>">
                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;color:darkblue;" name="deleteMenu" onclick="return deleteMenu()">
                              <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <?php } ?>
                      </div>
                  </div>
                <?php }?>
              <?php endwhile; ?>
            </div>
          

            <!-- -----------Drinks---------------- -->
            <div class="row menu-tab-content" id="drinks">
              <?php
                  $menus = getMenu();
                  while($menu = mysqli_fetch_assoc($menus)) :
                    $menuid = $menu['menuid'];
              ?>
                <?php if($menu['type']=='Drink') {?>
                  <div class="menu-item" data-aos="fade-up-left">
                      <div class="menu-item-title">
                        <img src="img/menu/<?php echo $menu['image'];?>"  alt="Foto">
                        <h3><?php echo $menu['name']; ?></h3>
                      </div>

                      <div class="menu-item-price">
                        <?php echo "$".  $menu['price']; ?><br>
                        <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                          <?php echo "<a href='editMenu.php?menuid={$menuid}'><i class='fas fa-edit' style='color:red;'></i></a>"?>
                          <form action="deletemenu.php" method="post">
                            <input type="text" name="menuid" hidden value="<?php echo $menu['menuid'] ?>">
                              <button type="submit" style="border: none;background-color:transparent;cursor:pointer;color:darkblue;" name="deleteMenu" onclick="return deleteMenu()">
                                <i class="fas fa-trash"></i>
                              </button>
                          </form>
                        <?php } ?>
                      </div>
                  </div>
                <?php }?>
              <?php endwhile; ?>
            </div>


            <!-- -------------Dessert----------- -->
            <div class="row menu-tab-content" id="desserts">
              <?php
                  $menus = getMenu();
                  while($menu = mysqli_fetch_assoc($menus)) :
                    $menuid = $menu['menuid'];
              ?>
                <?php if($menu['type']=='Dessert') {?>
                  <div class="menu-item" data-aos="fade-up-left">
                      <div class="menu-item-title">
                        <img src="img/menu/<?php echo $menu['image'];?>"  alt="Foto">
                        <h3><?php echo $menu['name']; ?></h3>
                      </div>

                      <div class="menu-item-price">
                        <?php echo "$".  $menu['price']; ?><br>
                          <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                            <?php echo "<a href='editMenu.php?menuid={$menuid}'><i class='fas fa-edit' style='color:red;'></i></a>"?>
                            <form action="deletemenu.php" method="post">
                              <input type="text" name="menuid" hidden value="<?php echo $menu['menuid'] ?>">
                                <button type="submit" style="border: none;background-color:transparent;cursor:pointer;color:darkblue;" name="deleteMenu" onclick="return deleteMenu()">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </form>
                          <?php } ?>
                      </div>
                  </div>
                <?php }?>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
      <?php } ?>
        <!-- menu section end -->

    <!-- Testiomonials section start-->
    <section class="testimonials-section sec-padding" id="testimonials">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-title="testimonials" data-aos="fade-up">Some feedbacks</h2>
          </div>
        </div>
        <div class="row">
            <?php 
                $testimonials = get3LastTestimonials();
                while( $testimonial = mysqli_fetch_assoc($testimonials)) :
                  $testimonialid = $testimonial['testimonialid'];
            ?>
            <div class="testi-item" data-aos="zoom-in">
              <div class="testi-author">
                <div class="testi-author-name">
                    <h3><?php echo $testimonial['firstname'] . " " .$testimonial['lastname'];?></h3>
                    <span><?php echo $testimonial['position'];?></span>
                </div>
                <div class="testi-author-img">
                    <img src="img/testimonials/<?php echo $testimonial['image'];?>" alt="testi author img">
                </div>
                </div>
                    <p><?php echo $testimonial['description'];?></p>
                <div class="ratings">
                  <?php 
                    $rating = $testimonial['rating'];
                    for($i = 0; $i < $rating ; $i++){
                        echo "<i class='fas fa-star'></i>";
                    }
                  ?>
              </div>
            </div>
            <?php  endwhile; ?>
        </div>
      </div>
      <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 0){ ?>
        <a href="addTestimonial.php" class="btn btn-default" style="margin-left:690px">Write a testimonial</a>
      <?php }else if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
        <a href="dashboard.php" class="btn btn-default" style="margin-left:690px">Check testimonials</a>
      <?php }else{ ?>
        <a href="login.php" class="btn btn-default" style="margin-left:690px">Write a testimonial</a>
      <?php } ?>
    </section>
    <!-- Testiomonials section end -->

    <!-- Team section start -->
    <?php if(isset($_SESSION['userid']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 0)){ ?>
    <section class="team-section sec-padding" id="team">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2 data-title="team" data-aos="fade-up">Our chefs</h2>
            <?php if(isset($_SESSION['userid']) && $_SESSION['role'] == 1){ ?>
                  <a href="addChef.php" class="btn btn-default" data-aos="fade-up">Add Chef</a>
            <?php } ?>
          </div>
        </div>
        <div class="row">
            <?php $chefs = getChefs();
                  while($chef = mysqli_fetch_assoc($chefs)) :
                    $chefsid = $chef['chefsid'];
            ?>
            <div class="team-item" data-aos="flip-left" data-aos-duration="1000">
                <img src="img/team/<?php echo $chef['image'];?>" alt="team item" style="padding-top:60px" class="hvrbox-layer_bottom">
              <div class="team-item-info">
                <h3><?php echo $chef['firstname'] . " " . $chef['lastname'];?></h3>
                <p><?php echo $chef['position'];?></p>
                  <div class="overlay">
                    <div class="text"><?php echo $chef['description'];?></div>
                  </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php } ?>
    <!-- Team section end -->

    <!-- Footer start -->
    <footer class="footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="footer-item" data-aos="fade-up">
            <h3>Our Location</h3>
            <p>xyz street, Sector-12, <br> New Delhi - 000 ****</p>
          </div>
          <div class="footer-item" data-aos="fade-up">
            <h3>Opening hours</h3>
            <p>Monday to Sunday <br> 9:00 AM - 10:00 PM</p>
          </div>
          <div class="footer-item" data-aos="fade-up">
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="copyright">
            &copy; 2021 - Designed by The WebV
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer end -->

  <script src="js/aos.js"></script> 
  <script src="js/script.js"></script>
</body>
</html>