<?php
    class Image_ {
        private $photo;
        private $description;
        private $title;
        private $comments;
        private $id_album;

        /**
         * Image_ constructor.
         * @param $photo
         * @param $description
         * @param $title
         * @param $comments
         * @param $id_album
         */
        public function __construct($photo, $description, $title, $comments, $id_album)
        {
            $this->photo = $photo;
            $this->description = $description;
            $this->title = $title;
            $this->comments = $comments;
            $this->id_album = $id_album;
        }


        /**
         * @return mixed
         */
        public function getPhoto()
        {
            return $this->photo;
        }

        /**
         * @param mixed $photo
         */
        public function setPhoto($photo)
        {
            $this->photo = $photo;
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
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getComments()
        {
            return $this->comments;
        }

        /**
         * @param mixed $comments
         */
        public function setComments($comments)
        {
            $this->comments = array();
        }

        /**
         * @return mixed
         */
        public function getIdAlbum()
        {
            return $this->id_album;
        }

        /**
         * @param mixed $id_album
         */
        public function setIdAlbum($id_album)
        {
            $this->id_album = $id_album;
        }






    }