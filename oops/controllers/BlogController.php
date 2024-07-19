<?php

namespace controllers\BlogController;

use BaseController;

class BlogController extends BaseController {

    // public function __construct() {
    //     echo 'dddddd';
    //     exit;
    // }

    public function create() {
        return 'index.php';
    }
}

$index = new BlogController();
echo $index->create();