<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'online_service_app';
$port = 3308;
$conn = mysqli_connect($server,$username,$password,$dbname,$port);

if(!$conn){
    die('connection error : ' . mysqli_connect_error() );
}else{
    // echo 'connected';
}


function db_insert($sql)
{
    global $conn;

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        return 'Added Done!!';
    }
    return false;
}


function db_update($sql)
{
    global $conn;

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        return 'Updated Done!!';
    }
    return false;
}



function getRowInDB($table, $field, $value)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE $field = '$value' ";
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0];
        }

    }
    return false;
}

function deleteRow($sql)
{
    global $conn;
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        return 'deleted success';
    }
    return false;
}

function getRowsInDB($table)
{
    global $conn;
    $sql = "SELECT * FROM $table ";
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
        }
        return $rows;

    }
    return false;
}



function getNameColInDB($table,$field_name,$field_id)
{
    global $conn;
    $sql = "SELECT $field_name, $field_id FROM $table ";
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
        }
        return $rows;

    }
    return false;
}


function getServiceName($field_id)
{
    global $conn;

    $sql = "SELECT service_name FROM services WHERE service_id = $field_id ";
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0]['service_name'];
        }
    }
    return 'not found';

}

function getCityName($field_id)
{
    global $conn;

    $sql = "SELECT city_name FROM cities WHERE city_id = $field_id ";
    $result = mysqli_query($conn,$sql); 

    if($result)
    {
        $rows = [];
        if(mysqli_num_rows($result) > 0)
        {
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0]['city_name'];
        }
    }
    return 'not found';

}

?>