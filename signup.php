<?php
const ROOT ='mysql:dbname=e_class_db;host=localhost;port=3306';
const USERNAME ='root';
const PASSWORD='';

$conn=new PDO(ROOT,USERNAME,PASSWORD);
if($conn){
    echo 'work';
}
function create($name_user,$email_user,$pass_user){
    global $conn;
    if($conn){
        $query= "INSERT INTO comptes(name_user,email_user,pass_user) values(:name_user,:email_user,:pass_user)";
        $statement=$conn->prepare($query);

    $statement->execute([
            ':name_user'=>$name_user,
            ':email_user'=>$email_user,
            ':pass_user'=>$pass_user,
            ]);
            // validation password
    //  $number = preg_match('@[0-9]@', $password);
    //  $uppercase = preg_match('@[A-Z]@', $password);
    //  $lowercase = preg_match('@[a-z]@', $password);
    //  $specialChars = preg_match('@[^\w]@', $password);
    //else if(strlen($password) < 8   !$number  !$uppercase   !$lowercase   !$specialChars){
    //header('location:index.php?error=Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character');
    //}
    }
}

    if(isset($_POST['name_user']) && isset($_POST['email_user']) && isset($_POST['pass']) && isset($_POST['pass_confirmation'])){
    if(!empty($_POST['name_user']) && !empty($_POST['email_user']) && !empty($_POST['pass']) ){
            create($_POST['name_user'],$_POST['email_user'],$_POST['pass'],$_POST['pass_confirmation']);
            header('Location:index.php');
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name_user="keywords" content="Bootstrap 5 , W3C , PHP, js, json, Sidebar, Header, Footer, Font Awesome, Github   " />
    <meta name_user="description" content="notre equipe de désigne vient de terminer la maquette de l'application E-Classe. En tant que développeur polyvalent, votre mission est d'intégrer la maquette avec un framework CSS de votre choix ainsi d'appliquer le principe **DRY **via le language PHP. Vous devez, donc, répondre aux histoires suivants :" />
    <meta name="author" content="IronSteel007" />
    <link rel="icon" href="assets/img/icone.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>E-Classe | Sign-up</title>
</head>

<body class="body-colo">
    <main class="d-flex vh-100 justify-content-center align-items-center ">
        <div class="container-fluid divcont">
            <div class="">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4 shadow rounded-3 col-sm-12 p-4 bg-light bor-red">
                        <div class="text-start d-flex justify-content-between">
                            <h2 class="border-start e-c">
                                E-Classe
                            </h2>
                            <a href = "index.php"class="btn btn-success text-center mt-2 w-10 ">
                                    Sign-in
                                </a>
                        </div>
                        <div class="text-center">
                            <h4 class="text-uppercase">Sign Up</h4>
                            <p class="h6">
                                Create a new account
                            </p>
                        </div>
                        <form action="" method="POST">
                            <div class="p-4">
                            <div class="mb-3">
                                    <label for="user" class="form-label">name</label>
                                    <input type="text" class="form-control" placeholder="Enter your User Name" name="name_user">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control" placeholder="Enter your email" name="email_user">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="password" class="form-control" placeholder="Enter your password" name="pass">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm your Password" name="pass_confirmation"value="">
                                </div>
                                <button class="btn btn-primary text-center mt-2 w-100 btn-pri" type="submit" name="insert">
                                    Sign-Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>