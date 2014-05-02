<?php
$this->setTitle('Проверка статуса заказа');
//$this->setLayout('job');
?>

<h1><?php echo $this->title; ?></h1>

<div style="margin:20px auto; width:300px; text-align: center;">
    
        <div>Введите серийный номер устройства</div>
        <form method="POST" action="status">
            <?php if ($this->flash) { ?>
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">x</a><?php echo $this->showFlash(); ?>
                </div> 
            <?php } ?>
            <input value="<?php echo!empty($_POST["snum"]) ? $_POST["snum"] : null; ?>" id="snum" placeholder="Серийный номер" type="text" name="snum">
            <br>             
            <button class="btn-info btn" type="submit">Найти</button>      
        </form>
    
</div>

<div style="width: 850px;margin: 0 auto;">
    <?php
    if (!empty($phones)) {
        ?>
        <table>
            <thead>
                <tr>
                    <td>Дата приема</td>
                    <td>Марка</td>
                    <td>Модель</td>
                    <td>S/N</td>
                    <td>Заявленная неисправность</td>
                    <td>Фактическая неисправность</td>
                    <td>Статус</td>
                    <td>Дата готовности</td>
                    <td>Дата выдачи</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($phones AS $phone) {

                    echo '<tr>';

                    echo '<td>' . $phone['date_in'] . '</td>';
                    echo '<td>' . $phone['brand'] . '</td>';
                    echo '<td>' . $phone['model'] . '</td>';
                    echo '<td>' . $phone['serial'] . '</td>';
                    echo '<td>' . $phone['fault'] . '</td>';
                    echo '<td>' . $phone['fact_fault'] . '</td>';
                    echo '<td>' . $phone['status_name'] . '</td>';
                    echo '<td>' . $phone['date_ok'] . '</td>';
                    echo '<td>' . $phone['date_out'] . '</td>';

                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
    } else
        echo '<div style="margin: 20px auto; text-align:center;">Нет результатов</div>';
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#snum').focus();
    });

</script>