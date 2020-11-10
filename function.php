<?php




function insert( $table , $columns , $error = false ){

    global $db;

    $columns_name 	= '';
    $values  		= '';

    foreach ($columns as $key => $value) {
        $columns_name .= '`'.$key.'`,';
        ($error) ? $values .= "'".$value."'," : $values .= ":".$key.",";
    }

    $columns_name = rtrim($columns_name,',');
    $values = rtrim($values,',');


    $sql = "INSERT INTO $table ($columns_name) VALUES ($values);";

    if($error){
        return $sql;
    }


    $stmt 	=  $db->prepare($sql);
    $result =  $stmt->execute($columns);

    if($result){
        return true;
    }else {
        return false;
    }
}


function delete ($table , $rowId , $error = false ){

    global $db;

    $sql = "DELETE FROM `$table` WHERE  `id` = '$rowId' LIMIT 1  ";

    if($error){
        return $sql;
    }

    $stmt 	=  $db->prepare($sql);
    $result =  $stmt->execute();

    if($result){
        return true;
    }else {
        return false;
    }
}

function edit($table , $columns , $rowId ,  $error = false){

    global $db;
    $temp_query = '';

    foreach ($columns as $key => $value) {
        ($error) ? $temp_query .= "`".$key."`='".$value."'," : $temp_query .= "`".$key."`= :".$key.",";
    }

    $temp_query = rtrim($temp_query,',');

    $sql = "UPDATE `$table` SET  $temp_query  WHERE id = '$rowId' ";

    if($error){
        return  $sql;
    }


    $stmt 	=  $db->prepare($sql);
    $result =  $stmt->execute($columns);

    if($result){
        return true;
    }else {
        return false;
    }

}


?>