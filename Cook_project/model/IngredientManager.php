<?php

namespace Model;

use app\AbstractManager;

class IngredientManager extends AbstractManager {

    private static $classname = "Model\Ingredient"; 

    public function __construct(){
        self::connect(self::$classname);
    }
    /** fonction peremettant de chercher et trouver les ingredients a partir de la bdd */
    public function findIngredientame($ingredientname){
    
        $sql = "SELECT * FROM ingredient WHERE ingredientname = :ingredientname";

        return self::getOneOrNullResult(
            self::select($sql, ['ingredientname' => $ingredientname], false),
            self::$classname
        );
    }
    /** fonction permettant d'ajouter un ingredient dans la bdd */
    public function addIngredientname($ingredientname){
        $sql = "INSERT INTO ingredient (ingredientname,) VALUES (:ingredientname,)";

        return self::create($sql, [
                'ingredientname' => $ingredientname
                
            ]);
    }
    
    public function findAll(){
        $sql = "SELECT * FROM user";

        return self::getResults(
            self::select($sql, null, true),
            self::$classname
        );
    }
    
    public function findByRating($idrating){
        $sql = "SELECT id, ingredientname FROM user WHERE rating_id = :id";

        return self::getResults(
            self::select($sql, ['id' => $idrating], true),
            self::$classname
        );
    }
}
    
?>