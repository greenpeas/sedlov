<?php
$phones=array();

if (!empty($_POST)) {

    
    $db = new db;
    
    $sql = "
    SElECT 
        `p`.`id`,
        DATE_FORMAT(`p`.`date_in`,'%d.%m.%Y') AS `date_in`,
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
    
    WHERE `p`.`serial` LIKE '".($db->RealEscapeString($_POST["snum"]))."'
    ;
    ";
$phones = $db->select($sql);

        //$this->page->setFlash('error', 'Неверная пара логина и пароля');
    
}

$this->page->render('status',array("phones"=>$phones));
