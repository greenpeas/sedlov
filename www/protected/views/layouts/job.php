<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
	<link rel="icon" href="/phone.png" type="image/x-icon">
	<link rel="shortcut icon" href="/phone.png" type="image/x-icon">	


        <title><?php echo $this->title; ?></title>

        <meta name="description" content="<?php echo $this->description; ?>">
        <meta name="keywords" content="ремонт сотовых телефонов, ремонт компьютеров, ремонт телефонов в Ставрополе, ремонт телефонов в Михайловске, Седлов А Е, Седлов Андрей">
        <meta name="robots" content="index, follow">

        <LINK HREF="css/job.css?v=1" REL= "stylesheet" TYPE="text/css">

    </head>

    <body>
        <?php if ($this->flash) { ?>
            <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $this->showFlash(); ?>
            </div> 
        <?php } ?>


        <?php
        if (!$this->user->is_guest) {
            ?>
            <div>
                Меню: <a href="/phones">Телефоны</a>
                | <a href="/refs">Справочники</a>
                | <a href="status">Проверить статус заказа</a>
                | <a href="pages">Страницы</a>
            </div>
            <div style="text-align: right;">
                  <a href="/logout">Выход</a>
                
            </div>

            <?php
        }
        ?>

        <?php echo $this->html; ?>


        <footer>
            <?php echo $this->gentime; ?>
        </footer>
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        
        
    </body>
</html>
