function listBDs(nomBD) {
    //evite l'action d'un bouton valider sur la liste des BDs
    window.location = "../controls/SQLCTRL.php?listeBDs=" + nomBD + "&action=selectionBDValidee";
    console.log(nomBD)
}
function listTables(nomTable) {
    //evite l'action d'un bouton valider sur la liste des Tables
    window.location = "../controls/SQLCTRL.php?listeTables=" + nomTable + "&action=selectionTableValidee";
    console.log(nomTable)
}
