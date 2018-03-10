<php
/**
*  Insert
**/

function Insert Cdes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO cdes() VALUES ()';
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

function Updatde Cdes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE cdes SET )';
/**
*  Delete
**/

function Delete Cdes(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Cdes(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Cdes(PDO $pdo,