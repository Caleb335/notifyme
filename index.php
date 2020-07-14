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
</head>
<body>
    <!-- executes when the form is submitted -->
    <?php
        if(isset($_POST['submit_btn'])) {
            $email = $_POST['email'];

            $errorMessage = '';
            
            // adding the validation script
             if(empty($_POST['email'])) {
                 $errorMessage .= 'You forgot to enter your email address.';
            }

            if(!empty($errorMessage)) {
                echo('<p>There was an error with your form: </p>\n');
                echo('<ul>' . $errorMessage . '</ul>\n');
            } else {
                header("Location: ./thankyou.html");
            }
            // // writes the form input(data) to a CSV file called 'mydata.csv'
            // $fs = fopen("mydata.csv", "a"); 
            //     // concatenates, join both strings or values recieved from the form submission
            //     fwrite($fs . $email . "\n");
            //     fclose($fs);
                
            //     // redirects to a new html page on form submission
            //     header("Location: ./thankyou.html"); 
            //     exit;
            // }

             // create database connection and db variables
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "my_db";
        
            // connect to database
            $conn = mysql_connect($servername, $username, $password, $dbname);
            // if connection to the databse is not successful
            // kill the process
            if(!$conn) {
                die("Connection failed: " . mysql_connect_error());
            } else {
                $sql = "INSERT INTO spaceSeeSubbers (email) values('$email')";
                // if the database connnection has been created successfully print a message saying:
                // new email address has been added
                if(mysql_query($conn, $sql)) {
                    echo 'New email address has been added successfully.';
                } else {
                    echo "Error: " .$sql . "</br>" . mysql_error($conn);
                }
            }

            // close the connection to database
            mysqli_close($conn);
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
        </section>

        <!-- main section -->
        <section id="main">
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
                <div class="facts-intro">
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
        </section>

        <!-- form section -->
        <section id="form">
            <div class="form-container">
                <form action="./index.php" method="POST">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email Address" value="<?=$email;?>">
                    </div>
                    <div class="input-group">
                        <input type="submit" value="Notify Me" name="submit_btn">
                    </div>
                </form>
            </div>
        </section>

        <!-- app pages section -->
        <section id="app_pages">
            <div class="pages">
                <!-- first page -->
                <div class="planet mecury">
                    <img src="./assets/planet-mecury.png" alt="planet mecury">
                    <div class="planet-info">
                        <p class="info-num">01. <hr></p>
                        <p>scroll through to select your prefered planet</p>
                    </div>
                </div>

                <div class="planet mecury">
                    <img src="./assets/planet-mecury.png" alt="planet mecury">
                    <div class="planet-info">
                        <p class="info-num">01. <hr></p>
                        <p>scroll through to select your prefered planet</p>
                    </div>
                </div>

                <div class="planet mecury">
                    <img src="./assets/planet-mecury.png" alt="planet mecury">
                    <div class="planet-info">
                        <p class="info-num">01. <hr></p>
                        <p>scroll through to select your prefered planet</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
