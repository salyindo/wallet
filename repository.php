
<?php

$wallets = [];
$transactions = [];

function trouverWalletParTelephone($telephone) {
    global $wallets;
    for ($i = 0; $i < count($wallets); $i++) {
        if ($wallets[$i]["telephone"] === $telephone) {
            return $i;
        }
    }
    return -1;
}

function ajouterWallet($telephone, $nom, $solde, $code) {
    global $wallets;
    $wallets[] = [
        "telephone" => $telephone,
        "nom"       => $nom,
        "solde"     => $solde,
        "code"      => $code
    ];
}

function mettreAJourSolde($index, $nouveauSolde) {
    global $wallets;
    $wallets[$index]["solde"] = $nouveauSolde;
}

function ajouterTransaction($telephone, $type, $montant, $frais) {
    global $transactions;
    $transactions[] = [
        "telephone" => $telephone,
        "type"      => $type,
        "montant"   => $montant,
        "frais"     => $frais,
        "date"      => date("d/m/Y H:i")
    ];
}