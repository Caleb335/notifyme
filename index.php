<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form subscription</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .form-container {
        display: flex;
        justify-content: center;
        margin-top: 12%;
    }

    .input-group {
        margin: 20px;
    }
</style>
<body>
    <!-- executes when the form is submitted -->
    <?php
        if($_POST['submitForm'] === 'submit') {
            $errorMessage = '';
            
            // adding the validation script
            if(empty($_POST['fullname'])) {
                $errorMessage .= '<li>You forgot to enter your fullname!</li>';
            } if(empty($_POST['email'])) {
                $errorMessage .= '<li>You forgot to enter your email address</li>';
            }

            // form variables
            $email = $_POST['email'];
            $name = $_POST['fullname'];

            if(!empty($errorMessage)) {
                echo('<p>There was an error with your form: </p>\n');
                echo('<ul>' . $errorMessage . '</ul>\n');
            } else {
            // writes the form input(data) to a CSV file called 'mydata.csv'
            $fs = fopen("mydata.csv", "a"); 
                // concatenates, join both strings or values recieved from the form submission
                fwrite($fs,$name . ", " . $email . "\n");
                fclose($fs);
                
                // redirects to a new html page on form submission
                header("Location: ./thankyou.html"); 
                exit;
            }
        }

        
    ?>

    <div class="form-container">
        <form action="./index.php" method="POST">
            <div class="input-group">
                <input type="text" name="fullname" placeholder="full name" value="<?=$name;?>">
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="email" value="<?=$email;?>">
            </div>
            <input type="submit" value="submit" name="submitForm">
        </form>
    </div>
</body>
</html>