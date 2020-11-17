<?php
$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...

if(isset($_POST["submit"])) //If we press the submit button
{
    if(!empty($_POST["login"]) AND !empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["password"]) AND !empty($_POST["password2"]))  //If every value are not empty
    {
       
        $login = htmlspecialchars($_POST["login"]);  //Users variable information
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $password = htmlspecialchars($_POST["password"]);
        $password2 = htmlspecialchars($_POST["password2"]);
        
        $loginlenght = strlen($login); //Variable for the login lenght

      if($loginlenght <= 255)
      {
        if($password == $password2)
        {
          $sql=" INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('" .$login. "', '" .$prenom. "', '" .$nom. "', '" .$password. "');";
  
          if (!mysqli_query($bdd, $sql))
              {
              die('impossible d’ajouter cet enregistrement : ' .  mysqli_error ($bdd));
              }
              else
              {
              mysqli_close($bdd);
              header('Location:connexion.php');
              }
  
        }
        else
        {
          $erreur = "Les mots de passe ne sont pas identique !";
        }
      }
      else
      {
        $erreur = "Votre pseudo ne doit pas depasser 255 caracteres !";
      }
    }
    else
    {
    $erreur = "Tous les champs ne sont pas remplis !";
    }
}

?>


<!-- Debut page display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../module-connexion/css/inscription.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php">Connexion</a>
            <a href="profil.php">Profil</a>
        </nav>
    </header>

    <main>
            <section class="flex-container">
            <img src="https://media.giphy.com/media/BOPrq7m5jYS1W/giphy.gif" alt="totorro" class="totoro">

                <section>
                <!--Debut form -->
                <form method="post" action="">
                   
                  <fieldset>
                    <div class="formflex">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" placeholder="votre login">
                    </div>

                    <div class="formflex">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prenom">
                    </div>

                    <div class="formflex">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">
                    </div>

                    <div class="formflex">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                    </div>
                    
                    <div class="formflex">
                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirmation">
                    </div>

                    <div class="formflex">
                    <input type="submit" name="submit" value="Je m'inscris">
                    </div>
                   </fieldset>
                 </form>
                <!--End form -->
            </section>
            </section>
        <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
        ?>
        <section>
                <h1>Studio Ghibli</h1>
                <article class="studio-container">
                <div class="image">
                    <img src="../module-connexion/images/baron.jpg" alt="baron">
                    <img src="../module-connexion/images/ghiblies.jpg" alt="baron">
                    <img src="../module-connexion/images/kazetachinu.jpg" alt="baron">
                </div>
                <div class="image">
                    <img src="../module-connexion/images/marnie.jpg" alt="baron">
                    <img src="../module-connexion/images/mimi.jpg" alt="baron">
                    <img src="../module-connexion/images/mononoke.jpg" alt="baron">
                </div>
                <div class="image">
                    <img src="../module-connexion/images/red-turtle.jpg" alt="baron">
                    <img src="../module-connexion/images/vielle.jpg" alt="baron">
                    <img src="../module-connexion/images/yamada.jpg" alt="baron">
                </div>
        </section>
    </main>

    <footer>
        <p></p>
    </footer>

</body>

</html>

<!--End page display -->
