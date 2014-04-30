<?php

// если юзер не гость, то уводим его отсюда
if (!$this->user->is_guest)
    $this->page->redirect('/');



// если прислана форма авторизации
if (!empty($_POST)) {

    if ($this->user->authUser($_POST['login'], $_POST['pass']))
        $this->page->redirect('/');
    else
        $this->page->setFlash('error', 'Неверная пара логина и пароля');
}

//$this->page->setLayout('login');

$this->page->render('login');
