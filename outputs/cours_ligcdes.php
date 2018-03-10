
<php
/**
*  Insert
**/

function Insert Ligcdes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO ligcdes(id_cde, id_produit, qte) VALUES (?,?,?)';
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

function Updatde Ligcdes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE ligcdes SET id_produit=?, qte=? WHERE id_cde = ?';
		$lcmd = $pdo->prepare($lsSQL);
		$lcmd->execute(array_values($tData));
		$liAffecte = $lcmd->rowCount();
	} catch (Exception $e) {
		$liAffecte = -1;
	}
	return $liAffecte;
}
	 $id) {
	$liAffecte = 0;
	try {
		$lsSQL = 'DELETE FROM ligcdes WHERE id_cde=?'; 
		$lcmd = $pdo->prepare($lsSQL);
		$lcmd->execute(array($id));
		$liAffecte = $lcmd->rowCount();
	} catch (Exception $e) {
		$liAffecte = -1;
	}
	return $liAffecte;
}
/**
*  Delete
**/

function Delete Ligcdes(PDO $pdo, $id) {
	$liAffecte = 0;
	try {
		$lsSQL = 'DELETE FROM ligcdes WHERE id_cde=?'; 
		$lcmd = $pdo->prepare($lsSQL);
		$lcmd->execute(array($id));
		$liAffecte = $lcmd->rowCount();
	} catch (Exception $e) {
		$liAffecte = -1;
	}
	return $liAffecte;
}
/**
*  SelectAllById
**/

function SelectAllById Ligcdes(PDO $pdo, $id) {
	$lsSQL = 'SELECT * FROM ligcdes WHERE id_cde = ?';
	try {
		$lrs = $pdo->prepare($lsSQL);
		$lrs->execute(array($id));
		$lrs->setFetchMode(PDO::FETCH_ASSOC);
		$enr = $lrs->fetch();
	} catch (Exception $e) {
		$enr = $e->getMessage();
	}
	return $enr;
}
?>