<?php

class Person{
    private $id_person;
    private $name;

    public function __construct($id_person, $name)
    {
        $this->id_person = $id_person;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdPerson()
    {
        return $this->id_person;
    }

    /**
     * @param mixed $id_person
     */
    public function setIdPerson($id_person)
    {
        $this->id_person = $id_person;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    
}