<?php
$this->setTitle('Редактирование страницы');
$this->setLayout('job');
?>
<h1><?php echo $this->title; ?></h1>

<form action="" method="post">
    Заголовок:<br><input type="text" name="title" value="<?php if(!empty($page['title'])) echo $page['title']; ?>" style="width:300px;"><br><br>
    Алиас:<br><input type="text" name="alias" value="<?php if(!empty($page['alias'])) echo $page['alias']; ?>"><br><br>
    Текст: <br>
    <textarea name="text" style="width: 600px; height: 400px;"><?php if(!empty($page['text'])) echo $page['text']; ?></textarea><br><br>
    Публиковать: <input type="checkbox" name="public" <?php if($page['public']) echo 'checked'; ?>><br><br>
    <input type="submit" value="Сохранить">
</form>
