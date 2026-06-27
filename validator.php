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
    $resultat = array_filter($wallets, fn($w) => $w["code"] === $code);
    return count($resultat) === 0;
}
function soldeInitialValide($solde) {
    return is_numeric($solde) && $solde >= 0;
}

function montantPositif($montant) {
    return is_numeric($montant) && $montant > 0;
}