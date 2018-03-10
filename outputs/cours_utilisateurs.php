<php
/**
*  Insert
**/

function Insert Utilisateurs(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO utilisateurs(email, mdp, pseudo, qualite) VALUES (?,?,?,?)';
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

function Updatde Utilisateurs(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE utilisateurs SET mdp=?,pseudo=?,qualite=?)';
/**
*  Delete
**/

function Delete Utilisateurs(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Utilisateurs(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Utilisateurs(PDO $pdo,