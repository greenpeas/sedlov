<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <title><?php echo $this->title; ?></title>

        <meta name="description" content="<?php echo $this->description; ?>">

        <meta name="keywords" content="ремонт сотовых телефонов, ремонт компьютеров, ремонт телефонов в Ставрополе, ремонт телефонов в Михайловске, Седлов А Е, Седлов Андрей">
        <meta name="robots" content="index, follow">

        <LINK HREF="css/style.css" REL= "stylesheet" TYPE="text/css">
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    </head>

    <body>
        <a href="/">Главная</a>

        <?php echo $this->html; ?>
        
        
        <footer>
            <?php echo $this->gentime; ?>
        </footer>

    </body>
</html>
