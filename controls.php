<?php
include("db.php");

$all_teachers = select_All('teachers', 'name');
$schedule = select_All('it_cube', 'start_time');
$day = selectAll('days','day_name');
$gr = select_All('groups','name_gr');
$prog = selectAll('programs','ID');
$dir = select_All('directions','dir_name');
$rooms = select_All('classrooms','class_num');

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $all =  selectOne('teachers', ['id' => $id]);
    $name_teacher = $all['name'];
}
    
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_class'])){
    $id = $_GET['ID_class'];
    $all =  selectOne('classrooms', ['id' => $id]);
    $classroom = $all['class_num'];
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_DIR'])){
    $id = $_GET['ID_DIR'];
    $all =  selectOne('programs', ['id' => $id]);
    $programs = $all['prog_name'];
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID_group'])){
    $id = $_GET['ID_group'];
    $all =  selectOne('groups', ['id' => $id]);
    $gr = $all['name_gr'];
}


if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pr'])){
    $id = $_GET['id_pr'];
    $all =  selectOne('programs', ['id' => $id]);
    $pr = $all['prog_name'];
}
?>