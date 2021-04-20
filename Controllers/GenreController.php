<?php


require_once "bdd/DAO.php";

class GenreController
{
    public function findOneById($id, $editGen = false)
    {
        $dao = new DAO();

        $sql = "SELECT libelle, descriptif, id
            FROM genre
            WHERE id = :id";

        $detailsGenre = $dao->executerRequete($sql, [':id' => $id]);

        if (!$editGen) {
            require "views/genre/detailGenre.php";
        } else {
            return $detailsGenre;
        }
    }



    public function findAll()
    {
        $dao = new DAO();

        $sql = "SELECT libelle, descriptif, id
            FROM genre";

        $gen = $dao->executerRequete($sql);
        require "views/genre/listGenres.php";
    }
    public function addGenreForm()
    {
        require "views/genre/ajouterGenreForm.php";
    }

    public function addGenre($array)
    {

        $dao = new DAO();


        $sql = "INSERT INTO genre (libelle, descriptif)
        VALUES (:libelle, :descriptif)";
        $libelle = filter_var($array['libelle'], FILTER_SANITIZE_STRING);
        $descriptif = filter_var($array['descriptif'], FILTER_SANITIZE_STRING);

        $ajout = $dao->executerRequete($sql, [":libelle" => $libelle, ":descriptif" => $descriptif]);

        require "views/genre/ajouterGenre.php";
    }
    public function modifGenreForm($id)
    {
        $detailsGenre = $this->findOneById($id, true);
        require "views/genre/editGenre.php";
    }
    public function modifGenre($id, $array)
    {
        // var_dump($_FILES['uploads'], $_POST);
        // die();
        $libelle = filter_var($array["libelle"], FILTER_SANITIZE_STRING);
        $descriptif = filter_var($array["descriptif"], FILTER_SANITIZE_STRING);

        $dao = new DAO();
        $sql = "UPDATE genre
                SET libelle = :libelle,
                descriptif = :descriptif
                WHERE id = :id";

        $dao->executerRequete($sql, [
            ":id" => $id,
            ":libelle" => $libelle,
            ":descriptif" => $descriptif,

        ]);
        require "views/genre/modifierGenre.php";
    }

    public function deleteGenre($id)
    {

        $dao = new DAO();

        $sql = "DELETE FROM genre
                WHERE id = :id";

        $delGenre = $dao->executerRequete($sql, [':id' => $id]);

        require "views/genre/supprimerGenre.php";
    }
}
