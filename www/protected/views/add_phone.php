<?php
$this->setTitle('Добавление устройства');
$this->setLayout('job');
?>
<h1>Добавление устройства</h1>


<form action="" method="post">
    
    Фамилия<br>
    <input type="text" name="family"><br><br>
    
    Фирма<br>
    <select name="id_brand">
        <?php
            foreach($brands AS $brand){
                echo '<option value="'.$brand['id'].'">'.$brand['name'].'</option>';
            }
        ?>
    </select><br><br>
    
    Модель<br>
    <input type="text" name="model"><br><br>
    
    Серийный номер<br>
    <input type="text" name="serial"><br><br>
    
    Заявленная неисправность<br>
    <textarea name="fault"></textarea><br><br>
    
    
    Дата приема<br>
    <input type="date" name="date_in"><br><br>
    
    <input type="submit" value="Добавить">
</form>
