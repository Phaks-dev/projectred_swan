<?php
    namespace Model;

    use App\AbstractEntity;

    class User extends AbstractEntity
    {
        private $id;
        private $username;
        private $createdate;
        private $bio;
        private $role;
        private $img; /**config pour integrer une img version text et l'appeler*/ 

        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }


        /**
         * Get the value of created_at
         */ 
        public function getCreatedate($format)
        {
             return $this->createdate->format($format);
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreatedate($created_at)
        {
                $this->createdate = new \DateTime($created_at);

                return $this;
        }

        public function __toString(){
            return $this->username;
        }

        

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of img
         */ 
        public function getImg()
        {
                return $this->img;
        }

        /**
         * Set the value of img
         *
         * @return  self
         */ 
        public function setImg($img)
        {
                $this->img = $img;

                return $this;
        }

        /**
         * Get the value of bio
         */ 
        public function getBio()
        {
                return $this->bio;
        }

        /**
         * Set the value of bio
         *
         * @return  self
         */ 
        public function setBio($bio)
        {
                $this->bio = $bio;

                return $this;
        }
    }