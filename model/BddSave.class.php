<?php

/**
 * Systeme de sauvegarde automatique BDD
 * il faut l'executer avec le cron. 
 *
 * @author Manda
 * @version 1.1
 */
class BddSave extends _SQL {

    public function dumpMySQL() {
        $mode = 3;
        $db = $this->connexion(); //rechercher l'objet PDO.

        $entete = "-- ----------------------\n";
        $entete .= "-- dump de la base " . DATABASE . " au " . date("d-M-Y") . "\n";
        $entete .= "-- ----------------------\n\n\n";
        $creations = "";
        $insertions = "\n\n";

        $req = "SHOW TABLES FROM " . DATABASE . "";
        $listeTables = $db->query($req);
        while ($table = $listeTables->fetch()) {
            // si l'utilisateur a demandé la structure ou la totale
            if ($mode == 1 || $mode == 3) {
                $creations .= "-- -----------------------------\n";
                $creations .= "-- creation de la table " . $table[0] . "\n";
                $creations .= "-- -----------------------------\n";
                $req2 = "show create table " . $table[0];
                $listeCreationsTables = $db->query($req2);
                while ($creationTable = $listeCreationsTables->fetch(PDO::FETCH_ASSOC)) {
                    $creations .= $creationTable["Create Table"] . ";\n\n";
                }
            }
            # si l'utilisateur veux les inserts
            if ($mode > 1) {
                // var_dump($table[0]);
                $req3 = "SELECT * FROM " . $table[0];
                $donnees = $db->query($req3);
                $insertions .= "-- -----------------------------\n";
                $insertions .= "-- insertions dans la table " . $table[0] . "\n";
                $insertions .= "-- -----------------------------\n";
                $nuplet = $donnees->fetchAll();
                $colcount = $donnees->columnCount();
                $insertions .= "INSERT INTO " . $table[0] . "(";
                for ($i = 0; $i < $colcount; $i++) {
                    $TypeDeChamps = $donnees->getColumnMeta($i);
                    $champs = "";
                    if ($TypeDeChamps != false) {
                        if ($i != 0) {
                            $insertions .= ", ";
                        }
                        $champs .="`" . $TypeDeChamps['name'] . "`";
                        $insertions .= $champs;
                    }
                }

                $insertions .=") VALUES";
                foreach ($nuplet as $recup => $list) {
                    $insertions .="(";
                    for ($u = 0; $u <= $colcount; $u++) {
                        if ($u != 0 && isset($list[$u]) && !empty($list[$u])) {
                            $insertions .= ", ";
                        }

                        if (isset($list[$u]) && !empty($list[$u])) {
                            $insertions .="`" . $list[$u] . "`";
                        }
                    }

                    if ($recup != (count($nuplet) - 1)) {
                        $virgule = "),";
                    } else {
                        $virgule = ");";
                    }
                    $insertions .= $virgule;
                }


                $insertions .= "\n";
            }

            $fichierDump = fopen("BDD " . DATABASE . " le " . date("d-M-Y h-i-s") . ".sql", "wb");
            fwrite($fichierDump, $entete);
            fwrite($fichierDump, $creations);
            fwrite($fichierDump, $insertions);
            fclose($fichierDump);
        }
    }
}