<?php


session_start();

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

include 'hospital_connect.php';

$doctor_email = $_SESSION["email"];

$sqlDoctor = "SELECT doctor_id FROM doctors WHERE email = '$doctor_email'";
$resultDoctor = $conn->query($sqlDoctor);

if ($resultDoctor->num_rows > 0) {
    $rowDoctor = $resultDoctor->fetch_assoc();
    $doctor_id = $rowDoctor["doctor_id"];

    $sqlUpcomingAppointments = "SELECT a.appointment_date, p.patient_name
                                FROM appointments a
                                INNER JOIN patients p ON a.patient_id = p.patient_id
                                WHERE a.doctor_id = '$doctor_id'
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
    echo "Error fetching doctor ID.";
}

$conn->close();
?>
