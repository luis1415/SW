<?php

class User{
    private $id_user;
    private $id_person;
    private $nickname;
    private $avatar;

    public function __construct($id_user, $id_person, $nickname, $avatar)
    {
        $this->id_user = $id_user;
        $this->id_person = $id_person;
        $this->nickname = $nickname;
        $this->avatar = $avatar;
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
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }





}