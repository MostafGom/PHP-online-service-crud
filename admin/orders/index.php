<?php require_once __DIR__ . '/../../config.php' ?>
<?php require_once BLA . 'inc/header.php' ?>



<div class="container">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Name</th>
                <th scope="col">Order Email</th>
                <th scope="col">Order Phone</th>
                <th scope="col">Order Notes</th>
                <th scope="col">Order City</th>
                <th scope="col">Order Service</th>
                <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <?php $data = getRowsInDB('orders'); ?>
    <?php $x=1; ?>
    <?php foreach ($data as $row) {?>
        <tr>
            <th scope="row"><?= $x ?></th>
            <td><?= $row['order_usrname'] ?></td>
            <td><?= $row['order_usremail'] ?></td>
            <td><?= $row['order_usrphone'] ?></td>
            <td><?= $row['order_usrnotes'] ?></td>
            <td><?= getCityName($row['order_city_id']) ?></td>
            <td><?= getServiceName($row['order_service_id'])  ?></td>
            <td>
                <a href=<?= BURLA.'orders/edit.php/?id='.$row['order_id']; ?> class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger delete" data-field="order_id" data-id=<?= $row['order_id']?> data-table='orders'>Delete</a>
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