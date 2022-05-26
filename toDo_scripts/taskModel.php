<?php

class Task {
    private $id;
    private $date_register;
    private $task;
    private $id_status;

    public function __get($attribute) {
        return $this->$attribute;
    }

    public function __set($attribute, $value) {
        $this->$attribute = $value;
        return $this;
    }
}

?>