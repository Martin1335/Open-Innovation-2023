<!DOCTYPE html>
<html>
<head>
    <title>Résultats des projets</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Roboto", sans-serif;
        }

    header {
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      padding: 20px 0;
      align-items:  center;
      position: relative;
    }


        .logo {
           width: 150px;
            position: absolute;
            left: 40px;
            justify-self: flex-start;
    }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;

            min-height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1500px;
            margin-bottom: 20px;
            font-size: 30px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

    footer {
      background-color: #f2f2f2;
      padding: 10px;
      text-align: center;
      position: relative;
      bottom: 0;
      width: 100%;
      box-sizing: border-box;
    }

    button {
        font-size: 30px;
        border-radius:15px;
        cursor: pointer;
        padding: 10px 30px;
    }
        .btn {
            text-align: center;
            font-weight: lighter;
        }
        
        .recherche_specifique {
            text-align : center;
        }
        
        .retour {
            text-align : right;
        }
        
    </style>
</head>
<body>
    <header>
        <img class="logo" src="logo.epsi.png">
        <h1 class="Salut">Résultats</h1>
    </header>
<br>
  <div class="retour">
    <a href="test.html">
    <button> Retour</button></a>
  </div>

  <div class="recherche_specifique">
    <a href="recherche_specifique.php">
    <button> Rechercher un projet</button></a>
  </div>

    <div class="container">
    <br><br><br>
        <?php
        // Connexion à la base de données
        $host = "localhost";
        $dbusername = "id20172912_martincash";
        $dbpassword = "123Martin%";
        $dbname = "id20172912_projet_stage_mydil";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Requête pour récupérer les résultats de la table "Notes_Projet"
        $sql = "SELECT Date, Nom_Projet, Avis_Projet, Commentaire_Suggestion, Note FROM Notes_Projet";
        $result = $conn->query($sql);

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Date</th>
                        <th>Nom du Projet</th>
                        <th>Avis du Projet</th>
                        <th>Commentaire/Suggestion</th>
                        <th>Note</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['Date']."</td>
                        <td>".$row['Nom_Projet']."</td>
                        <td>".$row['Avis_Projet']."</td>
                        <td>".$row['Commentaire_Suggestion']."</td>
                        <td>".$row['Note']."</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "Aucun résultat trouvé.";
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <p>© 2023 Mon site de notation. Tous droits réservés.</p>
    </footer>
</body>
</html>
