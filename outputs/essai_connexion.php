<php
/**
*  Insert
**/

function Insert Connexion(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO connexion(id, mail, motDePasse) VALUES (?,?,?)';
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

function Updatde Connexion(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE connexion SET mail=?,motDePasse=?)';
/**
*  Delete
**/

function Delete Connexion(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Connexion(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Connexion(PDO $pdo,