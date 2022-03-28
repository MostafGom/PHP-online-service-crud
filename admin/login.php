<?php require_once __DIR__ . '/../config.php' ?>
<?php 
if(isset($_SESSION['admin_name']))
{
  header('Location:'.BURLA.'index.php');
}
?>

<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!checkEmpty($email) && !checkEmpty($password) )
    {
        if(validEmail($email))
        {
            $checkInDB = getRowInDB('admins','admin_email',$email);
            if($checkInDB)
            {
                // var_dump($checkInDB);
                $checkPassword = password_verify($password, $checkInDB['admin_password']);
                if($checkPassword)
                {
                    $_SESSION['admin_name'] = $checkInDB['admin_name'];
                    $_SESSION['admin_email'] = $checkInDB['admin_email'];
                    $_SESSION['admin_id'] = $checkInDB['admin_id'];

                    header('Location:'.BURLA.'index.php');
                }
                else
                {
                    $error_msg = 'Invalid Password';
                }
            }
            else
            {
                $error_msg = 'Email Not Registered';
            
            }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>bootstrap/css/bootstrap.min.css">
    <title>Online Service</title>
</head>
<body>
<!-- <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cities
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admins
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href=<?php echo BURLA. "admins/add.php" ?>>Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">View All</a></li>
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav> -->


<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php require BL . 'functions/messages.php'; ?>
        <h1 class="bg-light p-2">Log In</h1>
    <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?> >
       
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


<script src="<?php echo ASSETS ?>bootstrap/js/bootstrap.bundle.min.js" ></script>


</body>
</html>