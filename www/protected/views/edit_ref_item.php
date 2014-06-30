<?php
$this->setTitle('Редактирование значения для справочника «'.$name.'»');
$this->setLayout('job');
?>
<h1><?php echo $this->title; ?></h1>


<form action="" method="post">
    
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    
    Значение<br>
    <input type="text" name="name" value="<?php echo $item['name']; ?>"><br><br>
   
    <input type="submit" value="Сохранить">
</form>
