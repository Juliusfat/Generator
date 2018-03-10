<php
/**
*  Insert
**/

function Insert Categorie(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO categorie() VALUES ()';
		$lcmd = $pdo->prepare($lsSQL);
		$lcmd->execute(array_values($tData));
		$liAffecte = $lcmd->rowCount();
	} catch (Exception $e) {
		$liAffecte = -1;
	}
	return $liAffecte;
}

/**
*  Updatde
**/

function Updatde Categorie(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE categorie SET )';
/**
*  Delete
**/

function Delete Categorie(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Categorie(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Categorie(PDO $pdo,