<php
/**
*  Insert
**/

function Insert Pays(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO pays(id_pays, nom_pays) VALUES (?,?)';
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

function Updatde Pays(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE pays SET nom_pays=? WHERE id_pays = ?';
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
		$lsSQL = 'DELETE FROM pays WHERE id_pays=?'; 
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

function Delete Pays(PDO $pdo, $id) {
	$liAffecte = 0;
	try {
		$lsSQL = 'DELETE FROM pays WHERE id_pays=?'; 
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

function SelectAllById Pays(PDO $pdo, $id) {
	$lsSQL = 'SELECT * FROM pays WHERE id_pays = ?';
	try {
		$lrs = $pdo->prepare($lsSQL);
		$lrs->execute(array($id));
		$lrs->setFetchMode(PDO::FETCH_ASSOC);
		$enr = $lrs->fetch();
	} catch (Exception $e) {
		$enr = $e->getMessage();
	}
	return $enr;
}?>