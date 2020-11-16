<?php

?>

<!-- Debut page display -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <header>
        <nav>
            <h2>Inscription</h2>
        </nav>
    </header>

    <main>
        <article>
            <section>
                <!--Debut form -->
                <form method="post" action="">
                    <label for="login">login</label>
                    <input type="text" name="login" id="login" placeholder="votre login">

                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prenom">

                    <label for="nom">nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">

                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirmation">

                    <input type="submit" name="submit" value="Je m'inscris">
                </form>
                <!--End form -->
            </section>
        </article>
        <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
        ?>
    </main>

    <footer>
        <p>Copyright 2020 </p>
    </footer>

</body>

</html>

<!--End page display -->