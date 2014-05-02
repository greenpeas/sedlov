<?php
$this->setTitle('Справочник '.$name.'');
$this->setLayout('job');
?>
<h1>Справочник <?php echo $name; ?></h1>

<a href="/add_ref_item?name=<?php echo $_GET['name']; ?>">Добавить значение</a><br><br>
<?php
if (!empty($items)) {
    ?>
<table>
    <thead>
        <tr>
            <td>Значение</td>
            <td>Действие</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($items AS $item){
            
            echo '<tr>';
            
            echo '<td>'.$item['name'].'</td>';
           
            echo '<td><a href="/edit_ref_item?name='.$_GET['name'].'&id='.$item['id']
                    .'">Ред</a>&nbsp;|&nbsp;<a href="/delete_ref_item?name='.$_GET['name'].'&id='.$item['id']
                    .'" class="red" onClick="return confirm(\'Чё, правда?\');">Уд</a></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
    <?php
} else
    echo 'Нет результатов';