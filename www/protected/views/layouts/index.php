<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <title><?php echo $this->title; ?></title>

        <meta name="description" content="<?php echo $this->description; ?>">
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <meta name="keywords" content="ремонт сотовых телефонов, ремонт компьютеров, ремонт телефонов в Ставрополе, ремонт телефонов в Михайловске, Седлов А Е, Седлов Андрей">
        <meta name="robots" content="index, follow">

        <LINK HREF="css/style.css?v=1" REL= "stylesheet" TYPE="text/css">

    </head>

    <body>
        <?php
        if(!$this->user->is_guest) {
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

    </body>
</html>
