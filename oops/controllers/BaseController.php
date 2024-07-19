<?php

class BaseController {

    public function __construct() {
        echo 'dddddd';
        exit;
    }

    public function create() {
        return 'index.php';
    }
}

$index = new index();
echo $index->create();