<?php

class MyCollection implements Iterator {
    private $items = [];
    private $position = 0;

    public function __construct( $items ) {
        $this->items = $items;
        $this->position = 0;
    }

    public function current() {
        return $this->items[ $this->position ];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset( $this->items[ $this->position ] );
    }
}

$items = [ 'apple', 'banana', 'cherry', 'mango' ];
$collection = new MyCollection( $items );

foreach ( $collection as $key => $item ) {
    echo "Key: $key; Value: $item" . '<br>';
}
?>
