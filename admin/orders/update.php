<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $serviceName = $_POST['serviceName'];
    $serviceId = $_POST['serviceId'];

    if(!checkEmpty($serviceName) && !checkEmpty($serviceId) )
    {
        $row = getRowInDB('services','service_id',$serviceId);
        if($row)
        {
            if(checkMinChars($serviceName,3))
            {
                $checkInDB = getRowInDB('services','service_name',$serviceName);
                if($checkInDB)
                {
                    $error_msg = 'service Name Already Exists';
                    header("refresh:2;url=".BURLA."services/edit.php?id=".$serviceId);
                }
                else
                {
                    $sql = "UPDATE services SET service_name = '$serviceName' WHERE service_id = '$serviceId' " ;
                    $success_msg = db_update($sql);
                    header("refresh:2;url=".BURLA."services");
                }
            }
            else
            {
                $error_msg = 'Invalid service Name, min 3 characters';
                header("refresh:2;url=".BURLA."services/edit.php?id=".$serviceId);
                
            }
        }
        else
        {
            $error_msg = 'Invalid Data';
        }
    }
    else
    {
        $error_msg = 'Enter service Name';
        header("refresh:2;url=".BURLA."services/edit.php?id=".$serviceId);
    }

}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>

</div>
</div>





<?php require_once BLA . 'inc/footer.php' ?>
