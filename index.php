<?php
include('./Page/classes/DB.php');
include('./Page/classes/Login.php');

if (Login::isLoggedIn()) {
        
         Login::isLoggedIn();
} else{
    header('Location:./Page/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Give Me Game</title>
        <link rel="icon" type="image/x-icon" href="assets/games.png" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Give Me Game</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">About</a></li>
                <li class="sidebar-nav-item"><a href="#services">Services</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Products</a></li>
                <li class="sidebar-nav-item"><a href="./Page/change-password.php">Change-Password</a></li>
                <li class="sidebar-nav-item"><a href="./Page/logout.php">Check out</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Give Me Game</h1>
                <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>New Gaming Products every week!</h2>
                        <p class="lead mb-5">
                            Our store offers many different gaming accesories for your life as a gamer!
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">What We Offer</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">What We Offer</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-solid fa-computer"></i></i></span>
                        <h4><strong>Computer</strong></h4>
                        <p class="text-faded mb-0">Different designs for you!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-brands fa-playstation"></i></i></span>
                        <h4><strong>Playstation</strong></h4>
                        <p class="text-faded mb-0">PS and games for it!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-solid fa-gamepad"></i></i></span>
                        <h4><strong>Controllers</strong></h4>
                        <p class="text-faded mb-0">Controllers for PC/PS/Xbox</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-brands fa-xbox"></i></i></span>
                        <h4><strong>Xbox</strong></h4>
                        <p class="text-faded mb-0">Xbox games for you</p>
                    </div>
                </div>
            </div>
        </section>
        
       
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Products</h3>
                    <h2 class="mb-5">Most ordered products</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">pc set up</div>
                                    <p class="mb-0">You can create your own PC set up!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/second.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Video Games</div>
                                    <p class="mb-0">Lots of video games - new and old! Now for PC/PS/VR and Xbox!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/games.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Playstation</div>
                                    <p class="mb-0">Playstation and controllers in different colors!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/play.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Virtual Reality</div>
                                    <p class="mb-0">VR headset and oculus - and video games to play with your friends! </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/girl.jpg" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Our sponsor from gaming industry</h2>
                <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-brands fa-steam"></i></i></i></span>
                <a class="btn btn-xl btn-dark" href="https://store.steampowered.com/">Click Me!</a>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/simona.ivanova.1048/"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/sivanova_03/"><i class="icon-social-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="https://github.com/Simona03"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                <p class="text-muted small mb-0">Copyright &copy; Give Me Game 2022</p>
            </div>
        </footer>
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>