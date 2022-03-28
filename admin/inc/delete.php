<?php require_once __DIR__ .'/../../functions/db.php'; 



$item_id = $_GET['item_id'];
$field = $_GET['field'];
$table = $_GET['table'];


$sql = "DELETE FROM $table WHERE $field = $item_id ";

$result = deleteRow($sql);

$data=[];
if($result)
{
    $data['message'] = 'success';
}
else 
{
    $data['message'] = 'error';
}

echo json_encode($data);
?>
