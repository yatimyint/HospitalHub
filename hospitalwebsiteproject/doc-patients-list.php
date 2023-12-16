<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

include 'hospital_connect.php';

$doctor_email = $_SESSION["email"];

$sqlDoctor = "SELECT doctor_id, doctor_name FROM doctors WHERE email = '$doctor_email'";
$resultDoctor = $conn->query($sqlDoctor);

if ($resultDoctor->num_rows > 0) {
    $rowDoctor = $resultDoctor->fetch_assoc();
    $doctor_id = $rowDoctor["doctor_id"];
    $doctor_name = $rowDoctor["doctor_name"];

    $sqlPatients = "SELECT p.patient_name
                    FROM patients p
                    INNER JOIN appointments a ON p.patient_id = a.patient_id
                    WHERE a.doctor_id = '$doctor_id'
                    GROUP BY p.patient_id";

    $resultPatients = $conn->query($sqlPatients);

    if ($resultPatients) {
        if ($resultPatients->num_rows > 0) {
            $patientsList = $resultPatients->fetch_all(MYSQLI_ASSOC);
        } else {
            $patientsList = array();
        }
    } else {
        echo "Error fetching patient list: " . $conn->error;
    }
}
    $conn->close();

?>