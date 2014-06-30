<?php

if(empty($_GET['alias'])){
    $this->page->setHeader('404');
    $this->page->setTitle('Ошибка 404. Страница не найдена.');
    $this->page->render('404');
}
else {
    $db = new db;
    
    $query = "SELECT * FROM `pages` WHERE `alias` = '".$db->RealEscapeString($_GET['alias'])."' AND `public` = 1;";
    
    $page = $db->select($query);
    
    if($page){
        
        $this->page->render('show_page',array('page'=>$page[0]));
    }
    else {
        $this->page->setHeader('404');
        $this->page->setTitle('Ошибка 404. Страница не найдена.');
        $this->page->render('404');
    }
    
}
