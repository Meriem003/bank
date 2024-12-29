<?php
include_once './config.php';

class Account {
    public $id;
    public $titulaire; 
    public $soldeInit;
    public $pdo;

    public function __construct($titulaire, $soldeInit, $pdo) {
        $this->titulaire = $titulaire;
        $this->soldeInit = $soldeInit;
        $this->pdo = $pdo;
    }

    public function créer ($type, $valeur): void {
        $sql = "INSERT INTO account (titulaire, soldeInit) VALUES (:titulaire, :soldeInit)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ ':titulaire' => $this->titulaire, ':soldeInit' => $this->soldeInit ]);

        $id = $this->pdo->lastInsertId();
        switch ($type) {  
            case 'SavingAccount':
                $rqt = "INSERT INTO savingaccount (minimumSolde, accountNum) VALUES (:minimumSolde, :accountNum)";
                break;
        
            case 'CURRENTAccount':
                $rqt = "INSERT INTO currentaccount (sommeLimit, accountNum) VALUES (:sommeLimit, :accountNum)";
                break;
        
            case 'businessAccount':
                $rqt = "INSERT INTO businessaccount (limitCredit, accountNum) VALUES (:limitCredit, :accountNum)";
                break;
        
            default:
                echo "Type de compte invalide : $type";
                return;
        }
        $stmt = $this->pdo->prepare($rqt);
        
        if ($type == 'SavingAccount') {
            $stmt->execute([ ':minimumSolde' => $valeur, ':accountNum' => $id ]);
        } elseif ($type == 'CURRENTAccount') {
            $stmt->execute([ ':sommeLimit' => $valeur, ':accountNum' => $id ]);
        } elseif ($type == 'businessAccount') {
            $stmt->execute([ ':limitCredit' => $valeur, ':accountNum' => $id ]);
        }
        echo "Account successfully created.";
    }
    public function readAllAccounts() {
        $sql = "
            SELECT a.id, a.titulaire, a.soldeInit, 
                sa.minimumSolde, 
                ca.sommeLimit, 
                ba.limitCredit
            FROM account a
            LEFT JOIN savingaccount sa 
            ON a.id = sa.accountNum
            LEFT JOIN currentaccount ca 
            ON a.id = ca.accountNum
            LEFT JOIN businessaccount ba 
            ON a.id = ba.accountNum";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    
        $accounts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $accounts[] = $row; 
        }
        return $accounts;
    }
    public function delete($id) {
        try {
            $sql = "DELETE FROM savingaccount WHERE accountNum = :accountNum";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':accountNum' => $id]);
    
            $sql = "DELETE FROM currentaccount WHERE accountNum = :accountNum";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':accountNum' => $id]);
    
            $sql = "DELETE FROM businessaccount WHERE accountNum = :accountNum";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':accountNum' => $id]);
    
            $sql = "DELETE FROM account WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
    
            echo "Account with ID $id has been deleted successfully.";
        } catch (PDOException $e) {
            echo "Error deleting account: " . $e->getMessage();
        }
    }    
}
?>
