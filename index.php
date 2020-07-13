<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form subscription</title>
</head>
<body>
    <!-- executes when the form is submitted -->
    <?php
    // adding the validation script
    if($_POST['submitForm'] === 'submit') {
        $errorMessage = '';
        
        if(empty($_POST['fullname'])) {
            $errorMessage .= '<li>You forgot to enter your fullname!</li>';
        } if(empty($_POST['email'])) {
            $errorMessage .= '<li>You forgot to enter your email address</li>';
        }

        $email = $_POST['email'];
        $name = $_POST['fullname'];

        if(!empty($errorMessage)) {
            echo('<p>There was an error with your form: </p>\n');
            echo('<ul>' . $errorMessage . '</ul>\n');
        } else {
            $fs = fopen("mydata.csv", "a");
                fwrite($fs,$name . ", " . $email . "\n");
                fclose($fs);
                
                header("Location: ./thankyou.html");
                exit;
        }
    } 
        if(isset($_POST['form_submitted'])): 
    ?>
    <h2>Thank you <?php echo $_POST['firstname']; ?> </h2>
    <?php 
        else: 
    ?>
    <h2>Newsletter</h2>
        <form action="./index.php" method="POST">
            <label for="name">Full Name</label>
            <div class="input-group">
                <input type="text" name="fullname" placeholder="fullname" value="<?=$name;?>">
            </div>
            <label for="Email">Email</label>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="<?=$email;?>">
            </div>
            <div class="input-group">
                <input type="submit" value="submit" name="submitForm">
            </div>
        </form>
    <?php 
        endif;
    ?>
</body>
</html>