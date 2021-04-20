<?php


require_once "bdd/DAO.php";

class RealisateurController
{

    public function findOneById($id, $edit = false)
    {
        $dao = new DAO();
        // je fais attention a ma requête et avec les concat et autre car ce que je select je vais en avoir besoin plus bas
        // (ex: si je concat le nom et prenom et que je lui donne un nouveau nom(identite pour l'exemple)et bien il faut que 
        // je rajoute aussi nom et prenom seul pour pouvoir les rappeller dans d'autres fonction)ci-dessous c'est avec le date format
        $sql = "SELECT nom, prenom, DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS nele, image, resume, id, dateNaissance
            FROM realisateur r
            where id = :id";

        $real = $dao->executerRequete($sql, [':id' => $id]);

        // var_dump($edit, $real); // controle du script 
        // die(); //avec arret pour visualiser les infos clairement
        $sql2 = "SELECT f.titre AS filmo, CONCAT(r.prenom,' ',r.nom) AS identite, r.id AS idReal, f.id AS idFilm
        FROM film f
        INNER JOIN realisateur r ON f.id_1 = r.id
        WHERE r.id = :id";

        $filmographieReal = $dao->executerRequete($sql2, [':id' => $id]);


        // comme j'utilise la même fonction il faut que lui dise quand utiliser telle ou telle chose dans mon code
        if (!$edit) { // ici je lui dis que si ce n'est pas égal à false(j'ai instencié $edit=false par defaut au dessus) alors je fais çà!
            require "views/realisateur/detailReal.php";
        } else { // sinon je renvois à ma variable et j'éxécute ma requête
            return $real;
        }
    }

    public function deleteReal($id)
    {

        $dao = new DAO();

        $sql = "DELETE FROM realisateur
                WHERE id = :id";

        $delReal = $dao->executerRequete($sql, [':id' => $id]);

        require "views/realisateur/supprimerReal.php";
    }
    // public function deleteReal($id)
    // {
    //     $dao = $this->dao;
    //     $query ="DELETE FROM realisateur where id = :id";
    //     $req = $dao->prepare($query);
    //     $req->executeRequete();

    //     require"views/realisateur/supprimerReal.php";
    // }



    public function findAll()
    {
        $dao = new DAO();

        $sql = "SELECT nom, prenom,DATE_FORMAT(dateNaissance,'%d-%m-%Y') as DateDeNaissance, id
            FROM realisateur";

        $realisateur = $dao->executerRequete($sql);
        // $real = $dao->executerRequete($sql);
        require "views/realisateur/listReal.php";
    }

    public function addRealForm()
    {
        require "views/realisateur/ajouterRealForm.php";
    }

    public function addReal($array)
    {

        $dao = new DAO();


        $sql = "INSERT INTO realisateur (nom, prenom, dateNaissance, resume)
        VALUES (:nom, :prenom, :dateNaissance, :resume)";
        $nom = filter_var($array['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom'], FILTER_SANITIZE_STRING);
        $dateNaissance = filter_var($array['dateNaissance'], FILTER_SANITIZE_STRING);
        $resume = filter_var($array['resume'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":nom" => $nom, ":prenom" => $prenom, ":dateNaissance" => $dateNaissance, ":resume" => $resume]);

        require "views/realisateur/ajouterRealisateur.php";
    }

    public function modifRealForm($id)
    {
        $real = $this->findOneById($id, true);
        require "views/realisateur/editReal.php";
    }
    public function modifReal($id, $array)
    {
        // var_dump($_FILES['uploads'], $_POST);
        // die();
        $nom = filter_var($array['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom'], FILTER_SANITIZE_STRING);
        $dateNaissance = filter_var($array['dateNaissance'], FILTER_SANITIZE_STRING);
        $resume = filter_var($array['resume'], FILTER_SANITIZE_STRING);

        $dao = new DAO();
        $sql = "UPDATE realisateur
            SET nom = :nom,
                prenom = :prenom,
                dateNaissance = :dateNaissance,
                resume = :resume
                WHERE id = :id";

        $dao->executerRequete($sql, [
            ":id" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":dateNaissance" => $dateNaissance,
            ":resume" => $resume,

        ]);
        require "views/realisateur/modifierRealisateur.php";

        // header("Location: index.php?action=listReal");
    }
}
