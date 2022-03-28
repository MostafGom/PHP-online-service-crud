<?php require_once __DIR__ . '/../../config.php' ?>
<?php $admin_link = BURLA. "admins/add.php" ?>
<?php
if(!isset($_SESSION['admin_name']))
{
  header('Location:'.BURLA.'login.php');
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
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active font-weight-bold fs-4" aria-current="page" href="/admin">Home</a>
        </li>
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cities
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href=<?php echo BURLA. "cities/add.php" ?>>Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href=<?php echo BURLA. "cities/index.php" ?>>View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href=<?php echo BURLA. "services/add.php" ?>>Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href=<?php echo BURLA. "services/index.php" ?>>View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Orders
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href=<?php echo BURLA. "orders/index.php" ?>>View All</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admins
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href=<?php echo BURLA. "admins/add.php" ?>>Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href=<?php echo BURLA. "admins/index.php" ?>>View All</a></li>
          </ul>
        </li>
        

        <?php if(isset($_SESSION['admin_name'])) { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=<?php echo BURLA. "logout.php" ?>>Logout</a>
          </li>        
        <?php }?>
      </ul>
      
    </div>
  </div>
</nav>


