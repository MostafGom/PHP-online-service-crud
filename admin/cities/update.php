<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $cityName = $_POST['cityName'];
    $cityId = $_POST['cityId'];

    if(!checkEmpty($cityName) && !checkEmpty($cityId) )
    {
        $row = getRowInDB('cities','city_id',$cityId);
        if($row)
        {
            if(checkMinChars($cityName,3))
            {
                $checkInDB = getRowInDB('cities','city_name',$cityName);
                if($checkInDB)
                {
                    $error_msg = 'City Name Already Exists';
                    header("refresh:2;url=".BURLA."cities/edit.php?id=".$cityId);
                }
                else
                {
                    $sql = "UPDATE cities SET city_name = '$cityName' WHERE city_id = '$cityId' " ;
                    $success_msg = db_update($sql);
                    header("refresh:2;url=".BURLA."cities");
                }
            }
            else
            {
                $error_msg = 'Invalid City Name, min 3 characters';
                header("refresh:2;url=".BURLA."cities/edit.php?id=".$cityId);
                
            }
        }
        else
        {
            $error_msg = 'Invalid Data';
        }
    }
    else
    {
        $error_msg = 'Enter City Name';
        header("refresh:2;url=".BURLA."cities/edit.php?id=".$cityId);
    }

}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>

</div>
</div>





<?php require_once BLA . 'inc/footer.php' ?>
