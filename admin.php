<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <table>

            <thead>
                <tr>
                    <th>LOGIN</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PASSWORD</th>

                <tr>
            </thead>

            <?php

            $bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...
            $request = "SELECT * FROM utilisateurs;";

            $query = mysqli_query($bdd, $request);

            while (($result = mysqli_fetch_assoc($query)) != null)
            {
                $login = $result['login'];
                $prenom = $result['prenom'];
                $nom = $result['nom'];
                $password = $result['password'];

                echo '<tbody>
                <tr>
                <td>' . $login . '</td>
                <td>' . $prenom . '</td>
                <td>' . $nom . '</td>
                <td>' . $password . '</td>

                </tr>
                </tbody>';
            }

            ?>

        </table>

    </section>
</body>

</html>