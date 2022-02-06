<?php 
$tab_pay = file_get_contents("../users/tab_pay.json");
$tab_pay = json_decode($tab_pay,true);

    foreach ($tab_pay as $tabpay){
            echo '<tr>
            <td>'.$tabpay['Name'].'</td>
            <td>'.$tabpay['Payment_Shedule'].'</td>
            <td>'.$tabpay['Bill_Number'].'</td>
            <td>'.$tabpay['Amount_Paid'].'</td>
            <td>'.$tabpay['Balance_Amount'].'</td>
            <td>'.$tabpay['Date'].'</td>
            <td><i class="far fa-eye text-primary"></i></td>
        </tr>';


    }
    ?>