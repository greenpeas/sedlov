<?php
$this->setTitle($page['title']);
$this->setLayout('default');
?>
<h1><?php echo $this->title; ?></h1>

<div class="page-content"><?php echo $page['text']; ?></div>