<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');

// инициализируется соединение с базой данных
$db = new db;
// формирование SQL запроса
$sql = "
    SElECT 
        *
    FROM `pages` `p`
    ;
    ";
// получение результатов от БД
$pages = $db->select($sql);
// Передача массива данных в рендер.
// Используется отображение "phones"
$this->page->render('pages',array('pages'=>$pages));
