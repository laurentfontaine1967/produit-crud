<?php
// FONCTION ENREGISTRER
//************************************************* */
// La fonction prend en entree un array  $infoFichier
// Elle retourne une string 



function enregistrerFichierEnvoye(array $infoFichier): string
{

//definition des variables:
// $timestamp recupere la valeur au format chaine de la varaible time.
// $extension :retourne ls infos sur le chemin
// $nomDuFichier :concatenation des 2 premieres variables et produit 
    $timestamp = strval(time());
    $extension = pathinfo(basename($infoFichier["name"]), PATHINFO_EXTENSION);
    $nomDuFichier = 'produit_' . $timestamp . '.' . $extension;
    $dossierStockage = __DIR__ . '/uploads/';

    // Vérifie si $dossierStockage  existe. si n'existe pas 
    if (file_exists($dossierStockage) === false)
    {
        // alors creer  $dossierStockage
        mkdir($dossierStockage);
    }

    // deplace le fichier 
    move_uploaded_file($infoFichier["tmp_name"], $dossierStockage . $nomDuFichier);

    //retourne la concatenation de '/upload/' et $nomDuFichier
    return '/uploads/' . $nomDuFichier;
}


//FONCTION ON VA REDIRIGER
//************************************************* */
// prend en entre une chaine 
function onVaRediriger(string $path)
{
    //renvoie une entete http
    header('LOCATION:/produit-crud/router.php' . $path); 
    //exit 
    die();
}