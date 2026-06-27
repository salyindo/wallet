<?php

function telephoneExiste($telephone) {
    $index = trouverWalletParTelephone($telephone);
    return $index !== -1;
}

function telephoneUnique($telephone) {
    return !telephoneExiste($telephone);
}

function codeUnique($code) {
    global $wallets;
    for ($i = 0; $i < count($wallets); $i++) {
        if ($wallets[$i]["code"] === $code) {
            return false;
        }
    }
    return true;
}

function soldeInitialValide($solde) {
    return is_numeric($solde) && $solde >= 0;
}

function montantPositif($montant) {
    return is_numeric($montant) && $montant > 0;
}