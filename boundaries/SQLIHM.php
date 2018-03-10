<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title>SQLIHM</title>
</head>

<body>
<header id="header">
    <?php
    include 'partials/Header.php';
    ?>
</header>

<nav id="nav">
    <?php
    include 'partials/Nav.php';
    ?>
</nav>

<section id='centre'>
    <script src="../jquery/jquery.js"></script>
    <script src="../js/listBDs"></script>
    <h1>SQL IHM</h1>

    <section id="bds">
        <form action="../controls/SQLCTRL.php" method="get">
            <label><strong>Liste des BDs</strong></label>
            <br>
<!--            Permet le submit en js et actualise la liste des tables-->
            <select name="listeBDs" size="5" onclick="listBDs(value)">
                <?php
                $lsOptions = "";
                for ($i = 0; $i < count($tListeBDs); $i++) {
                    $lsOptions .= "<option value='$tListeBDs[$i]'>$tListeBDs[$i]</option>";
                }
                echo $lsOptions;
                ?>
            </select>
            <br>

        </form>
    </section>

    <section id="tables">
        <form action="../controls/SQLCTRL.php" method="get">
            <label><strong>Liste des tables</strong></label>
            <br>
<!--            Permet le submit en js et actualise la liste des colonnes-->
<!--            et génére le code dans le textarea-->
            <select name="listeTables" size="5" onclick="listTables(value)">
                <?php
                  $lsOptions = "";
                if (isSet($tListeTables)) {
                    for ($i = 0; $i < count($tListeTables); $i++) {
                        $lsOptions .= "<option value='$tListeTables[$i]'>$tListeTables[$i]</option>";
                    }
                }
                echo $lsOptions;
                ?>
            </select>
            <br>

        </form>
    </section>

    <section id="colonnes">
        <label><strong>Liste des colonnes </strong></label>
        <br>
        <select name="listeColonnes" size="5" >//onclick="listeId">
            <?php
            /*
             *
             */
            $lsOptions = "";
            if (isSet($tListeColonnes)) {
                for ($i = 0; $i < count($tListeColonnes); $i++) {
                    $lsOptions .= "<option value='$tListeColonnes[$i]'>$tListeColonnes[$i]</option>";
                }
            }
            echo $lsOptions;
            ?>
        </select>
    </section>

    <br class='nettoyeur'>

    <textarea cols="80" rows="15">
                <?php
//                affiche le code provenant du générateur
                echo $texte;
                ?>
            </textarea>

    <p>
        <label id='lblMessage'>
            <?php
            if (isSet($lsMessage)) {
                echo $lsMessage;
            }
            ?>
        </label>
    </p>
</section>

<footer id="footer">
    <?php
    include 'partials/Footer.php';
    ?>
</footer>
<?php ?>
</body>
</html>
