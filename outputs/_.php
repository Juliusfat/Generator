<php
/**
*  Insert
**/

function Insert (PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO () VALUES ()';
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

function Updatde (PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE  SET )';
/**
*  Delete
**/

function Delete (PDO $pdo,
/**
*  SelectOne
**/

function SelectOne (PDO $pdo,
/**
*  SelectAll
**/

function SelectAll (PDO $pdo,