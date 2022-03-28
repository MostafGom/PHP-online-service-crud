<?php require_once __DIR__ . '/../../config.php' ?>
<?php require_once BLA . 'inc/header.php' ?>



<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">service Name</th>
                <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php $data = getRowsInDB('services'); ?>
    <?php $x=1; ?>
    <?php foreach ($data as $row) {?>
        <tr>
            <th scope="row"><?= $x ?></th>
            <td><?= $row['service_name'] ?></td>
            <td>
                <a href=<?= BURLA.'services/edit.php/?id='.$row['service_id']; ?> class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger delete" data-field="service_id" data-id=<?= $row['service_id']?> data-table='services'>Delete</a>
            </td>
        </tr>
        <?php $x++; ?>
        <?php } ?>
        
        
        
    </tbody>
</table>

</div>


<?php require_once BLA . 'inc/footer.php' ?>


<script>
    $(".delete").click(function () {
        var item_id = $(this).attr('data-id');
        var table = $(this).attr('data-table');
        var field = $(this).attr('data-field');
        $.ajax({
            type:"GET", 
            url: "<?= BURLA . 'inc/delete.php' ?>",
            data:{item_id:item_id,table:table,field:field},
            dataType:"text",
            success:function(data){
                var data_json = JSON.parse(data);
                if(data_json.message === 'success'){
                    alert("Deleted Successfully");
                    location.reload();
                }
            }
        })
    })
</script>