<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');


$db = new db;

// Если пришел POST, то сохраняем
if(!empty($_POST)){
    
    if(!ctype_digit($_POST['id']))
    die('Ошибка: недопустимые данные');
    
    //Bug::show($_POST);
    
    $sql = "
        UPDATE `phones` SET 
        `family` = '".  addslashes($_POST['family'])."',
        `id_brand` = ".  addslashes($_POST['id_brand']).",
        `model` = '".  addslashes($_POST['model'])."',
        `serial` = '".  addslashes($_POST['serial'])."',
        `fault` = '".  addslashes($_POST['fault'])."',
        `fact_fault` = '".  addslashes($_POST['fact_fault'])."',
        `date_in` = '".  addslashes($_POST['date_in'])."',
        `date_ok` = ". (!empty($_POST['date_ok']) ? "'".$_POST['date_ok']."'":"NULL") .",
        `date_out` = ". (!empty($_POST['date_out']) ? "'".$_POST['date_out']."'":"NULL") .",
        `id_status` = ".  addslashes($_POST['id_status'])."
        WHERE `id` = ".$_POST['id']."
        ";
    
    
    $db->update($sql);
    
    // Перенаправляем на список телефонов
    $this->page->redirect('phones');
    
}



if(empty($_GET['id']) OR !  ctype_digit($_GET['id']))
    die ('Ошибка,недопустимое значение');
    

$sql = "
    SElECT 
        `p`.`id`,
        `p`.`family`,
        `p`.`id_brand`,
        `p`.`model`,
        `p`.`serial`,
        `p`.`fault`,
        `p`.`fact_fault`,
        `p`.`date_in`,
        `p`.`date_ok`,
        `p`.`date_out`,
        `p`.`id_status`
    FROM `phones` `p`
    
    WHERE `p`.`id` = ".$_GET['id']."
    ;
    ";
//Bug::show($sql);

$phone = $db->select($sql);

$phone = $phone[0];

$brands = $db->select("SELECT * FROM `ref_brands` ORDER BY `name`;");

$statuses = $db->select("SELECT * FROM `ref_statuses` ;");

$this->page->render('edit_phone',array('phone'=>$phone,'brands'=>$brands,'statuses'=>$statuses));
