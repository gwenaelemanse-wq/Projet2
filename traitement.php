<?php



  $postdata= $_POST;



  if (
     empty($postdata['titre'])
    || empty($postdata['image'])
    || !filter_var($postdata['image'], FILTER_VALIDATE_URL)
    || empty($postdata['artiste'])
    || empty($postdata['description'])
    || strlen($postdata['description']) < 3
) { header ('Location: ajouter.php?erreur=true');
    }else{
 
   
        $titre = htmlspecialchars($postdata['titre']);
        $description = htmlspecialchars($postdata['description']);
        $artiste = htmlspecialchars($postdata['artiste']);
        $image = htmlspecialchars($postdata['image']);

           
        require 'bdd.php';
         $db = connexion();

  $requete = $db->prepare('INSERT INTO oeuvres (titre, description, artiste, image) VALUES (?,?,?,?)');
  $requete->execute([$titre, $description, $artiste, $image]) ;

   header('Location: oeuvre.php?id=' . $db->lastInsertId());

   }


?>

