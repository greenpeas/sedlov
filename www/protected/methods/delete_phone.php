<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');


$db = new db;

// Если пришел POST, то сохраняем
if(!empty($_GET['id'])AND ctype_digit($_GET['id'])){
        
    //Bug::show($_POST);
    
    $sql = "
        DELETE FROM `phones` 
        WHERE `id` = ".$_GET['id']."
        ";
    
    
    $db->execute($sql);
    $this->page->setFlash('error', 'Запись успешно удалена');
    // Перенаправляем на список телефонов
    $this->page->redirect('phones');
    
}
