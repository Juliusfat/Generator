<php
/**
*  Insert
**/

function Insert Clients(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO clients() VALUES ()';
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

function Updatde Clients(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE clients SET )';
/**
*  Delete
**/

function Delete Clients(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Clients(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Clients(PDO $pdo,