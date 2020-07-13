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
        if(isset($_POST['form_submitted'])): 
    ?>
    <h2>Thank you <?php echo $_POST['firstname']; ?> </h2>
    <?php 
        else: 
    ?>
    <h2>Newsletter</h2>
        <form action="./app_release.php" method="POST">
            <label for="Email">Email</label>
            <div class="input-group">
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="submit" value="submit">
            </div>
        </form>
    <?php 
        endif;
    ?>
</body>
</html>