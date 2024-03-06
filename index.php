<?php

echo "<h1>Exercice de POO : Livres</h1>";

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});






?>