<?php

include 'v1/Load.php';

spl_autoload_register(function ($className) {
    include $className . '.php';
});
