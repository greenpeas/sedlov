<?php

// если юзер не гость, то уводим его отсюда
if ($this->user->is_guest)
    $this->page->redirect('/');

// инициализируется соединение с базой данных
$db = new db;
// формирование SQL запроса
$sql = "
    SElECT 
        `p`.`id`,
        DATE_FORMAT(`p`.`date_in`,'%d.%m.%Y') AS `date_in`,
        `p`.`family`,
        `b`.`name` AS `brand`,
        `p`.`model`,
        `p`.`serial`,
        `p`.`fault`,
        `p`.`fact_fault`,
        DATE_FORMAT(`p`.`date_ok`,'%d.%m.%Y') AS `date_ok`,
        DATE_FORMAT(`p`.`date_out`,'%d.%m.%Y') AS `date_out`,
        `s`.`name` AS `status_name`
    FROM `phones` `p`
    LEFT JOIN `ref_brands` `b` ON `p`.`id_brand` = `b`.`id`
    LEFT JOIN `ref_statuses` `s` ON `p`.`id_status` = `s`.`id`
    ORDER BY `p`.`date_in` 
    ;
    ";
// получение результатов от БД
$phones = $db->select($sql);
// Передача массива данных в рендер.
// Используется отображение "phones"
$this->page->render('phones',array('phones'=>$phones));
