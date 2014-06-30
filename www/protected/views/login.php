<?php $this->setTitle('Авторизация'); ?>

<div style="margin:100px auto; width:300px;">
    <div class="well">
        <legend>Вход в Веб приложение</legend>
        <form method="POST" action="">
            <?php if ($this->flash) { ?>
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">x</a><?php echo $this->showFlash(); ?>
                </div> 
            <?php } ?>
            <input class="span3" id="username" placeholder="Логин" type="text" name="login" autocomplete="off">
            <input class="span3" placeholder="Пароль" type="password" name="pass">             
            <button class="btn-info btn" type="submit">Авторизоваться</button>      
        </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#username').focus();
    });
    
</script>