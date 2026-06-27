<?php

function traiterChoix($choix) {
    switch ($choix) {
        case 1: controllerCreerWallet(); break;
        case 2: controllerDepot();       break;
        case 3: echo "Bientôt disponible\n"; break;
        case 4: echo "Bientôt disponible\n"; break;
    }
}

function controllerCreerWallet() {
    echo "--- Créer un Wallet ---\n";
    echo "Téléphone : ";
    $telephone = trim(fgets(STDIN));
    echo "Nom : ";
    $nom = trim(fgets(STDIN));
    echo "Solde initial : ";
    $solde = trim(fgets(STDIN));
    echo "Code secret : ";
    $code = trim(fgets(STDIN));

    $resultat = creerWallet($telephone, $nom, $solde, $code);
    echo $resultat["message"] . "\n";
}

function controllerDepot() {
    echo "--- Faire un Dépôt ---\n";
    echo "Téléphone : ";
    $telephone = trim(fgets(STDIN));
    echo "Montant : ";
    $montant = trim(fgets(STDIN));

    $resultat = faireDepot($telephone, $montant);
    echo $resultat["message"] . "\n";
}