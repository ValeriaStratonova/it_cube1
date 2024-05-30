<?php

require('conn.php');


function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

//Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}



//Запрос на получение данных одной таблицы
function selectAll($table, $par){
    global $pdo;
 
    $sql = "SELECT * FROM `$table`";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);  
    $rows = $query->fetchAll(); 
    return $rows;   
}

function select_All($table, $par){
    global $pdo;
 
    $sql = "SELECT * FROM `$table` ORDER BY `$par` ASC";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);  
    $rows = $query->fetchAll(); 
    return $rows;  
}

function selecttime($table, $par,$id){
    global $pdo;
 
    $sql = "SELECT DATE_FORMAT($par, '%H:%i') as start_time FROM $table WHERE ID = $id";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);  
    $rows = $query->fetch(); 
    return $rows;   
}

function selectOne($table, $par=[]){
    global $pdo;
 
    $sql = "SELECT * FROM `$table`";

    if(!empty($par)){
        $i=0;
        foreach ($par as $key=>$value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . "WHERE $key=$value";
            }
            else{
                $sql = $sql . "AND $key=$value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();   
    dbCheckError($query);
    return $query->fetch();
}


//Добавление в базу данных
function inserts($table,$params){
    global $pdo;

    $i=0;
    $col = '';
    $mask = '';
    foreach($params as $key=>$value){
        if($i === 0){
            $col = $col. "$key";
            $mask = $mask ."'"."$value". "'";
        }
        else{    
            $col = $col. ", $key";
            $mask = $mask.", '"."$value". "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);

    dbCheckError($query); 

    return $pdo->lastInsertId();
}


//Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;

    $i=0;
    $str = '';

    foreach($params as $key=>$value){
        if($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }
        else{    
            $str = $str .  ", " . $key . " = '" . $value. "'";
        }
        $i++;
    }

    $sql = "UPDATE `$table` SET $str WHERE id = $id";


    $query = $pdo->prepare($sql);
    $query->execute($params);

    dbCheckError($query); 

    return $query;
}


//Удаление данных
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id=$id";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query); 

    return $query;
}

// test(selecttime('it_cube', 'start_time', 1));  