<?php


class CartManager extends DBManager
{
    private $clientId;


    public function __construct()
    {
        parent::__construct(); ///richiamo il costruttore del padre
        $this->columns = array('id', 'client_id'); //preferibilmente tenere tutto minuscolo per case sensitive
        $this->tableNames = 'cart';

        $this->initializeClientIdFromSession();
    }

    // public methods 
    public function getCurrentCartId()
    {
        $cartId = 0;
        $result = $this->db->query("SELECT * FROM cart WHERE client_id= '$this->clientId'");
        if (count($result) > 0) {
            $cartId = $result[0]['id'];
        } else {
            $cartId = $this->create([
                'client_id' => $this->clientId
            ]);
        }
        return $cartId;
    }

    public function addToCart($productId, $cartId)
    {
        $quantity = 0;
        $result = $this->db->query("SELECT * FROM cart_item WHERE cart_id= $cartId AND products_id= $productId");
        if (count($result) > 0) {
            $quantity = $result[0]['quantity'];
        }
        $quantity++;
        if (count($result) > 0) {
            $this->db->execute("UPDATE cart_item SET quantity = $quantity  WHERE cart_id= $cartId AND products_id= $productId");
        } else {
            $cartItemMgr = new CartItemManager();
            $cartItemMgr->create(
                [
                    'cart_id' => $cartId,
                    'products_id' => $productId,
                    'quantity' => 1
                ]

            );
        }
    }

    //private method
    private function initializeClientIdFromSession()
    {
        if (isset($_SESSION['client_id'])) {
            $this->clientId = $_SESSION['client_id']; // nel caso l'id esista lo prelevo dalla sessione 

        } else {
            //generare una stringa casuale 
            $str = $this->_randomString(); //altrimento lo genero 


            //settare la client id con la string 
            $_SESSION['client_id'] = $str; // lo salvo in sessione 
            $this->clientId = $str;
        }
    }

    private function _randomString()
    {
        return substr(md5(mt_rand()), 0, 20); /// mtRandom restituisce un numero casuale md5 cripto il numero e prendo i primi 20 caratteri 
    }
}


class CartItemManager extends DBManager
{
    public function __construct()
    {
        parent::__construct(); ///richiamo il costruttore del padre
        $this->columns = array('id', 'cart_id', 'products_id', 'quantity'); //preferibilmente tenere tutto minuscolo per case sensitive
        $this->tableNames = 'cart_item';
    }
}
