<!DOCTYPE html>
<html>
<head>
  <title>Notation Projets Open Innovation</title>
  <style>
    header {
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      padding: 20px 0;
      align-items:  center;
      position: relative;
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
    
    * {
      font-family:"Roboto", sans-serif;
    }
    
    p {
      text-align: center;
    }
    
    body {
      margin: 0;
      padding: 0;
    }
    
    .btn {
      text-align: center;
      font-weight: lighter;
      font-family:"Roboto", sans-serif;
    }

    button {
        font-size: 25px;
        border-radius:15px;
        cursor: pointer;
        padding: 10px 30px;
        margin: 10px 20px;
    }
    
    .logo {
     width: 150px;
     position: absolute;
     left: 40px;
     justify-self: flex-start;
    }
    
    h1 {
      text-align: center;
    }
    
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1500px;
            margin-bottom: 20px;
            font-size: 30px;
            margin: 0 auto;
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
    
    .retour {
        text-align: right;
    }
    
    form {
        text-align: center;
        font-size: 30px;
    }
    
    h2 {
        text-align: center;
    }
    
    option {
        font-size : 20px;
    }
    
    select {
        font-size: 25px;
    }
    
    .result {
        font-size:25px;
    }
  </style>
</head>
<body>
  <header>
    <img class="logo" src="logo.epsi.png">
    <h1 class="Salut">Rechercher une note</h1>
  </header>
  <br>
    <div class="retour">
    <a href="test.html">
    <button> Retour</button></a>
  </div>
  
  <br><br>
  
  <main>
    <form method="POST">
      <label for="nom_projet">Nom du projet :</label>
      <select id="nom_projet" name="nom_projet" required> 
      <option>ActiviGo</option>
      <option>AirKids</option>
      <option>Anime Streaming Platform</option>
      <option>Arosaje</option>
      <option>AutisticPrime</option>
      <option>BAC</option>
      <option>BabyQuiz</option>
      <option>BinCycle</option>
      <option>Blind Helper</option>
      <option>Cadorpharma</option>
      <option>Coop Hen Connect</option>
      <option>Cultivat'R</option>
      <option>CQRT</option>
      <option>DentIA</option>
      <option>EpNote</option>
      <option>Egality</option>
      <option>EPSI-Bot</option>
      <option>Extra Life</option>
      <option>FabOr</option>
      <option>Fake news</option>
      <option>Ferme L.A( Less Admini)</option>
      <option>G7</option>
      <option>GPS</option>
      <option>Green Workers</option>
      <option>Habitat Link</option>
      <option>Happy Work</option>
      <option>HelioPlanner</option>
      <option>Help Handicap</option>
      <option>Hidden land</option>
      <option>HomeNas</option>
      <option>IA Academy</option>
      <option>Infinity</option>
      <option>IT'IA</option>
      <option>JobForHouse</option>
      <option>La Domotique</option>
      <option>LEA !!</option>
      <option>Le Bon Champs</option>
      <option>Leamee</option>
      <option>Mirror Tech</option>
      <option>MonOrdo</option>
      <option>My Quiz</option>
      <option>Navika</option>
      <option>OurPlace</option>
      <option>Park ON</option>
      <option>Paye ton Kawa</option>
      <option>Pions 12</option>
      <option>PlanetAware</option>
      <option>PsychoLib</option>
      <option>QCM Generateur</option>
      <option>Quizzito</option>
      <option>Rail Wake</option>
      <option>RH Analytics</option>
      <option>Ruche Connectée</option>
      <option>SafeWalk</option>
      <option>Source Adia</option>
      <option>Smile :)</option>
      <option>SpartAInvest</option>
      <option>Sport Together</option>
      <option>Stop Harcélement</option>
      <option>Stock Request</option>
      <option>Suits-YOU</option>
      <option>The Rise of Malphas</option>
      <option>TriNet</option>
      <option>VasyFaisle</option>
      <option>Visually Impaired Aid</option>
      <option>Wait App (LIDL)</option>
      <option>Welcome</option>
      <option>WorkAndGo</option>
      <option>work-study Courses</option>
      <option>WorkZen</option>
      </select><br><br><br>
      <input style="font-size:25px;border-radius:15px;cursor: pointer;padding: 10px 30px;" type="submit" value="Afficher les notes">
    </form>

<br>

    <?php
    if (isset($_POST['nom_projet'])) {
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

    $nomProjet = strtolower($_POST['nom_projet']);

      // Requête pour récupérer les résultats de la table "Notes_Projet" pour le projet sélectionné
$sql = "SELECT Date, Nom_Projet, Avis_Projet, Commentaire_Suggestion, Note FROM Notes_Projet WHERE Nom_Projet = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nomProjet);
$stmt->execute();
$result = $stmt->get_result();

      // Vérifier si la requête s'est exécutée avec succès
if ($result !== false && $result->num_rows > 0) {
    // Afficher les colonnes spécifiées
    echo "<h2>Notes du projet : $nomProjet</h2>";
    echo "<table>";
    echo "<tr><th>Date</th><th>Nom du projet</th><th>Avis du projet</th><th>Commentaire/Suggestion</th><th>Note</th></tr>";

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
    echo "<p class='result'>Aucune note n'a été trouvée pour le projet : $nomProjet</p>";
}

      // Fermer la connexion à la base de données
      $conn->close();
    }
    ?>
  </main>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <p>© 2023 Mon site de notation. Tous droits réservés.</p>
  </footer>
</body>
</html>
