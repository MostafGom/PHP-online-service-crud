<?php require_once __DIR__ . '/../../config.php' ?>


<?php require_once BLA . 'inc/header.php' ?>
<?php require_once BL . 'functions/validate.php' ?>

<?php
if(isset($_POST['submit'])){
    $cityName = $_POST['cityName'];

    if(!checkEmpty($cityName) )
    {
        if(checkMinChars($cityName,3))
        {
            $checkInDB = getRowInDB('cities','city_name',$cityName);
            if($checkInDB)
            {
                $error_msg = 'City Name Already Exists';
            }
            else
            {
                $sql = "INSERT INTO cities (city_name) VALUES ('$cityName' )" ;
                $success_msg = db_insert($sql);
            }
        }
        else
        {
            $error_msg = 'Invalid City Name, min 3 characters';
            
        }
    }
    else
    {
        $error_msg = 'Enter City Name';
    }

}
?>

<div class="container-fluid d-flex justify-content-center align-items-center bg-light"  style="height:80vh;">

    <div class="container card w-50 p-4">
        <?php  require BL . 'functions/messages.php'; ?>
        <h1 class="bg-light p-2">Add City</h1>
    <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?> >
        <div class="mb-3">
            <label for="cityName" class="form-label">City Name</label>
            <input type="text" class="form-control" id="cityName" name="cityName">
        </div>

        <button type="submit" class="btn btn-primary" value="submit" name="submit">Add City</button>
    </form>
    
</div>
</div>





<?php require_once BLA . 'inc/footer.php' ?>
