<?php

// если пользователь гость, то перенаправляем его на главную страницу,
// т.к. гость не имеет права добавлять устройства
if ($this->user->is_guest)
    $this->page->redirect('/');

// Инициализируется соединение с базой данных
$db = new db;

// если имеются данные из формы пользователя
if(!empty($_POST)){
    
    if(empty($_POST['date_in']))$date_in = new DateTime();
    else $date_in = new DateTime($_POST['date_in']);
    
    $is = $db->insert("INSERT INTO `phones` "
            . "(`family`,`id_brand`,`model`,`serial`,`fault`,`date_in`) "
            . "VALUES "
            . "("
            . "'".$db->RealEscapeString($_POST['family'])."' "
            . ",".$db->RealEscapeString($_POST['id_brand'])
            . ",'".$db->RealEscapeString($_POST['model'])."' "
            . ",'".$db->RealEscapeString($_POST['serial'])."' "
            . ",'".$db->RealEscapeString($_POST['fault'])."' "
            . ",".$date_in->format('Ymd')." "
            . ")"
            . ";");
    
    if($is){
        $this->page->setFlash('error', 'Данные сохранены');
    }
    else $this->page->setFlash('error', 'Ошибка сохранения. Причина: '.$db->error);
    
    $this->page->redirect('/phones');
}

// Выборка данных о брэндах из БД
$brands = $db->select("SELECT * FROM `ref_brands` ORDER BY `name`;");

// отрисовка страницы добавления устройства.
// В рендер передается массив Брендов для ниспадающего элемента в форме
$this->page->render('add_phone',array('brands'=>$brands));
