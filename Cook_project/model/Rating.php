<?php
    namespace Model;
    use App\AbstractEntity;
    class Rating extends AbstractEntity
    {
        
        private $score;
        private $scoredate;
        private $comment;
        private $user;
        private $recipe;

        public function __construct($data){
                parent::hydrate($data, $this);
            }
        /**
         * Get the value of score
         */ 
        public function getScore()
        {
                return $this->score;
        }
        /**
         * Set the value of score
         *
         * @return  self
         */ 
        public function setScore($score)
        {
                $this->score = $score;
                return $this;
        }
        /**
         * Get the value of scoredate
         */ 
        public function getScoredate($format)
        {
                return $this->scoredate->format($format);
        }
        /**
         * Set the value of scoredate
         *
         * @return  self
         */ 
        public function setScoredate($created_at)
        {
                $this->scoredate = new \DateTime($created_at);
                return $this;
        }
        /**
         * Get the value of comment
         */ 
        public function getComment()
        {
                return $this->comment;
        }
        /**
         * Set the value of comment
         *
         * @return  self
         */ 
        public function setComment($comment)
        {
                $this->comment = $comment;
                return $this;
        }
        /**
         * Get the value of user_id
         */ 
        public function getUser()
        {
                return $this->user;
        }
        /**
         * Set the value of user_id
         *
         * @return  self
         */ 
        public function setUser($user_id)
        {
                $this->user = $user_id;
                return $this;
        }
        /**
         * Get the value of recipe_id
         */ 
        public function getRecipe()
        {
                return $this->recipe;
        }
        /**
         * Set the value of recipe_id
         *
         * @return  self
         */ 
        public function setRecipe($recipe_id)
        {
                $this->recipe = $recipe_id;
                return $this;
        }
    }
















