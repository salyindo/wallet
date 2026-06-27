<?php

function calculerFrais($montant) {
    if ($montant <= 10000) {
        return 200;
    } elseif ($montant <= 100000) {
        return 500;
    } else {
        $frais = $montant * 0.01;
        if ($frais > 5000) {
            return 5000;
        }
        return $frais;
    }
}

function creerWallet($telephone, $nom, $solde, $code) {
    if (empty($telephone) || empty($nom) || empty($code)) {
        return ["succes" => false, "message" => "Champs obligatoires manquants"];
    }
    if (!soldeInitialValide($solde)) {
        return ["succes" => false, "message" => "Solde initial invalide"];
    }
    if (!telephoneUnique($telephone)) {
        return ["succes" => false, "message" => "Téléphone déjà utilisé"];
    }
    if (!codeUnique($code)) {
        return ["succes" => false, "message" => "Code déjà utilisé"];
    }
    ajouterWallet($telephone, $nom, $solde, $code);
    return ["succes" => true, "message" => "Wallet créé avec succès !"];
}

function faireDepot($telephone, $montant) {
    if (!telephoneExiste($telephone)) {
        return ["succes" => false, "message" => "Téléphone introuvable"];
    }
    if (!montantPositif($montant)) {
        return ["succes" => false, "message" => "Montant invalide"];
    }
    global $wallets;
    $index = trouverWalletParTelephone($telephone);
    $nouveauSolde = $wallets[$index]["solde"] + $montant;
    mettreAJourSolde($index, $nouveauSolde);
    ajouterTransaction($telephone, "depot", $montant, 0);
    return ["succes" => true, "message" => "Dépôt effectué. Nouveau solde : $nouveauSolde CFA"];
}