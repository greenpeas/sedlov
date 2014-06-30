<?php
$this->setTitle('Добавление страницы');
$this->setLayout('job');
?>
<h1><?php echo $this->title; ?></h1>

<form action="" method="post">
    Заголовок:<br><input type="text" name="title" value="<?php if(!empty($_POST['title'])) echo $_POST['title']; ?>" style="width:300px;"><br><br>
    Алиас:<br><input type="text" name="alias" value="<?php if(!empty($_POST['alias'])) echo $_POST['alias']; ?>"><br><br>
    Текст: <br>
    <textarea name="text" style="width: 600px; height: 400px;"><?php if(!empty($_POST['text'])) echo $_POST['text']; ?></textarea><br><br>
    Публиковать: <input type="checkbox" name="public" <?php if(!empty($_POST['public'])) echo 'checked'; ?>><br><br>
    <input type="submit" value="Добавить">
</form>
