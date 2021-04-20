<?php


require_once "bdd/DAO.php";

class ActeurController
{

    public function findOneById($id, $editActeur = false)
    {
        $dao = new DAO();

        $sql = "SELECT nom, prenom, dateNaissance, image,resume,id
            FROM acteur 
            where id = :id";

        $acteurs = $dao->executerRequete($sql, [':id' => $id]);

        $sql2 = "SELECT f.titre AS filmo, CONCAT(a.prenom,' ',a.nom) AS identite, a.id AS idActeur, r.libelle AS nomRole, f.id AS idFilmo
        FROM film f
        INNER JOIN casting c ON f.id = c.id
        INNER JOIN acteur a ON c.id_1 = a.id
        INNER JOIN role r ON c.id_2 = r.id
        WHERE a.id = :id";

        $filmographieActeur = $dao->executerRequete($sql2, [':id' => $id]);

        if (!$editActeur) {
            require "views/acteur/detailActeur.php";
        } else {
            return $acteurs;
        }
    }



    public function findAll()
    {
        $dao = new DAO();

        $sql = "SELECT nom, prenom, DATE_FORMAT(dateNaissance,'%d-%m-%Y') as DateDeNaissance,id
            FROM acteur";

        $acteur = $dao->executerRequete($sql);
        require "views/acteur/listActeurs.php";
    }

    public function addActeurForm()
    {
        require "views/acteur/ajouterActeurForm.php";
    }

    public function addActeur($array)
    {

        $dao = new DAO();


        $sql = "INSERT INTO acteur (nom, prenom, dateNaissance, resume)
        VALUES (:nom, :prenom, :dateNaissance, :resume)";
        $nom = filter_var($array['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom'], FILTER_SANITIZE_STRING);
        $dateNaissance = filter_var($array['dateNaissance'], FILTER_SANITIZE_STRING);
        $resume = filter_var($array['resume'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":nom" => $nom, ":prenom" => $prenom, ":dateNaissance" => $dateNaissance, ":resume" => $resume]);

        require "views/acteur/ajouterActeur.php";
    }
    public function modifActeurForm($id)
    {
        $acteurs = $this->findOneById($id, true);
        require "views/acteur/editActeur.php";
    }
    public function modifActeur($id, $array)
    {
        // var_dump($_FILES['uploads'], $_POST);
        // die();
        $nom = filter_var($array['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom'], FILTER_SANITIZE_STRING);
        $dateNaissance = filter_var($array['dateNaissance'], FILTER_SANITIZE_STRING);
        $resume = filter_var($array['resume'], FILTER_SANITIZE_STRING);

        $dao = new DAO();
        $sql = "UPDATE acteur
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
        require "views/acteur/modifierActeur.php";
        // header("Location: index.php?action=listActeurs");
    }
    public function deleteActeur($id)
    {

        $dao = new DAO();

        $sql = "DELETE FROM acteur
                WHERE id = :id";

        $delReal = $dao->executerRequete($sql, [':id' => $id]);

        require "views/acteur/supprimerActeur.php";
    }
}
