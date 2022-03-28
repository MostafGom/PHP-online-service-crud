<?php
require_once 'config.php';
require_once BL . 'functions/validate.php';


$available_services = getNameColInDB('services','service_name','service_id');
$available_cities = getNameColInDB('cities','city_name','city_id');

$success_msg = $_SESSION['successMsg'];
$_SESSION['successMsg']='';

if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    // $userPhone = $_POST['userPhone'];
    $userPhone = filter_var($_POST['userPhone'], FILTER_VALIDATE_INT);
    
    $userEmail = $_POST['userEmail'];
    $userNotes = $_POST['userNotes'];
    // $city = $_POST['city'];
    $city = filter_var($_POST['city'], FILTER_VALIDATE_INT);
    
    // $service = $_POST['service'];
    $service = filter_var($_POST['service'], FILTER_VALIDATE_INT);

    if(!checkEmpty($userName) && !checkEmpty($userEmail) && !checkEmpty($userPhone) && !checkEmpty($city) && !checkEmpty($service) )
    {
        if(validEmail($userEmail))
        {
            $sql = "INSERT INTO orders (order_usrname,order_usrphone,order_usremail,order_usrnotes,order_service_id,order_city_id) VALUES ('$userName', '$userPhone' , '$userEmail' , '$userNotes' , $service , $city)";
            $_SESSION['successMsg'] = db_insert($sql);
            header("Location:".BURL."index.php");
        }
        else
        {
            $_SESSION['successMsg']='';
            $error_msg = 'Invalid Email';
            
        }
    }
    else
    {
        $_SESSION['successMsg']='';
        $error_msg = 'All Fields Are Required';
    }

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

<div class="container d-flex justify-content-center align-items-center" style="min-height:90vh;">
    <div class="container card p-4 shadow">

        <?php  require_once BL . 'functions/messages.php' ?>

    <h1 class="text-center mb-5">Place an order</h1>
        <form class="row g-3" method="post" action=<?= $_SERVER['PHP_SELF'] ?>>
            <div class="col-md-6">
                <label for="userEail" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
            </div>
            <div class="col-md-6">
                <label for="userName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>
            <div class="col-md-6">
                <label for="userPhone" class="form-label">Your Phone</label>
                <input type="number" class="form-control" id="userPhone" name="userPhone" required>
            </div>
            <div class="col-6"></div>
            <div class="col-md-6">
                <label for="city" class="form-label">City:</label>
                <select id="city" class="form-select" name="city" required>
                    <option>---Select---</option>
                    <?php foreach ($available_cities as $value) { ?>
                        <option value=<?= $value['city_id']; ?> ><?= $value['city_name']; ?></option>
                    <?php } ?>
                </select>

            </div>

            <div class="col-md-6">
                <label for="service" class="form-label">Service:</label>
                <select id="service" class="form-select" name="service" required>
                <option>---Select---</option>
                    <?php foreach ($available_services as $value) { ?>
                        <option value=<?= $value['service_id']; ?> ><?= $value['service_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
            <label for="userNotes" class="form-label">Add a Note if needed:</label>
                <textarea class="form-control" id="userNotes" rows="3" name="userNotes"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit Order</button>
            </div>
        </form>
    </div>

</div>

<div class="container-fluid mt-3">
    <div class="text-center">
        <p>All Copyrights Reserved&copy;</p>
    </div>
</div>

<script src="<?php echo ASSETS ?>bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="<?php echo ASSETS ?>jquery-3.6.0.min.js" ></script>


</body>
</html>