<?php
class User  extends DBObject{

    public $id_klienta;
    public $imie;
    public $nazwisko;
    public $login;
    public $haslo;
    public $id_zamowienia;
    public $id_pracownika;
    public $pesel;
    public $email;
    public $result = array();


    protected static $table = 'klient';
	protected static $table_ = 'pracownik';

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    function create()
    {
            $this->data = array(
            'imie' => $this->imie,
            'nazwisko'  => $this->nazwisko,
            'login' => $this->login,
            'haslo' => $this->haslo,
            'email' => $this->email
        );
       // $stm2 = $this->db->query("INSERT INTO ".static::$table."(imie, nazwisko, login, haslo, email) VALUES('" . $this->imie . 
         //   "', '" . $this->nazwisko . "', '" . $this->login . "', '" . $this->haslo . "', '" . $this->email . "')");
            
        
        $stm = $this->db->count("select * from ".static::$table." where email = '$this->email'");                    
        if($stm === 0)
        {
            if(self::store($this->db,$this->data))  
            {          
                echo "registered";
            }
        }
        else
        {
            echo "istnieje";
        }

    }

    function login()
    {
        $pass = md5($this->haslo);

        $stm2 = $this->db->query("select * from ".static::$table." where email = '$this->email' and haslo = '$pass'");
        $stm = $this->db->count("select * from ".static::$table." where email = '$this->email' and haslo = '$pass'");
        
        // Jeżeli udało się prawidłowo zalogowac użytkonika pobieram jego wszystkie szczegóły w celu ustawienia w sesji jego id który będzie wykorzystywany przy zamówieniach
        $stm3 = $this->db->query("select * from ".static::$table." where email = '$this->email' and haslo = '$pass'");
        $this->result = $stm;
  
        if($stm == 1) // klient
        {
            $klient = $stm3->fetch();
            $_SESSION['user']=$this->email;
            $_SESSION['id_klienta']=$klient['id_klienta'];
            $_SESSION['login']='yes';
			echo(1);
        }
		else //pracownik
		{
			$stm2 = $this->db->query("select * from ".static::$table_." where email = '$this->email' and haslo = '$this->haslo'");
			$stm = $this->db->count("select * from ".static::$table_." where email = '$this->email' and haslo = '$this->haslo'");
			$this->result = $stm;
			if($stm == 1) 
			{
				$_SESSION['user']=$this->email;
				$_SESSION['login']='yes';
				$_SESSION['pracownik'] = true;
				$_SESSION['main'] = false;
				echo(1);
			}
		}
    }

}