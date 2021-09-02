<?php

namespace Model;

use app\AbstractManager;

class RatingManager extends AbstractManager
{

private static $classname = "Model\Rating"; 

        public function __construct(){
            self::connect(self::$classname);
        
        }

        public function addRating($user, $score, $comment, $recipe){
            $sql = "INSERT INTO notation (user_id, score, comment, recipe_id)
                    VALUES (:user_id, :score, :comment, :recipe_id)";

            return self::create($sql, [
                    'score' => $score,
                    'comment' => $comment,
                    'user_id' =>$user,
                    'recipe_id' =>$recipe,
            ]);
        }




        /** permet de lister toutes les notations */
        public function findAll(){
            $sql = "SELECT * 
                    FROM notation";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        public function findOneByRecipeId($id){
            $sql = "SELECT *
                    FROM notation
                    WHERE recipe_id = :recipe_id";

            return self::getResults(
                self::select($sql, ['recipe_id' => $id], true),
                self::$classname
            );
        }

        public function findOneByUserId($user_id){
            $sql = "SELECT *
                    FROM notation
                    WHERE user_id = :user_id";

            return self::select($sql, ['user_id' => $user_id], false);
        }


        public function findOneById($id){
            $sql = "SELECT *
                    FROM notation
                    WHERE id = :id";

            return self::getResults(
                self::select($sql, ['id' => $id], true),
                self::$classname
            );
        }
       /**
        * Edition d'un message
        */
        public function updateComment($comment, $id) {
            $sql = "UPDATE notation SET comment = :comment WHERE id = :id";
            return self::update($sql, [
                'id' => $id,
                'comment' => $comment
            ]);
        }
    public function findOneByScore($id){
        $sql = "SELECT *
                FROM notation
                WHERE score = :score";

        return self::getResults(
            self::select($sql, ['id' => $id], true),
            self::$classname
        );
    }
}
