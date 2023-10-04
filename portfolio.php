<?php
// Variables et fonctions du portfolio
$projetsPortfolio = [
	[
		'couverture' => '',
		'titre' => 'Atelier La Bigorne',
		'contenu' => 'Lorem ipsum dolor sit amet.',
		'type' => 'Site internet / E-commerce',
		'lien' => '',
		'is_enabled' => true,
	],
	[
		'couverture' => '',
		'titre' => 'Association JALMALV',
		'contenu' => 'Lorem ipsum dolor sit amet.',
		'type' => 'Site internet / Intranet',
		'lien' => '',
		'is_enabled' => true,
	],
	[
		'couverture' => '',
		'titre' => '',
		'contenu' => '',
		'type' => '',
		'lien' => '',
		'is_enabled' => false,
	],
];

//Afficher ou non le projet
function isValidProjet(array $projetPortfolio) : bool
{	
    if (array_key_exists('is_enabled', $projetPortfolio)) {
        $isEnabled = $projetPortfolio['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

// Parcourir le tableau et retourner un nouveau tableau contenant uniquement les projets valides
function getProjets(array $projetsPortfolio) : array
{
    $validProjets = [];

    foreach($projetsPortfolio as $projetPortfolio) {
        if (isValidProjet($projetPortfolio)) {
            $validProjets[] = $projetPortfolio;
        }
    }

    return $validProjets;
}

$validProjets = getProjets($projetsPortfolio);

?>