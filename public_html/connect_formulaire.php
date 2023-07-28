<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username)) {
  if (!empty($password)) {
//Si l'un des champs n'est pas rempli, alors cela redirige l'user vers une page d'erreur
    $host = "localhost";
    $dbusername = "id20172912_martincash";
    $dbpassword = "123Martin%";
    $dbname = "id20172912_projet_stage_mydil";
//Ici on va attribuer à des valeurs les différentes informations nécessaires à la connexion à la base de données

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
//Ici on utilise ces valeurs pour les mettre dans une autre valeur '$conn', qui va être utilisé à chaque fois que l'on va vouloir communiquer avec la base de données
    
    if (mysqli_connect_error()) {
      die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    } else {
//Si la connexion avec la base de données a rencontrer un problème, alors cela arrête le code ('die')

      $sql = "SELECT id FROM Username_Password WHERE Username='$username' AND Password='$password'";
//On va alors venir attribuer à la valeur $sql une requête SQL qui va venir sélectionner toutes les valeurs de la base de données où la colonne username et password correspondent aux valeurs renseignées dans le formulaire
      $result = $conn->query($sql);
      if ($result->num_rows == 1) {
        $id = $result->fetch_assoc()['id'];
//La valeur ('result') sera la réponse de la requête SQL ('query($sql)') après connexion à la base de données ($conn). Si il y a un résultat, alors le code va venir prendre l'ID de l'user et l'attribuer à la valeur $id
          header("Location: test.html");
          exit();
      } else {
        header("Location: connexion-erreur.html");
        exit();
      }
      $conn->close();
    }
  } else {
    header("Location: connexion-erreur.html");
    exit();
  }
} else {
  header("Location: connexion-erreur.html");
  exit();
}
?>
