<?php
spl_autoload_register(function ($classname) {

    if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
        include __DIR__ . '/controller/' . $classname . '.php';
        return true;
    } elseif (preg_match('/[a-zA-Z]+Model$/', $classname)) {
        include __DIR__ . '/model/' . $classname . '.php';
        return true;
    } elseif (preg_match('/[a-zA-Z]+View$/', $classname)) {
        include __DIR__ . '/view/' . $classname . '.php';
        return true;
    }
});
