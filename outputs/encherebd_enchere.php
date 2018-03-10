<php
/**
*  Insert
**/

function Insert Enchere(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO enchere(idEnchere, idParticipant, idProduit, instant, montant) VALUES (?,?,?,?,?)';
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

function Updatde Enchere(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE enchere SET idParticipant=?,idProduit=?,instant=?,montant=?)';
/**
*  Delete
**/

function Delete Enchere(PDO $pdo,
/**
*  SelectOne
**/

function SelectOne Enchere(PDO $pdo,
/**
*  SelectAll
**/

function SelectAll Enchere(PDO $pdo,