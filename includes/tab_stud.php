<?php 
$tab_stud = file_get_contents("../users/tab_stud.json");
$tab_stud = json_decode($tab_stud,true);


foreach ($tab_stud as $tabb){

echo '<tr class="mt-2">

<th scope="row">
    <img src="../assets/img/profile.png" alt="Pro-img" width="65" height="55">
</th>
<td class="align-middle">'.$tabb['Name'].'</td>
<td class="align-middle">'.$tabb['Email'].'</td>
<td class="align-middle">'.$tabb['Phone'].'</td>
<td class="align-middle">'.$tabb['Enroll_number'].'</td>
<td class="align-middle">'.$tabb['Date_of_admission'].'</td>
<td class="text-primary align-middle">
    <i class="fas fa-pen pe-3"></i>
    <i class="fas fa-trash"></i>
</td>
</tr>';

}
?>