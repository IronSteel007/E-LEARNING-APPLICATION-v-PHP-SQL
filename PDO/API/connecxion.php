                                      <!-- Method exec et query  -->
<!--  QUERY execute la requete et retourne un jeu de results en tant qu'object PDOStatment -->
// QUERY utilisée pour les requetes select

$response = $conn->query("SELECT * FROM basename");

<!--  EXEC execute la requete et retourne le nombre de lignes affectées -->
// EXEC utilisée pour les requetes insert update et delete

$nbrows = $conn->exec('DELETE FROM basename where condition');
    

                                        <!-- Connexion DB  -->

<?php
        try{
            // nom de la source = source name (dsn)
            $dsn = 'mysql:host=localhost;dbname=basename';
            //nom d'utilisateur (user)
            $user = 'root';
            // mot de passe (password)
            $password = '';
            //option
            $option = array(PDO::MYSQL_ATTR_INIT_COMMAND ==> PDO:: 'SET NAMES utf8',PDO::MYSQL_ATTR_ERRMODE ==> PDO::ERRMODE_EXCEPTION);
            //instanciation de la connection
            $conn = new PDO($dsn,$user,$password,$option);
            echo "Connexion établie<br>";
        }catch(PDOException $e){
            die("Erreur de connexion a la bade de données établie<br>" . $e->getMessage());
        }

?>



							<!-- session and cookies -->

<?php
session_start();
$email = $_POST['email'];
$password = $_POST['pass'];

if (empty($email)) {
    header('location:../index.php?error=Enter Your Email PLZ');
} else if (empty($password)) {
    header('location:../index.php?error=Enter Your Password PLZ');
}

else {
    include('../crud/conection.php');
    $users = $conn->prepare("SELECT * FROM comptes WHERE email_user='$email'");
    $users->execute();
    $user = $users->fetch();
    $password = $_POST['pass'];
    $user_name = $user['name_user'];
    $user_email = $user['email_user'];
    $user_password = $user['pass_user'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('location:../index.php?error=invalid format email');
    }

    else if ($email === $user_email && $password === $user_password){
     $_SESSION['utilisateur_name'] =  $user_name;
     $_SESSION['utilisateur_email'] = $user_email;
     $_SESSION['utilisateur_password'] = $user_password;
     if(isset($_POST['check'])){
        setcookie('user',$user_email,time()+(20),"/");
        setcookie('user_pass',$user_password,time()+(20),"/");
    }
    header('location:../view/home.php');

     }
    else {
        header('location:../index.php?error=password or email is incorrect');
    }
}

    //   session and cookies is sidebar
	session_start();
if(isset($_SESSION['utilisateur_email'])){
?>


	<?php echo $_SESSION['utilisateur_name'] ?>


	value="<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>









<?php

		********************METHODE_1 *********************
		//$conn = mysqli_connect('localhost', 'root', '', 'gestion');
		
		//*******METHODE_2//*******
		// try {
		// 	$conn = new PDO("mysql:host=localhost;dbname=gestion;port=3306;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		// } catch (Exception $e) {
		// 	echo 'Erreur de connexion: ' . $e->getMessage();
		// }

		*********************AFFICHAGE*********************

		//$contenuClient = $conn->query('SELECT * FROM client WHERE id_client = 5');

		// $contenuClient = $conn->prepare('SELECT * FROM client');
		// $contenuClient->execute();

		// while($ligne = $contenuClient->fetch()){
		// 	echo $ligne['id_client'] . ' ';
		// }

		// $contenuClient->closeCursor();

		// echo '<Br>';

		// $contenuClient = $conn->prepare('SELECT * FROM client WHERE id_client < 4');

		// $contenuClient->execute();

		// while($ligne = $contenuClient->fetch()){
		// 	echo $ligne['id_client'] . ' ';
		// }


		// if(isset($_POST['idClient'])){
		// 	if(!empty($_POST['idClient'])){
		// 		$idClient = htmlspecialchars($_POST['idClient']);

		// 		$contenuClient = $conn->prepare('SELECT * FROM client WHERE id_client < ?');
		// 		$contenuClient->execute(array($idClient));

				// $contenuClient = $conn->prepare('SELECT * FROM client WHERE id_client < :idClient AND adresse = :adresse');
				// $contenuClient->execute(array("idClient" => $idClient,
				// 							  "adresse" => "Fes"));


				// $contenuClient = $conn->prepare('SELECT * FROM client WHERE id_client < :idClient AND adresse = "Fes"');
				// $contenuClient->execute(array("idClient" => $idClient));

		// 		echo '<table>';

		// 		while($ligne = $contenuClient->fetch()){
		// 			echo '<tr>';

		// 				echo '<td>';
		// 					echo $ligne['id_client'];
		// 				echo '</td>';

		// 				echo '<td>';
		// 					echo $ligne['nomC'];
		// 				echo '</td>';

		// 				echo '<td>';
		// 					echo $ligne['numTel'];
		// 				echo '</td>';

		// 				echo '<td>';
		// 					echo $ligne['adresse'];
		// 				echo '</td>';

		// 			echo '</tr>';
		// 		}

		// 		echo '</table>';
		// 	}
		// }

		*********************INSERTION*********************//

		// if(isset($_POST['nomC']) && isset($_POST['numTel']) && isset($_POST['adresse'])){
		// 	if(!empty($_POST['nomC']) && !empty($_POST['numTel']) && !empty($_POST['adresse'])){
				
		// 		$nomC = htmlspecialchars($_POST['nomC']);
		// 		$numTel = htmlspecialchars($_POST['numTel']);
		// 		$adresse = htmlspecialchars($_POST['adresse']);

		// 		$insertionClient = $conn->prepare('INSERT INTO client(nomC,numTel,adresse) VALUES(?,?,?)');
		// 		$insertionClient->execute(array($nomC,$numTel,$adresse));

		// 		echo 'Le Client a été bien ajouté !!';
		// 	}else{
		// 		echo 'Attention, Tous Les Champs Sont Obligatoires !!';
		// 	}
		// }

		*********************MODIFICATION*********************//


		// if(isset($_POST['idClient']) && isset($_POST['nomC']) && isset($_POST['numTel']) && isset($_POST['adresse'])){
		// 	if(!empty($_POST['idClient']) && !empty($_POST['nomC']) && !empty($_POST['numTel']) && !empty($_POST['adresse'])){
				
		// 		$idClient = htmlspecialchars($_POST['idClient']);
		// 		$nomC = htmlspecialchars($_POST['nomC']);
		// 		$numTel = htmlspecialchars($_POST['numTel']);
		// 		$adresse = htmlspecialchars($_POST['adresse']);

		// 		if(filter_var($idClient,FILTER_VALIDATE_INT)){

		// 			$testId = $conn->prepare('SELECT * FROM client WHERE id_client = ?');
		// 			$testId->execute(array($idClient));

		// 			$nbLignes = $testId->rowCount();

		// 			if($nbLignes != 0){
		// 				$modificationClient = $conn->prepare('UPDATE client SET nomC = :nomC , numTel = :numTel , adresse = :adresse WHERE id_client = :idClient');

		// 				$modificationClient->execute(array("nomC" => $nomC,
		// 												   "numTel" => $numTel,
		// 												   "adresse" => $adresse,
		// 												   "idClient" => $idClient));

						
		// 				echo 'Le Client a été bien modifié !!';
		// 			}else{
		// 				echo 'Cet id n\'existe pas !!';
		// 			}
				

		// 		}else{
		// 			echo 'Cet id est non valable !!';
		// 		}
				
		// 	}else{
		// 		echo 'Attention, Tous Les Champs Sont Obligatoires !!';
		// 	}
		// }

			
		*********************SUPPRESSION*********************//
		
		// if(isset($_POST['idClient'])){
		// 	if(!empty($_POST['idClient'])){
				
		// 		$idClient = htmlspecialchars($_POST['idClient']);
	
		// 		if(filter_var($idClient,FILTER_VALIDATE_INT)){

		// 			$testId = $conn->prepare('SELECT * FROM client WHERE id_client = ?');
		// 			$testId->execute(array($idClient));

		// 			$nbLignes = $testId->rowCount();

		// 			if($nbLignes != 0){
						
		// 				$suppressionClient = $conn->prepare('DELETE FROM client WHERE id_client = ?');
		// 				$suppressionClient->execute(array($idClient));
						
		// 				echo 'Le Client a été bien supprimé !!';
		// 			}else{
		// 				echo 'Cet id n\'existe pas !!';
		// 			}
				

		// 		}else{
		// 			echo 'Cet id est non valable !!';
		// 		}
				
		// 	}else{
		// 		echo 'Attention, Ce Champ est Obligatoire !!';
		// 	}
		// }


// if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['filiere']) && isset($_POST['sexe']) && isset($_POST['DateNaissance']))
// {
// 	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['filiere']) && !empty($_POST['sexe']) && !empty($_POST['DateNaissance']))
// 	{
// 		$nom = htmlspecialchars($_POST['nom']);
// 		$prenom = htmlspecialchars($_POST['prenom']);
// 		$filiere = htmlspecialchars($_POST['filiere']);
// 		$sexe = htmlspecialchars($_POST['sexe']);
// 		$DateNaissance = htmlspecialchars($_POST['DateNaissance']);


// 		echo 'Bonjour monsieur ' . $nom . ' ' . $prenom . ' !!<br>';
// 		echo 'Votre filiere est: ' . $filiere . '<Br>';
// 		echo 'Votre sexe est ' . $sexe . '<br>'; 
// 		echo 'Votre date de naissance est ' . $DateNaissance . '<br>'; 
// 	}

// 	else
// 		echo 'Veuillez remplir tous les champs !!';
// }
// else
// 	echo 'C\'est variables n\'existent pas !!<br>';


// if(!isset($_GET['id'])){
// 	echo "Cette n'est pas valable pour l'instant !!";
// }else{

// 	if(filter_var($_GET['id'],FILTER_VALIDATE_INT)  ||  filter_var($_GET['id'],FILTER_VALIDATE_INT) === 0)
// 		echo 'L\'id de cette voiture est ' . $_GET['id'];
// 	else
// 		echo 'Cet id n\'est pas un entier!!';
// }



?>