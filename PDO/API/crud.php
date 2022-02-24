                                                                    <!-- Connexion en PDO -->

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=e_class_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


                                                                            <!-- insert en PDO -->

<?php
    include '../crud/conection.php';


function create($name,$email,$phone,$enroll_number,$date_of_admission){
    global $conn;
    if($conn){
        $query= "INSERT INTO student(name,email,phone,enroll_number,date_of_admission) values(:name,:email,:phone,:enroll_number,:date_of_admission)";
        $statement=$conn->prepare($query);

    $statement->execute([

            ':name'=>$name,
            ':email'=>$email,
            ':phone'=>$phone,
            ':enroll_number'=>$enroll_number,
            ':date_of_admission'=>$date_of_admission,
            ]);
    }
}


?>
                                                                <!-- select en PDO -->
<?php
    include 'conection.php';

    function select(){
        global $conn;
    
        if($conn){
            $query='SELECT *FROM student';
            $statement = $conn -> prepare($query);
    
            $statement-> execute();
    
            return $statement->fetchAll();
        }
    }
    ?>

                                                                <!-- delete en PDO -->

<?php
   include 'conection.php';
   if(isset($_GET['id']) && !empty($_GET['id']))
   {
  $id = $_GET['id'];
        global $conn;
        
        if($conn){
            $query="DELETE FROM `courses` where `id_c`=:id";
            $statement=$conn->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement ->execute();
    
            header('location:../view/courses.php');
        }
    }

?>

                                                        <!-- update en PDO -->
<?php
    include 'conection.php';
    $id=$_GET ['id'];
        if(isset($_POST['save'])) {
        global $conn;
        if($conn){
            $query=("UPDATE student set name=:name,email=:email,phone=:phone,enroll_number=:enroll_number,date_of_admission=:date_of_admission WHERE id=$id");
            // $query ->bindParam(1,name_img);
            // $query ->bindParam(2,type_img);
            // $query ->bindParam(3,data_img);
            $statement=$conn->prepare($query);
            $statement ->execute([
                // 'name_img'=> $_FILES['img']['name'],
                // ':type_img'=> $_FILES['img']['type'],
                // ':data_img'=> file_get_contents($_FILES['img']['tmp_name']),
                ':name'=>$_POST['name'],
                ':email'=>$_POST['email'],
                ':phone'=>$_POST['phone'],
                ':enroll_number'=>$_POST['enroll_number'],
                ':date_of_admission'=>$_POST['date_of_admission'],
                
            ]);
                header('location:../view/student.php');
            }
        }
?>




