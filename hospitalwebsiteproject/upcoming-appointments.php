<?php


session_start();

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

include 'hospital_connect.php';

$patient_email = $_SESSION["email"];

$sqlPatient = "SELECT patient_id FROM patients WHERE email = '$patient_email'";
$resultPatient = $conn->query($sqlPatient);

if ($resultPatient->num_rows > 0) {
    $rowPatient = $resultPatient->fetch_assoc();
    $patient_id = $rowPatient["patient_id"];

    $sqlUpcomingAppointments = "SELECT a.appointment_date, d.doctor_name
                                FROM appointments a
                                INNER JOIN doctors d ON a.doctor_id = d.doctor_id
                                WHERE a.patient_id = '$patient_id'
                                ORDER BY a.appointment_date ASC";

    $resultUpcomingAppointments = $conn->query($sqlUpcomingAppointments);

    if ($resultUpcomingAppointments) {
        if ($resultUpcomingAppointments->num_rows > 0) {
            $upcomingAppointments = $resultUpcomingAppointments->fetch_all(MYSQLI_ASSOC);
        } else {
            $upcomingAppointments = array();
        }
    } else {
        echo "Error fetching upcoming appointments: " . $conn->error;
    }
} else {
    echo "Error fetching patient ID.";
}

$conn->close();
?>
