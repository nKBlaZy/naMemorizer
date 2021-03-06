<?php
session_start();


        //CONNEXION A LA BASE DE DONNEES
        try {
            //OUVERTURE DE LA CONNEXION A LA BASE DE DONNEES 
            $connection = new PDO(
            "mysql:host=localhost;dbname=projetweb",
            "root",
            ""
            );


                $query = "SELECT * FROM teachers WHERE `id` = :id";
                $conn = $connection->prepare($query);
                $conn->bindValue(":id", $_SESSION['id'], PDO::PARAM_STR);
                $conn->execute();    
                $user = $conn->fetch();



                if($conn->rowCount()>0){
                    $firstname = $user['firstname'];
                    $lastname = $user['lastname'];

                }

            //FERMETURE DE LA CONNEXION A LA BASE DE DONNEES
            $connection = null;

        } catch(PDOException $e) { 
            die('Erreur : '.$e->getMessage());
        }


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>naMemorizer - Accueil</title>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/png" href="img/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <div class="header-img">
                <img src="img/logo.png" alt="Logo Name Memorizer"/>
            </div>
            <div class="menu">
                <nav>
                    <a href="index.php" class="selected">Accueil</a>
                    <a href="game.php">Jeu</a>
                    <a href="gestion.php">Gestion du Compte</a>
                    <a href="classes.php">Gestion des Classes</a>
                </nav>
                <button class="button">Déconnexion</button>
            </div>
        </header>
        <div class="contenu">
            <div>
                <h2>Bienvenue sur naMemorizer <?php echo " ". $firstname . " " . $lastname ?></h2>
                <p>
                    Vous êtes maintenant connectés, vous pouvez dès à présent naviguer sur le site
                </p>
                <p>
                    Nouveau sur le site ? Voici une brève présentation des différentes partie de ce dernier 
                </p>
                <h3>Jeu</h3>
                <p>
                    Partie principale du site, jouez et essayez d'obtenir le score le plus élevé afin de mémoriser le nom de vos élèves
                </p>
                <h3>Gestion du Compte</h3>
                <p>
                    Ici vous pourrez gérer votre compte : modifier vos informations ou votre mot de passe, et supprimer votre compte
                </p>
                <h3>Gestion des Classes</h3>
                <p>
                    Dans cette partie du site, vous pourrez gérer vos classes : ajouter des élèves, sélectionner vos classes, en ajouter une, visionner ses dernières et en supprimer des élèves
                </p>
                <p class="amusez_vous">
                    Amusez-vous bien sur naMemorizer !!!
                </p>
            </div>
        </div>
        <footer>
            <div>
                <p>
                    Projet réalisé par Gael HUSSON, Nathan MINGER, Nicolas CARBONNIER et Tristan GARNI, dans le cadre du cours de Web avancé de Licence MIASHS 2ème année 
                </p>
            </div>
            <div>
                <a target="_blank" href="http://institut-sciences-digitales.fr/" alt="Site de l'IDMC">
                    <img src="img/idmc_logo.png" alt="Logo IDMC"/>
                </a>
            </div>
        </footer>
    </body>
</html>