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

// Если пришел POST, то сохраняем
if(!empty($_POST)){
    
    if(!ctype_digit($_POST['id']))
    die('Ошибка: недопустимые данные');
    
    //Bug::show($_POST);
    
    $sql = "
        UPDATE ".$table." SET 
        `name` = '".  addslashes($_POST['name'])."'
        WHERE `id` = ".$_POST['id']."
        ";
    
    
    $db->update($sql);
    
    // Перенаправляем на список телефонов
    $this->page->redirect('/ref?name='.$_GET['name']);
    
}



if(empty($_GET['id']) OR !ctype_digit($_GET['id']))
    die ('Ошибка, недопустимое значение');
    

$sql = "
    SElECT *
    FROM ".$table."
    WHERE `id` = ".$_GET['id']."
    ;
    ";
//Bug::show($sql);

$item = $db->select($sql);

$item = $item[0];

$this->page->render('edit_ref_item',array('name'=>$name,'item'=>$item));
