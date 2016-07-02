<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Piotr
 */
 
class Product {
    //put your code here
    
    protected $db;
    private $result = array();
    
    function __construct(DB $db  = null)
    {
        $this->db = $db;
    }
    
    public function getProductById($id)
    {
        $query = $this->db->query('select * from produkt where id_produktu = "'.$id.'"');
        $this->result = $query;
        
        return $this->result->fetchAll();
    }
    
    public function getProductByCategory($id)
    {
        $query = $this->db->query('select * from produkt where id_kategorii = "'.$id.'"');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getProducts()
    {
<<<<<<< HEAD
        $query = $this->db->query('select * from produkt where cena_jednostkowa < 500');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function showProducts()
    {
        $query = $this->db->query('select * from produkt');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getZamowienie()
    {
        $query = $this->db->query('select * from zamowienie');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getDaneKlienta()
    {
        $query = $this->db->query('select * from klient where id_klienta=(select id_klienta from zamowienie)');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getZamowienieKlienta()
    {
        $query = $this->db->query('select * from zamowienie where id_klienta=(select id_klienta from zamowienie)');
        $this->result = $query;
        
        return $this->result;
    }
    
    public function getZamowienieProduktyKlienta()
    {
        $query = $this->db->query('select * from produkt where id_produktu=(select id_produktu from pozycja_zamowienia)');
        $this->result = $query;
        
        return $this->result;
    }
 
    public function getAdresKlienta()
    {
        $query = $this->db->query('select * from adres_klienta where id_klienta=(select id_klienta from klient where id_klienta=(select id_klienta from zamowienie) )');
        $this->result = $query;
        
=======
        //$query = $this->db->query('select * from produkt where cena_jednostkowa < 500');
        $query = $this->db->query('select * from produkt');
        $this->result = $query;

>>>>>>> origin/Testy
        return $this->result;
    }
    
    public function getCategories()
    {
        $query = $this->db->query('select * from kategoria');
        $this->result = $query;
        
        return $this->result;
    }
    
    
}
