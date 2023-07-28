<?php
session_start();

$host = "localhost";
$dbusername = "id20172912_martincash";
$dbpassword = "123Martin%";
$dbname = "id20172912_projet_stage_mydil";


$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
  die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
}


if (isset($_POST['submit'])) {
  $Date = $_POST['date'];
  $Nom_Jury = $_POST['nom_jury'];
  $Nom_Projet = addslashes($_POST['nom_projet']);
  $Thematique = addslashes($_POST['thematique']);
  $Cible = addslashes($_POST['cible']);
  $Creativite_Originalite = $_POST['creativite_originalite'];
  $Technicite = $_POST['technicite'];
  $Design = $_POST['design'];
  $Presentation_Orale = $_POST['presentation_orale'];
  $Aboutissement_Solution = $_POST['aboutissement_solution'];
  $Avis_Projet = $_POST['avis_projet'];
  $Commentaire_Suggestion = addslashes($_POST['commentaire_suggestion']);
  $Note = ($Creativite_Originalite + $Technicite + $Design + $Presentation_Orale + $Aboutissement_Solution) / 5;

  $sql_Projet = "INSERT INTO Notes_Projet (Date, Nom_Jury, Nom_Projet, Thematique, Cible, Creativite_Originalite, Technicite, Design, Presentation_Orale, Aboutissement_Solution, Avis_Projet, Commentaire_Suggestion, Note) VALUES ('$Date', '$Nom_Jury', '$Nom_Projet', '$Thematique', '$Cible', '$Creativite_Originalite', '$Technicite', '$Design', '$Presentation_Orale', '$Aboutissement_Solution', '$Avis_Projet', '$Commentaire_Suggestion', '$Note')";
  
  if ($conn->query($sql_Projet) === TRUE) {
    header("Location: réussite_ajout_note.html");
  } else {
    echo "Error: " . $sql_Projet . "<br>" . $conn->error;
  }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Notation Projets Open Innovation</title>
  <style>
    a {
      color: black;
    }
    header {
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      padding: 20px 0;
      align-items:  center;
      position: relative;
    }
    
    * {
      font-family:"Roboto", sans-serif;
    }
    
    body {
      margin: 0;
      padding: 0;
    }

    
    form {
      margin: 0 auto;
      width: 85%;
      text-align: center;
      font-size: 30px;
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
    
    p {
        text-align: center;
    }
    
    .retour-ajout {
      float : right;
      margin-top: 20px;
      margin-right: 20px;
    }

    button {
        font-size: 30px;
        border-radius:15px;
        cursor: pointer;
        padding: 10px 30px;
    }
    
    option {
        font-size : 20px;
    }
    
    select {
        font-size: 25px;
    }
    
    input {
        font-size: 25px;
    }
    
    input[type="radio"]{
        transform: scale(2);
        margin: 10px 10px;
    }
    
.logo {
    width: 150px;
    position: absolute;
    left: 40px;
    justify-self: flex-start;
}
  </style>
</head>
<body>
  <header>
    <img class="logo" src="logo.epsi.png">
    <h1 class="Salut">Ajouter une note</h1>
  </header>

  <div class="retour-ajout">
    <a href="test.html">
    <button> Retour</button></a>
  </div>
  
<br><br>

<form method="post" action="">
  <label for="date">Date :</label>
  <input style="font-size:25px" type="date" id="date" name="date" required><br><br>

  <label for="nom_jury">Nom du jury :</label>
  <input type="text" id="nom_jury" name="nom_jury" required><br><br>

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
  </select><br><br>

  <label for="thematique">Thématique :</label>
  <input type="text" id="thematique" name="thematique" required><br><br>

  <label for="cible">Cible :</label>
  <input type="text" id="cible" name="cible" required><br><br><br>


  <label for="creativite_originalite">Créativité/Originalité :</label>
  <input type="radio" id="creativite_originalite_0" name="creativite_originalite" value="0" required>
  <label for="creativite_originalite_0">0</label>
  <input type="radio" id="creativite_originalite_1" name="creativite_originalite" value="1" required>
  <label for="creativite_originalite_1">1</label>
  <input type="radio" id="creativite_originalite_2" name="creativite_originalite" value="2" required>
  <label for="creativite_originalite_2">2</label>
  <input type="radio" id="creativite_originalite_3" name="creativite_originalite" value="3" required>
  <label for="creativite_originalite_3">3</label>
  <input type="radio" id="creativite_originalite_4" name="creativite_originalite" value="4" required>
  <label for="creativite_originalite_4">4</label>
  <input type="radio" id="creativite_originalite_5" name="creativite_originalite" value="5" required>
  <label for="creativite_originalite_5">5</label><br><br><br>

  <label for="technicite">Technicité :</label>
  <input type="radio" id="technicite_0" name="technicite" value="0" required>
  <label for="technicite_0">0</label>
  <input type="radio" id="technicite_1" name="technicite" value="1" required>
  <label for="technicite_1">1</label>
  <input type="radio" id="technicite_2" name="technicite" value="2" required>
  <label for="technicite_2">2</label>
  <input type="radio" id="technicite_3" name="technicite" value="3" required>
  <label for="technicite_3">3</label>
  <input type="radio" id="technicite_4" name="technicite" value="4" required>
  <label for="technicite_4">4</label>
  <input type="radio" id="technicite_5" name="technicite" value="5" required>
  <label for="technicite_5">5</label><br><br><br>


  <label for="design">Design :</label>
  <input type="radio" id="design_0" name="design" value="0" required>
  <label for="design_0">0</label>
  <input type="radio" id="design_1" name="design" value="1" required>
  <label for="design_1">1</label>
  <input type="radio" id="design_2" name="design" value="2" required>
  <label for="design_2">2</label>
  <input type="radio" id="design_3" name="design" value="3" required>
  <label for="design_3">3</label>
  <input type="radio" id="design_4" name="design" value="4" required>
  <label for="design_4">4</label>
  <input type="radio" id="design_5" name="design" value="5" required>
  <label for="design_5">5</label><br><br><br>


  <label for="presentation_orale">Présentation orale :</label>
  <input type="radio" id="presentation_orale_0" name="presentation_orale" value="0" required>
  <label for="presentation_orale_0">0</label>
  <input type="radio" id="presentation_orale_1" name="presentation_orale" value="1" required>
  <label for="presentation_orale_1">1</label>
  <input type="radio" id="presentation_orale_2" name="presentation_orale" value="2" required>
  <label for="presentation_orale_2">2</label>
  <input type="radio" id="presentation_orale_3" name="presentation_orale" value="3" required>
  <label for="presentation_orale_3">3</label>
  <input type="radio" id="presentation_orale_4" name="presentation_orale" value="4" required>
  <label for="presentation_orale_4">4</label>
  <input type="radio" id="presentation_orale_5" name="presentation_orale" value="5" required>
  <label for="presentation_orale_5">5</label><br><br><br>


  <label for="aboutissement_solution">Aboutissement de la solution :</label>
  <input type="radio" id="aboutissement_solution_0" name="aboutissement_solution" value="0" required>
  <label for="aboutissement_solution_0">0</label>
  <input type="radio" id="aboutissement_solution_1" name="aboutissement_solution" value="1" required>
  <label for="aboutissement_solution_1">1</label>
  <input type="radio" id="aboutissement_solution_2" name="aboutissement_solution" value="2" required>
  <label for="aboutissement_solution_2">2</label>
  <input type="radio" id="aboutissement_solution_3" name="aboutissement_solution" value="3" required>
  <label for="aboutissement_solution_3">3</label>
  <input type="radio" id="aboutissement_solution_4" name="aboutissement_solution" value="4" required>
  <label for="aboutissement_solution_4">4</label>
  <input type="radio" id="aboutissement_solution_5" name="aboutissement_solution" value="5" required>
  <label for="aboutissement_solution_5">5</label><br><br><br>


  <label for="avis_projet">Avis sur le projet :</label><br><br>
  <input type="radio" id="avis_projet_0" name="avis_projet" value="1" required>
  <label for="avis_projet_0">Pas du tout innovant</label>
  <input type="radio" id="avis_projet_1" name="avis_projet" value="2" required>
  <label for="avis_projet_1">Un peu innovant</label><br><br>
  <input type="radio" id="avis_projet_2" name="avis_projet" value="3" required>
  <label for="avis_projet_2">Plutôt innovant</label>
  <input type="radio" id="avis_projet_3" name="avis_projet" value="4" required>
  <label for="avis_projet_3">Très innovant</label><br><br><br>


  <label for="commentaire_suggestion">Commentaire ou suggestion :</label>
  <textarea style="font-size:30px;"id="commentaire_suggestion" name="commentaire_suggestion" ></textarea><br><br><br>
  
  <input style="font-size: 30px; border-radius:15px; cursor: pointer; padding: 10px 30px; margin: 10px 20px;" type="submit" name="submit" value="Ajouter"><br><br><br>
  
  <input style="font-size: 30px; border-radius:15px; cursor: pointer; padding: 10px 30px; margin: 10px 20px;" type="reset" name="reset" value="Recommencer">
</form>
<br>
<br>

  <footer>
    <p>© 2023 Mon site de notation. Tous droits réservés.</p>
  </footer>
</body>
</html>
