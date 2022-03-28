<?php require_once  __DIR__ . '/../config.php' ?>
<?php require_once BLA . 'inc/header.php' ?>


<div class="container-fluid d-flex align-items-center justify-content-center" style="height:80vh;">
    <div class="text-center w-50">
        <h1>Welcome, <?= $_SESSION['admin_name'] ?></h1>
        <h3>Take a look at pending orders</h3>
        <h3>You can add more cities and services to help you clients</h3>
    </div>
</div>

<?php require_once BLA . 'inc/footer.php' ?>








