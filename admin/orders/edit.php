<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php


if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $serviceId = $_GET['id'];

        $row = getRowInDB('services','service_id',$serviceId);
        if($row)
        {
            $service_id = $row['service_id'];
            // $sql = "INSERT INTO services (service_name) VALUES ('$serviceName' )" ;
            // $success_msg = db_insert($sql);
        }
        else
        {
            header('Location:'.BURLA);
        }
    }
    else
    {
        header('Location:'.BURLA);
    }

    
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>
        <h1 class="bg-light p-2">Edit service</h1>
    <form method="post" action=<?php echo  BURLA . 'services/update.php'; ?> >
        <div class="mb-3">
            <label for="serviceName" class="form-label">service Name</label>
            <input type="text" class="form-control" id="serviceName" name="serviceName" value=<?= $row['service_name']?>>
        </div>
        <input type="hidden" class="form-control" name="serviceId" value=<?= $row['service_id']?>>

        <button type="submit" class="btn btn-primary" value="submit" name="submit">Update service</button>
    </form>
    
</div>
</div>

<!-- BURLA . 'services/update.php';  -->



<?php require_once BLA . 'inc/footer.php' ?>
