<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $adminName = $_POST['adminName'];
    $adminEmail = $_POST['adminEmail'];
    $adminId = $_POST['adminId'];

    if(!checkEmpty($adminName) && !checkEmpty($adminId) && !checkEmpty($adminEmail) )
    {
        $row = getRowInDB('admins','admin_id',$adminId);
        if($row)
        {
            if(validEmail($adminEmail))
            {
            
                $sql = "UPDATE admins SET admin_name = '$adminName',admin_email = '$adminEmail' WHERE admin_id = '$adminId' " ;
                $success_msg = db_update($sql);
                header("refresh:2;url=".BURLA."admins");
            }
            else
            {
                $error_msg = 'Invalid Email';
                header("refresh:2;url=".BURLA."admins/edit.php?id=".$adminId);
                
            }
        }
        else
        {
            $error_msg = 'Invalid Data';
        }
    }
    else
    {
        $error_msg = 'Enter admin Name';
        header("refresh:2;url=".BURLA."admins/edit.php?id=".$adminId);
    }

}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>

</div>
</div>





<?php require_once BLA . 'inc/footer.php' ?>
