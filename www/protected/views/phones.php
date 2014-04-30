<?php
$this->setTitle('Устройства');
$this->setLayout('job');
?>
<h1>Телефоны</h1>
<a href="/add_phone">Добавить</a>



<?php
if (!empty($phones)) {
    ?>
<table border="1">
    <thead>
        <tr>
            <td>Дата приема</td>
            <td>Фамилия</td>
            <td>Марка</td>
            <td>Модель</td>
            <td>S/N</td>
            <td>Заявленная неисправность</td>
            <td>Фактическая неисправность</td>
            <td>Статус</td>
            <td>Дата готовности</td>
            <td>Дата выдачи</td>
            <td>Действие</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($phones AS $phone){
            
            echo '<tr>';
            
            echo '<td>'.$phone['date_in'].'</td>';
            echo '<td>'.$phone['family'].'</td>';
            echo '<td>'.$phone['brand'].'</td>';
            echo '<td>'.$phone['model'].'</td>';
            echo '<td>'.$phone['serial'].'</td>';
            echo '<td>'.$phone['fault'].'</td>';
            echo '<td>'.$phone['fact_fault'].'</td>';
            echo '<td>'.$phone['status_name'].'</td>';
            echo '<td>'.$phone['date_ok'].'</td>';
            echo '<td>'.$phone['date_out'].'</td>';
            echo '<td><a href="/edit_phone?id='.$phone['id']
                    .'">Ред</a>&nbsp;|&nbsp;<a href="/delete_phone?id='.$phone['id']
                    .'" class="red" onClick="return confirm(\'Чё, правда?\');">Уд</a></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
    <?php
} else
    echo 'Нет результатов';