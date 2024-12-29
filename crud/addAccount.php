<?php
if (isset($_POST["envoyer"])) {
    $titulaire = $_POST["name"];
    $solde = $_POST["balance"];
    $type = $_POST["compte"];

    $valeur = null;
    if ($type == 'SavingAccount') {
        $valeur = $_POST["minimumBalance"];
    } elseif ($type == 'CURRENTAccount') {
        $valeur = $_POST["withdrawalLimit"];
    } elseif ($type == 'businessAccount') {
        $valeur = $_POST["creditLimit"];
    }

    $compte = new Account($titulaire, $solde, $pdo);
    $compte->créer ($type, $valeur);
}