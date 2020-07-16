<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome &mdash; SpaceSee</title>
    <!-- custom css -->
    <link rel="stylesheet" href="./css/app.css">
    <!-- favicon -->
    <link rel="icon" href="./assets/see.png">
    <!-- lightbox css -->
    <link rel="stylesheet" href="./assets/dist/css/lightbox.min.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/d9e33f69d6.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- executes when the form is submitted -->
    <?php
        $email = filter_input(INPUT_POST, 'email');
        // check for empty form submission
        // if user input any email address create a connection to the database
        // store the data
        if(!empty($email)) {
            // define database variables
            $db_username = "id14349289_seespace";
            $host = "localhost";
            $db_password = "19310403<#>2344Ca";
            $db_name = "id14349289_spacesee";
            // define message variable
            $message = "";

            // establishing connection to the database
            $conn = new mysqli ($host, $db_username, $db_password, $db_name);
            
            // if there is an error connecting to MySQL database
            if(mysqli_connect_error()) {
                // kill the process, by logiing an error message
                // with the error number/code and the message
                die('Connection error ('. mysqli_connect_errno() . ') ' . mysqli_connect_error());
            } else {
                $sql = "INSERT INTO SpaceSubbers  (email) 
                VALUES (
                    '$email'
                )";
                // if the connection is sucessful perform a query on the database
                // print a message indicating the success of data inserted.
                // else log an error message.
                if($conn -> query($sql)) {
                    $message = "Your email address has been received. Thanks";
                } else {
                    $message = "Error: " . $sql . " ". $conn -> error;
                }
                // close the connection
                $conn -> close();
            }
            // if the user doesn't input an email address
            // log an error message and kill the process
        } else {
            $message = "email address can not be empty";
        }
    ?>
    <div class="container">
            <!-- head section -->
        <section id="header">
            <header>
                <nav>
                    <div class="nav-brand">
                        <img src="./assets/see.png" alt="">
                        <div class="brand-text">
                            <h3>spacesee</h3>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="main">
                <div class="hero">
                    <div class="hero-intro">
                        <h1>spacesee</h1>
                        <div class="hero-details">
                            <p>Learn about your Universe and everything in it. The app that allows you to travel through space with out leaving where you are. </p>
                        </div>
                        <p class="cta">Coming soon...</p>
                    </div>
                </div>
                <!-- know more -->
                <div class="facts">
                    <div class="facts-intro fade">
                        <p>Did You Know?</p> <hr>
                    </div>
                    <div class="facts-container">
                        <div class="fact-box one">
                            <p class="num">01</p>
                            <p>Neutron stars can spin at a rate of 600 rotations per second. </p>
                        </div>
                        <div class="fact-box two">
                            <p class="num">02</p>
                            <p>Neutron stars can spin at a rate of 600 rotations per second. </p>
                        </div>
                        <div class="fact-box three">
                            <p class="num">03</p>
                            <p>Neutron stars can spin at a rate of 600 rotations per second. </p>
                        </div>
                    </div>
                </div>
            </div>
           <!-- form section -->
           <section id="form">
            <div class="form-container">
                    <form action="./index.php" method="POST" class="fade">
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Email Address" value="<?=$email;?>">
                            <p class="message" style="opacity: .4">
                                <?php  
                                    if($message !== "") {
                                        echo $message;
                                    } else {
                                        echo "";
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="input-group">
                            <input type="submit" value="Notify Me" name="submit_btn">
                        </div>
                    </form>
                </div>
           </section>
        </section>
        <!-- app pages section -->
        <section id="app_pages">
            <div class="pages">
            <h2>App features</h2>
                <!-- first page -->
                <div class="planet mecury">
                    <div class="planet-view">
                        <div class="absolute-mars">
                            <img src="./assets/planet-mars.png" class="mars" alt="">
                        </div>
                        <a href="./assets/planet-mecury.png" data-lightbox="planet-mecury" data-alt="planet mecury">
                            <img src="./assets/planet-mecury.png" alt="planet mecury">
                        </a>
                    </div>
                    <div class="planet-info">
                        <p class="info-num">01</p>
                        <p>scroll through to select your prefered planet</p>
                    </div>
                </div>

                <div class="planet venus">
                    <div class="planet-view">
                        <div class="absolute-mars earth">
                            <img src="./assets/typo.png" alt="">
                        </div> 
                        <a href="./assets/planet-venus.png" data-lightbox="planet-mecury" data-alt="planet mecury">
                            <img src="./assets/planet-venus.png" alt="planet mecury">
                        </a>
                    </div>
                    <div class="planet-info info-venus">
                        <p class="info-num">02</p>
                        <p>Flag your favorite planet.</p>
                    </div>
                </div>

                <div class="planet mecury-more">
                    <div class="planet-view">
                        <div class="absolute-mars mars">
                            <img src="./assets/planet-mars.png" alt="">
                        </div>
                        <a href="./assets/about-mecury.png" data-lightbox="about-mecury" data-alt="planet mecury">
                            <img src="./assets/about-mecury.png" alt="planet mecury">
                        </a>
                    </div>
                    <div class="planet-info">
                        <p class="info-num">03</p>
                        <p>view the selected planet in 3D.</p>
                    </div>
                </div>
                <!-- pages overview -->
                <div class="pages-overview">
                    <div class="planet mecury-overview">
                        <div class="planet-view">
                            <div class="absolute-mars tour">
                                <img src="./assets/moon-plain.png" alt="">
                            </div>
                            <a href="./assets/mecury-tour.png" data-lightbox="about-mecury" data-alt="planet mecury">
                                <img src="./assets/mecury-tour.png" alt="planet mecury">
                            </a>
                        </div>
                        <div class="planet-info info-venus">
                            <p class="info-num">05</p>
                            <p>View live 360 view from the Space rovers.</p>
                        </div>                       
                    </div>
                    <!-- another page overview -->
                    <div class="flex-overview">
                        <div class="planet mecury-question">
                            <a href="./assets/mecury-question.png" data-lightbox="about-mecury" data-alt="planet mecury">
                                <img src="./assets/mecury-question.png" alt="planet mecury">
                            </a>                       
                        </div>
                        <div class="flex-overview-info">
                            <div class="planet-info">
                                <p class="info-num">04</p>
                                <p>Get to know more about the beautiful planet.</p>
                            </div>
                            <div class="planet-info info-venus">
                                <p class="info-num">06</p>
                                <p>Check out quick to know facts about the planet.</p>
                            </div>
                        </div>
                        <!-- yet another page overview -->
                        <div class="planet mecury-overview">
                            <a href="./assets/mecury-overview.png" data-lightbox="about-mecury" data-alt="planet mecury">
                                <img src="./assets/mecury-overview.png" alt="planet mecury">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- app call to action -->
                <div class="app-cta">
                    <p class="get-it">Become one of the first to get it.</p>
                    <div class="about-spacesee">
                        <p>SpaceSee is an an app that lets you explore the Universe and unknown facts about it.</p>
                    </div>
                    <button class="sub_btn">
                        <a href="#header">Subscribe</a>
                    </button>
                    <div class="socials">
                        <span>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-facebook-square"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- lightbox javascript -->
    <script src="./assets/dist/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>
