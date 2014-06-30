<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');


if (!empty($_GET['name'])){
    switch($_GET['name']){
        case 'brands' : $table = '`ref_brands`';$name = 'Фирмы-производители'; break;
        case 'statuses' : $table = '`ref_statuses`';$name = 'Статусы заказа'; break;
    }
}
if (empty($table))
    die ('Недопустимый параметр');




$db = new db;
$sql = "
    SElECT *
    FROM ".$table.";
    ";

$items = $db->select($sql);

$this->page->render('ref',array('items'=>$items,'name'=>$name));
