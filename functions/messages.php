<?php if(isset($error_msg) && $error_msg != '') { ?>
    <div class="alert alert-danger container mb-0" role="alert">
        <?php echo $error_msg ?>
    </div>

<?php } ?>


<?php if(isset($success_msg) && $success_msg != '') { ?>
    <div class="alert alert-success mb-0" role="alert">
        <?php echo $success_msg ?>
    </div>

<?php } ?>