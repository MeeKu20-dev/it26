<?php

require_once("database.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

if(isset($_COOKIE['mycookie'])) {
        $id = $_COOKIE['mycookie'];
        $sql = "SELECT * FROM (SELECT x.patientID, y.fullname AS 'patname', age AS 'age', birthday AS 'bday', gender AS 'gen', blood_type AS 'btype', address AS 'add', y.phone_number AS 'patnum', y.email AS 'patemail', x.fullname AS 'emename', x.phone_number AS 'emenum', x.email AS 'emeemail', relationship AS 'relation' FROM (SELECT patient.patientID, emergency_contact.fullname, emergency_contact.phone_number, emergency_contact.email, emergency_contact.relationship FROM emergency_contact INNER JOIN patient ON emergency_contact.em_contactId=patient.em_contactId) AS x INNER JOIN (SELECT patient.patientID, CONCAT( patient.fn, ' ', patient.mi, '. ', patient.ln) AS 'fullname', patient.age, patient.birthday, patient.gender, patient.blood_type, contact_info.address, contact_info.phone_number, contact_info.email FROM patient INNER JOIN contact_info ON patient.contactID=contact_info.contactId) AS y ON x.patientID=y.patientID) AS z WHERE z.patientID='$id';";
        $result = mysqli_query($con, $sql);
        $user_data = mysqli_fetch_assoc($result);
}


if($user_data) {
    $patid = $user_data['patientID'];
    $patname = $user_data['patname'];
    $age = $user_data['age'];
    $bday = $user_data['bday'];
    $gender = $user_data['gen'];
    $btype = $user_data['btype'];
    $address = $user_data['add'];
    $patnum = $user_data['patnum'];
    $patmail = $user_data['patemail'];
    $emename = $user_data['emename'];
    $emenum = $user_data['emenum'];
    $ememail = $user_data['emeemail'];
    $relation = $user_data['relation'];
}

$html = '';
$html .= '
    <h2 aligh="left">Patient\'s Personal Data</h2>
    <hr>
    <table style="width:100%"; border-collapse:collapse;">
        <tr>
            <td><strong>Patient ID: </strong> '.$patid.'</td>
            <td><strong>Fullname: </strong>'.$patname.'</td>
            <td><strong>Age: </strong>'.$age.'</td>
            <td><strong>Birthday: </strong>'.$bday.'</td>
        </tr>
    ';
$html .= '
        <tr>
            <td><strong>Gender: </strong>'.$gender.'</td>
            <td><strong>Blood Type: </strong>'.$btype.'</td>
            <td colspan="2"><strong>Address: </strong>'.$address.'</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Contact Number: </strong>'.$patnum.'</td>
            <td colspan="2"><strong>Email: </strong>'.$patmail.'</td>
        </tr>
    </table>
    ';
$html .= '   
    <h3>Emergency Contact</h3>
    <table style="width:100%"; border-collapse:collapse;">
        <tr>
            <td colspan="2"><strong>Fullname: </strong>'.$emename.'</td>
            <td colspan="2"><strong>Contact Number: </strong>'.$emenum.'</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Email: </strong>'.$ememail.'</td>
            <td colspan="2"><strong>Relationship: </strong>'.$relation.'</td>
        </tr>
    </table>
    ';
$html .= '
    <h3><strong>Medical History</strong></h3>
    <table style="width:100%">
    ';
            $query = mysqli_query($con, "SELECT * FROM `admission` WHERE `patientID` = '$patid'");
            while ($row = mysqli_fetch_array($query)) {
                $html .= '
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align:center; background-color:#a6a4a4; color:#000">Admission Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align:left">Admission Number:</th>
                            <td>'.$row['AdmissionNo'].'</td>
                        </tr>    
                        <tr>
                            <th style="text-align:left">Admission Date:</th>
                            <td>'.$row['admdate'].'</td>
                        </tr>    
                        <tr>
                            <th style="text-align:left">Patient ID:</th>
                            <td>'.$row['patientID'].'</td>
                        </tr>    
                        <tr>
                            <th style="text-align:left">Doctor ID:</th>
                            <td>'.$row['doctorID'].'</td>
                        </tr>    
                        <tr>
                            <th style="text-align:left">Illness:</th>
                            <td>'.$row['illness'].'</td>
                        </tr>
                    ';
            }
$html .= '</table>';
$html .= '
    <h3><strong>Prescriptions</strong></h3>
    <table style="width:100%">
    <tr>
        <th colspan="2" style="text-align:center; background-color: #a6a4a4; color:#000">Prescription Details</th>
    </tr>
    ';
    $admission_numbers = array();
    $query = mysqli_query($con, "SELECT `AdmissionNo` FROM `admission` WHERE `patientID` = '$patid';");
    while ($row = mysqli_fetch_array($query)) {
        $old_admission_numbers[] = $row['AdmissionNo'];
    }
    foreach($old_admission_numbers as $ids){
        $query = mysqli_query($con, "select * from `prescription` WHERE `AdmissionNo` = '$ids'");
        while ($row = mysqli_fetch_array($query)) {
        $html .= '
        <tr>
            <th style="text-align:left">Med Code:</th>
            <td>'.$row['medcode'].'</td>
        </tr>
        <tr>
            <th style="text-align:left">Dosage:</th>
            <td>'.$row['dosage'].'</td>
        </tr>
        ';
        }
    }
$html .= '
</tbody>
</table>
';
        
$domppdf = new DOMPDF();
$domppdf->loadHtml($html);
$domppdf->setPaper("A4", "portrait");
$domppdf->render();
$domppdf->stream("data.pdf");
?>