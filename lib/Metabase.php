<?php

class Metabase {
    /*
     * Metabase.php
     * 
     */

    /**
     * 
     * Renvoie un tableau : la liste des BDs d'un serveur
     * 
     * @param type $pcnx
     * @return type
     */
    public static function getBDsFromServeur($pcnx) {
        //$lsSelect = "SELECT SCHEMA_NAME FROM information_schema.schemata ORDER BY SCHEMA_NAME";
        $lsSelect = "SELECT DISTINCT SCHEMA_NAME ";
        $lsSelect .= " FROM information_schema.SCHEMATA ";
        $lsSelect .= " WHERE SCHEMA_NAME NOT IN ('mysql','information_schema','test','performance_schema','phpmyadmin')  ";
        $lsSelect .= " ORDER BY SCHEMA_NAME ";


        return self::getTableau1DFromSelect($pcnx, $lsSelect);
    }
    /**
     * 
     * Renvoie un tableau : la liste des tables d'une BD
     * 
     * @param PDO $pcnx
     * @param type $psBD
     * @return type
     */
    public static function getTablesFromBD(PDO $pcnx, $psBD) {
        //$lsSelect = "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA='$psBD' ORDER BY TABLE_NAME";
        $lsSelect = "SELECT DISTINCT TABLE_NAME ";
        $lsSelect .= " FROM information_schema.TABLES ";
        $lsSelect .= " WHERE TABLE_SCHEMA='$psBD' ";
        $lsSelect .= " ORDER BY TABLE_NAME";
        return self::getTableau1DFromSelect($pcnx, $lsSelect);
    }

    /**
     * 
     * Renvoie un tableau : la liste des colonnes d'une table
     * 
     * @param PDO $pcnx
     * @param type $psBD
     * @param type $psTable
     * @return type
     */
    public static function getColumnsNamesFromTable(PDO $pcnx, $psBD, $psTable) {
        //$lsSelect = "SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='$psBD' AND TABLE_NAME='$psTable' ORDER BY COLUMN_NAME";
        $lsSelect = "SELECT COLUMN_NAME ";
        $lsSelect .= " FROM information_schema.COLUMNS ";
        $lsSelect .= " WHERE TABLE_SCHEMA='$psBD' AND TABLE_NAME='$psTable' ";
        $lsSelect .= " ORDER BY COLUMN_NAME ";
        return self::getTableau1DFromSelect($pcnx, $lsSelect);
    }

    /**
     *
     * Renvoie un tableau : la liste des colonnes formant la PK d'une table clé Primaire
     *
     * @param type $pcnx
     * @param type $psBD
     * @param type $psTable
     * @return type
     */
    public static function getColumnsNamesPKFromTable($pcnx, $psBD, $psTable) {
        $lsSelect = "";
        $lsSelect .= "SELECT COLUMN_NAME ";
        $lsSelect .= " FROM information_schema.columns ";
        $lsSelect .= " WHERE TABLE_SCHEMA='$psBD' AND TABLE_NAME='$psTable' AND COLUMN_KEY='PRI' ";
        $lsSelect .= " ORDER BY COLUMN_NAME";

        return self::getTableau1DFromSelect($pcnx, $lsSelect);
    }

    /**
     * 
     * Renvoie un tableau : la liste des colonnes formant la FK
     *
     * @param type $pcnx
     * @param type $psBD
     * @param type $psTable
     * @return type
     */
    public static function getColumnsNamesFKFromTable($pcnx, $psBD, $psTable) {

        /*
          SELECT COLUMN_NAME
          FROM KEY_COLUMN_USAGE
          WHERE TABLE_SCHEMA = 'cours'
          AND TABLE_NAME = 'contributeur'
          AND REFERENCED_TABLE_NAME IS NOT NULL;
         */

        $lsSelect = "SELECT COLUMN_NAME ";
        $lsSelect .= " FROM information_schema.KEY_COLUMN_USAGE ";
        $lsSelect .= " WHERE TABLE_SCHEMA = '$psBD' ";
        $lsSelect .= " AND TABLE_NAME = '$psTable' ";
        $lsSelect .= "AND information_schema.tables IS NOT NULL ";

        return self::getTableau1DFromSelect($pcnx, $lsSelect);
    }

    /**
     * 
     * @param type $pcnx
     * @param type $psSelect
     * @return array
     */
    public static function getTableau1DFromSelect($pcnx, $psSelect) {
        $t1D = array();
        $lrs = null;
        try {
            $lrs = $pcnx->prepare($psSelect);
            $lrs->execute();
            $lrs->setFetchMode(PDO::FETCH_NUM);
            foreach ($lrs as $enr) {
                array_push($t1D, $enr[0]);
            }
            $lrs->closeCursor();
        } catch (PDOException $e) {
            $lrs = null;
            array_push($t1D, $e->getMessage());
        }
        return $t1D;
    }

}

?>
