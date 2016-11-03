<?php
    class Image_ {
        private $id_image;
        private $photo;
        private $description;
        private $title;
        private $comments;

        /**
         * Image_ constructor.
         * @param $id_image
         * @param $photo
         * @param $description
         * @param $title
         * @param $comments
         */
        public function __construct($photo, $description, $title, $comments)
        {

            $this->photo = $photo;
            $this->description = $description;
            $this->title = $title;
            $this->comments = $comments;
        }

        /**
         * @return mixed
         */
        public function getIdImage()
        {
            return $this->id_image;
        }

        /**
         * @param mixed $id_image
         */
        public function setIdImage($id_image)
        {
            $this->id_image = $id_image;
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

    }