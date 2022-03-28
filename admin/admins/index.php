<?php require_once __DIR__ . '/../../config.php' ?>
<?php require_once BLA . 'inc/header.php' ?>



<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Admin Name</th>
                <th scope="col">Admin Email</th>
                <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php $data = getRowsInDB('admins'); ?>
    <?php $x=1; ?>
    <?php foreach ($data as $row) {?>
        <tr>
            <th scope="row"><?= $x ?></th>
            <td><?= $row['admin_name'] ?></td>
            <td><?= $row['admin_email'] ?></td>
            <td>
                <a href=<?= BURLA.'admins/edit.php/?id='.$row['admin_id']; ?> class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger delete" data-field="admin_id" data-id=<?= $row['admin_id']?> data-table='admins'>Delete</a>
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
        console.log(item_id);
        $.ajax({
            type:"GET", 
            url: "<?= BURLA . 'inc/delete.php' ?>",
            data:{item_id:item_id,table:table,field:field},
            // dataType:"json",
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