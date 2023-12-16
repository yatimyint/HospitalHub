<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

include 'doc-upcoming-appointments.php';
include 'doc-patients-list.php';
include 'hospital_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Homepage</title>
    <link rel="stylesheet" href="style2.css">

</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, Dr. <?php echo $_SESSION["doctor_name"]; ?></h1>
            <p id="currentDate"></p>
            <button><a href="doctor-logout.php">Logout</a></button>
        </header>
        
        <section class="sidebar">
        <h2>Your Patients</h2>
        <ul>
        <?php foreach ($patientsList as $patient) : ?>
            <li><?php echo $patient['patient_name']; ?></li>
        <?php endforeach; ?>
        </ul>
    </section>

    <section class="main-content">
        <h2>Upcoming Appointments</h2>
        <ul class="appointments-list">
        <?php foreach ($upcomingAppointments as $appointment) : ?>
                    <li class="appointment-item">
                        Appointment with Patient <?php echo $appointment['patient_name']; ?> - Date and Time: <?php echo $appointment['appointment_date']; ?>
                        <input type="checkbox" class="checkbox">
                    </li>
                <?php endforeach; ?>
        </ul>
    </section>
</div>
    <script>
  
    document.getElementById("currentDate").textContent = getCurrentDate();

    function getCurrentDate() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return now.toLocaleDateString('en-US', options);
    }
</script>
</body>
</html>