<?php

function traiterChoix($choix) {
    switch ($choix) {
        case 1: controllerCreerWallet(); break;
        case 2: controllerDepot();       break;
        case 3: controllerRetrait(); break;
        case 4: controllerTransactions(); break;    }
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



function controllerRetrait() {
    echo "--- Faire un Retrait ---\n";
    echo "Téléphone : ";
    $telephone = trim(fgets(STDIN));
    echo "Montant : ";
    $montant = trim(fgets(STDIN));

    $resultat = faireRetrait($telephone, $montant);
    echo $resultat["message"] . "\n";
}


function controllerTransactions() {
    echo "--- Lister les Transactions ---\n";
    echo "Téléphone (laisser vide pour tout voir) : ";
    $telephone = trim(fgets(STDIN));

    if (empty($telephone)) {
        $transactions = listerTransactions();
    } else {
        $transactions = listerTransactions($telephone);
    }

    if (count($transactions) === 0) {
        echo "Aucune transaction trouvée\n";
        return;
    }

    for ($i = 0; $i < count($transactions); $i++) {
        $t = $transactions[$i];
        echo "[{$t['date']}] {$t['telephone']} | {$t['type']} | {$t['montant']} CFA | Frais: {$t['frais']} CFA\n";
    }
}