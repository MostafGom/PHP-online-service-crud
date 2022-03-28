<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!checkEmpty($name) && !checkEmpty($email) && !checkEmpty($password) )
    {
        if(validEmail($email))
        {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO admins (admin_name,admin_email,admin_password)
                    VALUES ('$name','$email','$hashedPassword') " ;
                    $success_msg = db_insert($sql);
        }
        else
        {
            $error_msg = 'Invalid Email';
            
        }
    }
    else
    {
        $error_msg = 'All Fields Are Required';
    }

    // require BL . 'functions/messages.php';
}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>
        <h1 class="bg-light p-2">Add Admin</h1>
    <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?> >
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email"  name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
    </form>
    
</div>
</div>



<?php require_once BLA . 'inc/footer.php' ?>