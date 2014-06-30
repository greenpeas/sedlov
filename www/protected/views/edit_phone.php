<?php
$this->setTitle('Редактирование записи');
$this->setLayout('job');
?>
<h1><?php echo $this->title; ?></h1>


<form action="" method="post" id="ep_form">
    
    <input type="hidden" name="id" value="<?php echo $phone['id']; ?>">
    
    Фамилия<br>
    <input type="text" name="family" value="<?php echo $phone['family']; ?>"><br><br>
   
    Фирма<br>
    <select name="id_brand">
        <?php
            foreach($brands AS $brand){
                
                $sel = null;
                
                if($brand['id'] == $phone['id_brand'])$sel = 'selected';
                
                echo '<option value="'.$brand['id'].'" '.$sel.'>'.$brand['name'].'</option>';
            }
        ?>
    </select><br><br>
    
    Модель<br>
    <input type="text" name="model" value="<?php echo $phone['model']; ?>"><br><br>
    
    Серийный номер<br>
    <input type="text" name="serial" value="<?php echo $phone['serial']; ?>"><br><br>
    
    Заявленная неисправность<br>
    <textarea name="fault"><?php echo $phone['fault']; ?></textarea><br><br>
    
    Фактическая неисправность<br>
    <textarea name="fact_fault"><?php echo $phone['fact_fault']; ?></textarea><br><br>
    
    
    Дата приема<br>
    <input type="date" name="date_in" value="<?php echo $phone['date_in']; ?>"><br><br>
    
    Дата готовности<br>
    <input type="date" name="date_ok" id="date_ok" value="<?php echo $phone['date_ok']; ?>"><br><br>
    
    Дата выдачи<br>
    <input type="date" name="date_out" value="<?php echo $phone['date_out']; ?>"><br><br>
    
    Статус<br>
    <select name="id_status" id="cs_sel">
        <?php
            foreach($statuses AS $status){
                
                $sel = null;
                
                if($status['id'] == $phone['id_status'])$sel = 'selected';
                
                echo '<option value="'.$status['id'].'" '.$sel.'>'.$status['name'].'</option>';
            }
        ?>
    </select><br><br>
    
    <input type="submit" value="Сохранить">
</form>
