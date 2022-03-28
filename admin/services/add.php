<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $serviceName = $_POST['serviceName'];

    if(!checkEmpty($serviceName) )
    {
        if(checkMinChars($serviceName,3))
        {
            $checkInDB = getRowInDB('services','service_name',$serviceName);
            if($checkInDB)
            {
                $error_msg = 'service Name Already Exists';
            }
            else
            {
                $sql = "INSERT INTO services (service_name) VALUES ('$serviceName' )" ;
                $success_msg = db_insert($sql);
            }
        }
        else
        {
            $error_msg = 'Invalid service Name, min 3 characters';
            
        }
    }
    else
    {
        $error_msg = 'Enter service Name';
    }

}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>
        <h1 class="bg-light p-2">Add service</h1>
    <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?> >
        <div class="mb-3">
            <label for="serviceName" class="form-label">service Name</label>
            <input type="text" class="form-control" id="serviceName" name="serviceName">
        </div>

        <button type="submit" class="btn btn-primary" value="submit" name="submit">Add service</button>
    </form>
    
</div>
</div>





<?php require_once BLA . 'inc/footer.php' ?>
