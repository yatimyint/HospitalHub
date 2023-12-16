<?php

session_start();
include 'hospital_connect.php';

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_datetime = $_POST["appointment_datetime"];
    $doctor = $_POST["doctor"];
    $patient_email = $_SESSION["email"];

    $sqlMaxId = "SELECT MAX(SUBSTRING(appointment_id, 2)) AS max_id FROM appointments";
    $resultMaxId = $conn->query($sqlMaxId);
    $rowMaxId = $resultMaxId->fetch_assoc();
    $max_id = $rowMaxId["max_id"];

    $next_id = $max_id ? ++$max_id : 1;
    $appointment_id = "A" . $next_id;

    $sqlPatient = "SELECT patient_id FROM patients WHERE email = '$patient_email'";
    $resultPatient = $conn->query($sqlPatient);
    $rowPatient = $resultPatient->fetch_assoc();
    $patient_id = $rowPatient["patient_id"];

    $sqlDoctor = "SELECT doctor_id FROM doctors WHERE doctor_name = '$doctor'";
    $resultDoctor = $conn->query($sqlDoctor);
    $rowDoctor = $resultDoctor->fetch_assoc();
    $doctor_id = $rowDoctor["doctor_id"];

    $sqlInsert = "INSERT INTO appointments (appointment_id, patient_id, doctor_id, appointment_date)
                  VALUES ('$appointment_id', '$patient_id', '$doctor_id', '$appointment_datetime')";

    if ($conn->query($sqlInsert) === TRUE) {
        header("Location: patient-homepage.php");
        exit();
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
