<?php

class page {

    public $header;         // Заголовки посылаемые браузеру
    public $html;           // HTML контент
    private $layout;        // Лэйоут страницы
    private $view;          // хз
    public $title;          // Титл страницы
    private $gentime;       // Время генерации страницы
    public $description;    // Описание страницы
    public $flash;          // Нотиф сообщение
    public $controller;     // Экземпляр объекта контроллера
    public $user;           // Экземпляр юзера
    public $locss;          // Подключаемые CSS файлы        
    public $breadcrumbs;    // Хлебные крошки

    function __construct($userobj = null) {
        $this->layout = 'default';
        $this->html = null;
        $this->title = null;
        $this->description = null;
        $this->set_breadcrumbs();
        $this->locss = array();
        $this->flash = (!empty($_SESSION['flash'])) ? 1 : 0;
        if (!$userobj)
            $this->user = new user;
        else
            $this->user = $userobj;
    }

    public function setHeader($string) {
        switch ($string) {
            case '404': $this->header = 'HTTP/1.0 404 Not Found';
                break;
            case '403': $this->header = 'HTTP/1.0 403 Forbidden';
                break;
            default : $this->header = $string;
                break;
        }
    }

    public function setTitle($string) {
        $this->title = $string;
    }

    public function setLayout($string) {
        $this->layout = $string;
    }

    public function render($__view, $data = null, $__returnstr = 0) {
		// метод рендеринга страницы
        // Создаем переданные в рендер переменные
        
        if($data AND is_array($data)){
            foreach($data AS $key=>$val){
                $$key = $val;
            }
        }

        
        $__mtime = microtime();
        $__mtime = explode(" ", $__mtime);
        $__mtime = $__mtime[1] + round($__mtime[0], 3);
        $__tend = $__mtime;
        $__tpassed = ($__tend - TSTART);
        $this->gentime = round($__tpassed, 3);

        if (!file_exists('protected/views/' . $__view . '.php'))
            die('Невозможно найти вьюшку ' . $__view);

        // выполняем вьюшку
        ob_start();
        include 'protected/views/' . $__view . '.php';
        $__output = ob_get_contents();
        ob_end_clean();

        // если выводим через лейоут
        if (!$__returnstr) {
            $this->html = $__output;
            if ($this->header)
                header($this->header);
            include 'protected/views/layouts/' . $this->layout . '.php';
            exit;
        }
        else
            return $__output;
    }

    public function redirect($addr) {
        header('Location: ' . $addr);
        exit;
    }

    public function setFlash($type = 'error', $text = '') {
        $_SESSION['flash'] = $text;
        $this->flash = 1;
    }

    public function showFlash() {
        $tmp_flash = (!empty($_SESSION['flash'])) ? $_SESSION['flash'] : false;
        if (!empty($_SESSION['flash']))
            unset($_SESSION['flash']);
        return $tmp_flash;
    }

    public function regcss($css_path) {
        $this->locss[] = $css_path;
        return true;
    }

    public function getcss() {
        $link = '';
        foreach ($this->locss AS $css) {
            $link .= '<link href="' . $css . '" rel="stylesheet" media="screen">
';
        }
        return $link;
    }

    public function set_breadcrumbs($array = array(), $dlm = "&nbsp;»&nbsp;") {
        $this->breadcrumbs = array('array' => $array, 'dlm' => $dlm);
    }

    public function show_breadcrumbs() {

        $elements = array();

        $elements[] = '<a href="/">Главная</a>';

        //Bug::show($this->breadcrumbs['array']);

        if (!empty($this->breadcrumbs['array']))
            foreach ($this->breadcrumbs['array'] AS $key => $val) {
                $elements[] = !is_numeric($key) ? '<a href="' . $val . '">' . $key . '</a>' : $val;
            }

        return implode($this->breadcrumbs['dlm'], $elements);
    }

}
