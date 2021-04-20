<?php


require_once "bdd/DAO.php";

class FilmController
{



    public function findAll()
    {
        $dao = new DAO();

        $sql = "SELECT f.titre,DATE_FORMAT(f.anneeSortie,'%Y') as sortie, f.id_1, CONCAT(r.prenom,' ',r.nom) AS nom, f.id
            FROM film f
            JOIN realisateur r
            ON f.id_1 = r.id";

        $films = $dao->executerRequete($sql);
        require "views/film/listFilms.php";
    }

    public function findOneById($id)
    {
        $dao = new DAO();


        $sql = "SELECT f.id, f.titre,DATE_FORMAT(f.anneeSortie,'%Y') as sortie, f.id_1,f.resume, f.image,g.libelle as libelle, g.id
        -- , a.prenom, a.nom
        FROM film f 
        LEFT JOIN classifie c ON  c.id = f.id
        LEFT JOIN genre g ON c.id_1 = g.id
        WHERE f.id = :id";


        $detailsDuFilm = $dao->executerRequete($sql, [':id' => $id]);



        $sql2 = "SELECT  CONCAT(a.prenom,' ',a.nom) AS identite, r.libelle AS nomRole, a.id AS idActeur, r.id AS idRole
         FROM acteur a
         INNER JOIN casting c ON a.id = c.id_1 
         INNER JOIN role r ON r.id = c.id_2
         INNER JOIN film f ON f.id = c.id
         WHERE f.id = :id";

        $castingFilm = $dao->executerRequete($sql2, [':id' => $id]);

        $sql3 = "SELECT g.libelle AS nomGenre, g.id AS idGenre
            FROM genre g
            INNER JOIN classifie cl ON cl.id_1 = g.id
            INNER JOIN film f ON f.id = cl.id
            WHERE f.id = :id";

        $classifieFilm = $dao->executerRequete($sql3, [':id' => $id]);

        require "views/film/detailFilm.php";
    }
    public function addFilmForm()
    {
        $dao = new DAO();
        $sql1 = "SELECT DISTINCT CONCAT(r.prenom,' ',r.nom) AS nomReal, r.id AS idReal FROM realisateur r";
        $sql2 = "SELECT g.id AS idGenre, g.libelle AS nomGenre FROM genre g";
        $listeRealisateurs = $dao->executerRequete($sql1);
        $listeGenres = $dao->executerRequete($sql2);

        require "views/film/ajouterFilmForm.php";
    }

    public function addFilm($array)
    {
$dao = new DAO();
$sql = "INSERT INTO film(titre, anneeSortie,duree, note, resume,id_1)
VALUES (:titre, :sortie, :duree, :note, :resume, :idR)";

$titre_film = filter_var ($array['titre_du_film'], FILTER_SANITIZE_STRING);
$sortie_film = filter_var ($array['sortie_du_film'], FILTER_SANITIZE_STRING);
$duree_film = filter_var ($array['duree_du_film'], FILTER_SANITIZE_STRING);
$note_film = filter_var ($array['note_du_film'], FILTER_SANITIZE_STRING);
$resume_film = filter_var ($array['resume_du_film'], FILTER_SANITIZE_STRING);
$realisateur_film = filter_var ($array['realisateur_du_film'], FILTER_SANITIZE_STRING);

$add = $dao->executerRequete($sql, [":titre" => $titre_film, ":sortie" => $sortie_film, ":duree" => $duree_film, ":note" => $note_film, ":resume" => $resume_film, ":idR" => $realisateur_film]);

$dernierID = $dao->getBdd()->lastInsertID();

$sql2 = "INSERT INTO classifie(id, id_1)
VALUES (:idFilm, :idGenre)";

$genreFilm = filter_var_array($array['genreF'], FILTER_SANITIZE_STRING);

foreach ($genreFilm as $genreActuel){
    $addGenre = $dao->executerRequete($sql2, ["idFilm" => $dernierID , ":idGenre" => $genreActuel]);
}
require "views/film/ajouterFilm.php";
    }
    public function editFilmForm($id){

        $dao = new DAO();

        $sql1 = ('SELECT id, titre, anneeSortie, duree, resume,note, id_1
                FROM film 
                WHERE id = :id');

        $edit1 = $dao->executerRequete($sql1, [":id" => $id]) ;      

        
        $sql2 = ('SELECT id, id_1 FROM classifie WHERE id = :id');

        $edit2 = $dao->executerRequete($sql2, [":id" => $id]) ;  
        
        $sql3 = ("SELECT id, libelle FROM genre");

        $edit3  = $dao->executerRequete($sql3);

        $sql4 = ("SELECT DISTINCT (CONCAT(prenom,' ',nom)) AS 'RealNom', id FROM realisateur");

        $edit4  = $dao->executerRequete($sql4);

        require "views/film/modifierFilmFormulaire.php";
    }
    


    public function editFilm($id, $array){

        $titre_film = filter_var ($array["titre_du_film"], FILTER_SANITIZE_STRING);
        $sortie_film = filter_var ($array["sortie_du_film"], FILTER_SANITIZE_STRING);
        $duree_film = filter_var ($array["duree_du_film"], FILTER_SANITIZE_STRING);
        $note_film = filter_var ($array["note_du_film"], FILTER_SANITIZE_STRING);
        $resume = filter_var ($array["resume"], FILTER_SANITIZE_STRING);
        $realisateur_film = filter_var ($array["realisateur"], FILTER_SANITIZE_STRING);
        $genref = filter_var_array($array["genref"], FILTER_SANITIZE_STRING);


        $dao = new DAO();

        $sql = "UPDATE  film
                SET titre = :titre_film,
                anneeSortie= :annee_sortie,
                duree = :duree_film,
                note = :note_film,
                resume= :resume,
                id_1= :realisateur
                WHERE id = :id";

        $dao->executerRequete($sql,[
            ":id" => $id,
            ":titre_film" => $titre_film,
            ":annee_sortie" => $sortie_film,
            ":duree_film" => $duree_film,
            ":note_film" => $note_film,
            ":resume"=>  $resume,
            ":realisateur" =>$realisateur_film
            ]);

        $sql2 = "DELETE FROM classifie
        WHERE id = :id";
        $delete = $dao->executerRequete($sql2, [":id" => $id]);

        //On supprime tous les genres du films en questions pour les remettre ensuite

        $sql3 = "INSERT INTO classifie(id, id_1)
        VALUES (:idFilm, :idGenre)";

        foreach ($genref as $genreActuel){
            $genreActuel2 = filter_var($genreActuel, FILTER_SANITIZE_STRING);
            $addGenre = $dao->executerRequete($sql3 , [":idGenre"=> $genreActuel2, ":idFilm"=>$id]);
        
        }

           require "views/film/modifierFilm.php";
    }

    public function deleteFilmById($id){


        $dao = new DAO();
        $sql = "DELETE FROM casting
        WHERE id = :id";
        $sql2 = "DELETE FROM classifie
        WHERE id = :id";
        $sql3 ="DELETE FROM film
        WHERE id = :id";

        $supp = $dao->executerRequete($sql, [":id" => $id]);
        $supp = $dao->executerRequete($sql2, [":id" => $id]);
        $supp = $dao->executerRequete($sql3, [":id" => $id]);

        require "views/film/supprimerFilm.php";
    }

}
