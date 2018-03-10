<php
/**
*  Insert
**/

function Insert Produits(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO produits(designation, id_produit, photo, prix, qte_stockee) VALUES (?,?,?,?,?)';
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

function Updatde Produits(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'UPDATE produits SET designation=?, id_produit=?, photo=?, prix=?, qte_stockee=? WHERE id_produit = ?';
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
		$lsSQL = 'DELETE FROM produits WHERE id_produit=?'; 
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

function Delete Produits(PDO $pdo, $id) {
	$liAffecte = 0;
	try {
		$lsSQL = 'DELETE FROM produits WHERE id_produit=?'; 
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

function SelectAllById Produits(PDO $pdo, $id) {
	$lsSQL = 'SELECT * FROM produits WHERE id_produit = ?';
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