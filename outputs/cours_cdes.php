
<php
/**
*  Insert
**/

function Insert Cdes(PDO $pdo, Array $Data) {
	$liAffecte = 0;
	try {
		$lsSQL = 'INSERT INTO cdes(date_cde, id_cde, id_client) VALUES (?,?,?)';
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
		$lsSQL = 'UPDATE cdes SET date_cde=?, id_client=? WHERE id_cde = ?';
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
		$lsSQL = 'DELETE FROM cdes WHERE id_cde=?'; 
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

function Delete Cdes(PDO $pdo, $id) {
	$liAffecte = 0;
	try {
		$lsSQL = 'DELETE FROM cdes WHERE id_cde=?'; 
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

function SelectAllById Cdes(PDO $pdo, $id) {
	$lsSQL = 'SELECT * FROM cdes WHERE id_cde = ?';
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