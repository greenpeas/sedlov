<?php
$this->setTitle('Страницы');
$this->setLayout('job');
?>
<h1><?php echo $this->title; ?></h1>
<a href="/add_page">Добавить</a>



<?php
if (!empty($pages)) {
    ?>
<table class="phones">
    <thead>
        <tr>
            <td>Алиас</td>
            <td>Заголовок</td>
            <td>Публиковать</td>
            <td>Действия</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($pages AS $page){
            
            echo '<tr>';
            
            echo '<td>'.$page['alias'].'</td>';
            echo '<td>'.$page['title'].'</td>';
            echo '<td>'.$page['public'].'</td>';
            
            echo '<td><a href="/edit_page?id='.$page['id']
                    .'">Ред</a>&nbsp;|&nbsp;<a href="/delete_page?id='.$page['id']
                    .'" class="red" onClick="return confirm(\'Чё, правда?\');">Уд</a></td>';
            
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
    <?php
} else
    echo 'Нет результатов';