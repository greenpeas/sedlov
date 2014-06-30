<?php

// если пользователь гость, то перенаправляем его на главную страницу,
// т.к. гость не имеет права добавлять устройства
if ($this->user->is_guest)
    $this->page->redirect('/');

// Инициализируется соединение с базой данных
$db = new db;

// если имеются данные из формы пользователя
if(!empty($_POST) AND ctype_digit($_GET['id'])){
    if(isset($_POST['public']))$public = 1;
    else $public = 0;
    $sql = "
        UPDATE `pages` SET 
        `alias` = '".  addslashes($_POST['alias'])."',
        `title` = '".  addslashes($_POST['title'])."',
        `text` = '".  addslashes($_POST['text'])."',
        `public` = '".  $public."'
        WHERE `id` = ".$_GET['id']."
        ";
    $is = $db->update($sql);
    if($is){
        $this->page->setFlash('error', 'Данные сохранены');
        $this->page->redirect('/pages');
    }
    else $this->page->setFlash('error', 'Ошибка сохранения. Причина: '.$db->error);
}

if(empty($_GET['id']) OR !  ctype_digit($_GET['id']))
    die ('Ошибка,недопустимое значение');
    
$sql = "
    SElECT * FROM `pages` `p` WHERE `p`.`id` = ".$_GET['id'];

$page = $db->select($sql);

$page = $page[0];

$this->page->render('edit_page',array('page'=>$page));
