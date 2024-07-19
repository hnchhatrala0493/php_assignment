<?php

class index {

    public $name, $age;

    public function __construct( $name = 'no name', $age = 0 ) {
        $this->name = $name;
        $this->age = $age;
    }

    public function show() {
        return $this->name.' - '. $this->age;
    }
}

$index = new index();

print_r( $index->show() );