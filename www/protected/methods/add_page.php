<?php

// если пользователь гость, то перенаправляем его на главную страницу,
// т.к. гость не имеет права добавлять устройства
if ($this->user->is_guest)
    $this->page->redirect('/');

// Инициализируется соединение с базой данных
$db = new db;

// если имеются данные из формы пользователя
if(!empty($_POST)){
    
    if(isset($_POST['public']))$public = 1;
    else $public = 0;
    
    $is = $db->insert("INSERT INTO `pages` "
            . "(`alias`,`title`,`text`,`public`) "
            . "VALUES "
            . "("
            . "'".$db->RealEscapeString($_POST['alias'])."' "
            . ",'".$db->RealEscapeString($_POST['title'])."' "
            . ",'".$db->RealEscapeString($_POST['text'])."' "
            . ",".$public." "
            . ")"
            . ";");
    
    if($is){
        $this->page->setFlash('error', 'Данные сохранены');
        $this->page->redirect('/pages');
    }
    else $this->page->setFlash('error', 'Ошибка сохранения. Причина: '.$db->error);
    
    
}



// отрисовка страницы добавления устройства.
// В рендер передается массив Брендов для ниспадающего элемента в форме
$this->page->render('add_page');
