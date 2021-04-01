<?php

include 'autoloader.php';

const __TEST_DIR__ = __DIR__ . '/v1/tests';

foreach (new DirectoryIterator(__TEST_DIR__) as $file) {
    
    if (substr($file->getFilename(), -8) !== 'Test.php') {
        continue;
    }

    $className = substr($file->getFilename(), 0, -4);
    $testClass = new $className();

    $methods = get_class_methods($testClass);
    foreach ($methods as $method) {

        if (substr($method, -4) !== 'Test') {
            continue;
        }
        
        $testClass->$method();
    }
}
