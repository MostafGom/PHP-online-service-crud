<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php


if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $adminId = $_GET['id'];

        $row = getRowInDB('admins','admin_id',$adminId);
        if($row)
        {
            $admin_id = $row['admin_id'];
            // $sql = "INSERT INTO admins (admin_name) VALUES ('$adminName' )" ;
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
        <h1 class="bg-light p-2">Edit admin</h1>
    <form method="post" action=<?php echo  BURLA . 'admins/update.php'; ?> >
        <div class="mb-3">
            <label for="adminName" class="form-label">admin Name</label>
            <input type="text" class="form-control" id="adminName" name="adminName" value=<?= $row['admin_name']?>>
        </div>
        <div class="mb-3">
            <label for="adminEmail" class="form-label">admin Email</label>
            <input type="text" class="form-control" id="adminEmail" name="adminEmail" value=<?= $row['admin_email']?>>
        </div>
        <input type="hidden" class="form-control" name="adminId" value=<?= $row['admin_id']?>>

        <button type="submit" class="btn btn-primary" value="submit" name="submit">Update admin</button>
    </form>
    
</div>
</div>

<!-- BURLA . 'admins/update.php';  -->



<?php require_once BLA . 'inc/footer.php' ?>
