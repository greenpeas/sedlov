<?php

// если юзер гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');

$db = new db;


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



// если прислана форма авторизации
//if (!empty($_POST)) {
//
//    if ($this->user->authUser($_POST['login'], $_POST['pass']))
//        $this->page->redirect('/');
//    else
//        $this->page->setFlash('error', 'Неверная пара логина и пароля');
//}



$brands = $db->select("SELECT * FROM `ref_brands` ORDER BY `name`;");

//Bug::show($brands);

$this->page->render('add_phone',array('brands'=>$brands));
