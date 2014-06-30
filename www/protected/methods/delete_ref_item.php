<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');

if (!empty($_GET['name'])){
    switch($_GET['name']){
        case 'brands' : $table = '`ref_brands`'; break;
        case 'statuses' : $table = '`ref_statuses`'; break;
    }
}
if (empty($table))
    die ('Недопустимый параметр');




$db = new db;

// Если пришел POST, то сохраняем
if(!empty($_GET['id'])){
    
    if(!ctype_digit($_GET['id']))
    die('Ошибка: недопустимые данные');
    
    //Bug::show($_POST);
    
    $sql = "
        DELETE FROM ".$table." 
        WHERE `id` = ".$_GET['id']."
        ";
    
    
    $db->execute($sql);
    
    // Перенаправляем на список телефонов
    $this->page->redirect('/ref?name='.$_GET['name']);
    
}
