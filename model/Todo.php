<?php

class Todo
{
    private $description;
    private $createDate;
    private $dueDate;

    public function __contstruct($desc, $cd, $dd) {
        $this->description = $desc;
        $this->createDate = $cd;
        $this->dueDate = $dd;

    }


    public function getDueDate()
    {
        return $this->dueDate;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getCreateDate()
    {
        return $this->createDate;
    }

}

?>