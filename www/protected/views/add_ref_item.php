<?php
$this->setTitle('Добавление значения в справочник '.$name);
$this->setLayout('job');
?>
<h1>Добавление значения в справочник <?php echo $name; ?></h1>


<form action="" method="post">
    Значение<br>
    <input type="text" name="name"><br><br>
    <input type="submit" value="Добавить">
</form>
