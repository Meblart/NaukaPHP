<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author Piotr
 */
 
class Cart extends Product{
    //put your code here
    
    protected $db;
    private $result = array();
    
    function __construct(DB $db = null)
    {
        $this->db = $db;
    }
    
    public function addItemToCart($id)
    {
        //insert do bazy danych

        //$this->db->query("insert into koszyk (id_produktu, id_klienta, ilosc)");

        return $this->getProductById($id);
    }
}
