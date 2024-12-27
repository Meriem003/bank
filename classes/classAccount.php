<?php
class Account {
    public $id;
    public $name_user;
    public $account_type;
    public $nmr_compte;
    public $balance;
    public $Taux_intérêt;  
    public $retrait;       
    public $Frais;       

    public function __construct($name_user, $account_type, $nmr_compte, $balance, $Taux_intérêt = null, $retrait = null, $Frais = null) {
        $this->name_user = $name_user;
        $this->account_type = $account_type;
        $this->nmr_compte = $nmr_compte;
        $this->balance = $balance;
        $this->Taux_intérêt = $Taux_intérêt;
        $this->retrait = $retrait;
        $this->Frais = $Frais;
    }

    public function add() {
        global $NeoBank;
        
}
}
?>
