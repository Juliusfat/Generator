<?php

/**
 * Description of Generateur
 *
 * @author pascal
 */
require_once '../lib/Chaine.php';

class Generateur
{

    /**
     *
     * @param type $tElements
     * @return string
     */
    public static function getTableForm($tElements)
    {
        $code = "";
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "<tr>\n";
            $code .= "<td><label>$tElements[$i]</label></td>\n";
            $code .= "<td><input type='text' name='$tElements[$i]' value='' /></td>\n";
            $code .= "</tr>\n";
        }
        return $code;
    }

    /**
     *
     * @param type $tElements
     * @return string
     */
    public static function getTableUlLi($tElements)
    {
        $code = "";
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "<ul>\n";
            $code .= "<li><label>$tElements[$i]</li></td>\n";
            $code .= "<li><input type='text' name='$tElements[$i]' value='' /></li>\n";
            $code .= "</ul>\n";
        }
        return $code;
    }

    /**
     *
     * @param type $tElements
     * @return string
     */
    public static function getDAO($classe, $tElements, $table, $tlistId)
            {
        $listId=$tlistId[0];
        $tCrud = ["Insert", "Updatde", "Delete", "SelectAllById"];
        $code = "";
        $elementSQl = "";
        $code .= "\n<php";
        for ($i = 0; $i < 4; $i++) {
            $code .= "\n/**\n";
            $code .= "*  $tCrud[$i]";
            $code .= "\n**/\n\n";
            $code .= "function $tCrud[$i] " . Chaine::snake2camel($table) . "(PDO \$pdo,";
            switch ($i) {
                case 0://Insert
                    $code .= " Array \$Data) {";
                    $code .= "\n\t\$liAffecte = 0;";
                    $code .= "\n\ttry {";
                    $code .= "\n\t\t\$lsSQL = 'INSERT INTO $table(";
                    for ($j = 0; $j < count($tElements); $j++) {
                        $elementSQl .= "$tElements[$j], ";
                    };
                    $elementSQl = substr($elementSQl, 0, -2);
                    $code .= "$elementSQl) VALUES (";
                    $elementSQl = "";
                    for ($j = 0; $j < count($tElements); $j++) {
                        $elementSQl .= "?,";
                    };
                    $elementSQl = substr($elementSQl, 0, -1);
                    $code .= "$elementSQl)';";
                    $code .= "\n\t\t\$lcmd = \$pdo->prepare(\$lsSQL);";
                    $code .= "\n\t\t\$lcmd->execute(array_values(\$tData));";
                    $code .= "\n\t\t\$liAffecte = \$lcmd->rowCount();";
                    $code .= "\n\t} catch (Exception \$e) {";
                    $code .= "\n\t\t\$liAffecte = -1;";
                    $code .= "\n\t}";
                    $code .= "\n\treturn \$liAffecte;";
                    $code .= "\n}\n";
                    break;
                case 1: //Update

                    $code .= " Array \$Data) {";
                    $code .= "\n\t\$liAffecte = 0;";
                    $code .= "\n\ttry {";
                    $code .= "\n\t\t\$lsSQL = 'UPDATE $table SET ";
                    $elementSQl = "";
                    for ($j = 0; $j < count($tElements); $j++) {
                        if($tElements[$j] !=$listId){
                        $elementSQl .= "$tElements[$j]=?, ";
                        }
                    };
                    $elementSQl = substr($elementSQl, 0, -2);
                    $code .= "$elementSQl WHERE $listId = ?';";
                    $code .= "\n\t\t\$lcmd = \$pdo->prepare(\$lsSQL);";
                    $code .= "\n\t\t\$lcmd->execute(array_values(\$tData));";
                    $code .= "\n\t\t\$liAffecte = \$lcmd->rowCount();";
                    $code .= "\n\t} catch (Exception \$e) {";
                    $code .= "\n\t\t\$liAffecte = -1;";
                    $code .= "\n\t}";
                    $code .= "\n\treturn \$liAffecte;";
                    $code .= "\n}";
                    $code .= "\n\t";
                case 2://Delete
                    $code .= " \$id) {";
                    $code .= "\n\t\$liAffecte = 0;";
                    $code .= "\n\ttry {";
                    $code .= "\n\t\t\$lsSQL = 'DELETE FROM $table WHERE $listId=?'; ";
                    $code .= "\n\t\t\$lcmd = \$pdo->prepare(\$lsSQL);";
                    $code .= "\n\t\t\$lcmd->execute(array(\$id));";
                    $code .= "\n\t\t\$liAffecte = \$lcmd->rowCount();";
                    $code .= "\n\t} catch (Exception \$e) {";
                    $code .= "\n\t\t\$liAffecte = -1;";
                    $code .= "\n\t}";
                    $code .= "\n\treturn \$liAffecte;";
                    $code .= "\n}";
                    break;

                case 3://SelectAllById

                    $code .= " \$id) {";
                    $code .= "\n\t\$lsSQL = 'SELECT * FROM $table WHERE $listId = ?';";
                    $code .= "\n\ttry {";
                    $code .= "\n\t\t\$lrs = \$pdo->prepare(\$lsSQL);";
                    $code .= "\n\t\t\$lrs->execute(array(\$id));";
                    $code .= "\n\t\t\$lrs->setFetchMode(PDO::FETCH_ASSOC);";
                    $code .= "\n\t\t\$enr = \$lrs->fetch();";
                    $code .= "\n\t} catch (Exception \$e) {";
                    $code .= "\n\t\t\$enr = \$e->getMessage();";
                    $code .= "\n\t}";
                    $code .= "\n\treturn \$enr;";
                    $code .= "\n}";
                    $code .="\n?>";
                    break;
            };
        };


        return $code;
    }

    /**
     *
     * @param type $tElements
     * @return string
     */
    public static function getDTO($classe, $tElements)
    {
        $code = "class " . Chaine::snake2camel($classe) . "{\n";
        // Les attributs
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "private $" . Chaine::snake2camel($tElements[$i], false) . ";\n";
        }
        // Le constructeur
        $code .= "public function  __construct(";
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "$" . Chaine::snake2camel($tElements[$i], false) . "='' ,";
        }
        $code = substr($code, 0, -1);
        $code .= ");\n";
        // Les getters et setters
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "public function get" . Chaine::snake2camel($tElements[$i]) . "() {\n";
            $code .= "\treturn $" . "this->" . Chaine::snake2camel($tElements[$i], false) . ";\n";
            $code .= "}\n";
        }
        for ($i = 0; $i < count($tElements); $i++) {
            $code .= "public function set" . Chaine::snake2camel($tElements[$i]) . "($" . Chaine::snake2camel($tElements[$i], false) . ") {\n";
            $code .= "\t $" . "this->" . Chaine::snake2camel($tElements[$i], false) . "= $" . Chaine::snake2camel($tElements[$i], false) . ";\n";
            $code .= "}\n";
        }

        // Fin de la classe
        $code .= "}\n";
        return $code;
    }

}
