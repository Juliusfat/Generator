<php
/**
*  Insert
**/

function Insert Stagiaire(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO stagiaire(Niveau, Personne_idPersonne) VALUES (?,?)';
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

function Updatde Stagiaire(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE stagiaire SET Personne_idPersonne=?)';
/**
*  Delete
**/

function Delete Stagiaire(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Stagiaire(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Stagiaire(PDO $pdo,