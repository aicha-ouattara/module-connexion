<?php
session_start();
$bdd = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connexion database...

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<header>
        <nav>
            <?php
            $sql = "SELECT * FROM utilisateurs WHERE id = '".$_SESSION["id"]."'";  // Recovery User session ...
            $result = mysqli_query($bdd,$sql) or die(mysqli_error($bdd));
            $userinfo = mysqli_fetch_array($result);
            ?>
        </nav>
    </header>
    <main>
    <section>

    <h1> Bienvenue <?php echo $userinfo["login"] ?> ! </h1>
    </section>
    </main>

<footer>
</footer>

</body>

</html>


<?php
if(isset($_SESSION["id"]) == "admin")
{
    $request = "SELECT * FROM utilisateurs;";
    $query = mysqli_query($bdd, $request);

    $i = 0;

    echo "<table>";

    while ($result = mysqli_fetch_assoc($query)) 
    {
        if ($i == 0) 
        {
            echo "<tr>";
            foreach ($result as $key => $value) 
            {
                echo "<th>$key</th>";
            }
            echo "</tr>";

            $i++;
        }

        echo "<tr>";
        foreach ($result as $key => $value) 
        {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    mysqli_close($bdd);

}
else
{
    echo "vous n'êtes pas administrateur!";
}

?>

