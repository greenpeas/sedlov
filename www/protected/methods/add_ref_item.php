<?php

// если юзер гость, то уводим его отсюда
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
if(!empty($_POST)){
    $is = $db->insert("INSERT INTO ".$table." (`name`) VALUES ('".$db->RealEscapeString($_POST['name'])."' );");
    
    if($is){
        $this->page->setFlash('error', 'Данные сохранены');
    }
    else $this->page->setFlash('error', 'Ошибка сохранения. Причина: '.$db->error);
    
    $this->page->redirect('/ref?name='.$_GET['name']);
}

$this->page->render('add_ref_item',array('name'=>$name));
