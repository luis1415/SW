<?php
    class Album {
        private $name;
        private $description;
        private $id_user;

        /**
         * User constructor.
         * @param $name
         * @param $description
         * @param $id_user
         */
        public function __construct($name, $description, $id_user)
        {
            $this->name = $name;
            $this->description = $description;
            $this->id_user = $id_user;
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

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
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
