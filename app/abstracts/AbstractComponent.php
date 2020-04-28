<?php

abstract class AbstractComponent { 
    protected $db;
    protected $data = [ '_method' => false ];

    function __construct() {
        global $conn;
        $this->db = $conn;

        $data = filter_input_array(INPUT_POST, [
            '_method' => FILTER_SANITIZE_STRING,
            'value' => FILTER_UNSAFE_RAW
        ]);
        
        if ($data) {
            $data['value'] = json_decode($data['value'], true);
            $this->data = $data;
        }
    }

    function getView() {}
}