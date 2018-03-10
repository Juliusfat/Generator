<php
/**
*  Insert
**/

function Insert Ventes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO ventes(date_vente, id_produit, id_vendeur, vente) VALUES (?,?,?,?)';
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

function Updatde Ventes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE ventes SET id_produit=?,id_vendeur=?,vente=?)';
/**
*  Delete
**/

function Delete Ventes(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Ventes(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Ventes(PDO $pdo,