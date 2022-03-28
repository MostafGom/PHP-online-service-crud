<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php


if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $cityId = $_GET['id'];

        $row = getRowInDB('cities','city_id',$cityId);
        if($row)
        {
            $city_id = $row['city_id'];
            // $sql = "INSERT INTO cities (city_name) VALUES ('$cityName' )" ;
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
        <h1 class="bg-light p-2">Edit City</h1>
    <form method="post" action=<?php echo  BURLA . 'cities/update.php'; ?> >
        <div class="mb-3">
            <label for="cityName" class="form-label">City Name</label>
            <input type="text" class="form-control" id="cityName" name="cityName" value=<?= $row['city_name']?>>
        </div>
        <input type="hidden" class="form-control" name="cityId" value=<?= $row['city_id']?>>

        <button type="submit" class="btn btn-primary" value="submit" name="submit">Update City</button>
    </form>
    
</div>
</div>

<!-- BURLA . 'cities/update.php';  -->



<?php require_once BLA . 'inc/footer.php' ?>
