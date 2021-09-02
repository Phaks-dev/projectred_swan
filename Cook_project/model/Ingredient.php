<?php

namespace Model;

use App\AbstractEntity;

class Ingredient extends AbstractEntity
{
    private $id;
    private $ingredientname;
    private $quantity;


    /**
     * Get the value of ingredientname
     */ 
    public function getIngredientname()
    {
        return $this->ingredientname;
    }

    /**
     * Set the value of ingredientname
     *
     * @return  self
     */ 
    public function setIngredientname($ingredientname)
    {
        $this->ingredientname = $ingredientname;

        return $this;
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
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}