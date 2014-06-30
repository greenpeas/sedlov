<?php

$db = new db;
$query = "SELECT * FROM `pages` WHERE `public` = 1;";

$pages = $db->select($query);


$this->page->render('main',array('pages'=>$pages));
