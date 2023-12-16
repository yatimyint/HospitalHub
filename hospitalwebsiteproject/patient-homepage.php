<?php
session_start();

if (!isset($_SESSION["email"])) {
    echo "Error: User not logged in.";
    exit();
}

include 'upcoming-appointments.php';
include 'hospital_connect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Homepage</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class = "navbar">
            <ul>
                <li><a href="medicinelist.php">Our Pharmacy</a></li>
            </ul>
        </div>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo $_SESSION["patient_name"]; ?>!</h1>
            <p id="currentDate"></p>
            <button><a href="logout.php">Logout</a></button>
        </header>
        <section class="sidebar">
            <h2>Upcoming Appointments</h2>
            <ul class="appointments-list">
                <?php foreach ($upcomingAppointments as $appointment) : ?>
                    <li class="appointment-item">
                        Appointment with Dr. <?php echo $appointment['doctor_name']; ?> - Date and Time: <?php echo $appointment['appointment_date']; ?>
                        <input type="checkbox" class="checkbox">
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="main-content">
            <h2>Book an Appointment</h2>
            <center>
            <form action="book-appointment.php" method="post">
            <label for="appointment_datetime">Appointment Date and Time:</label>
            <input type="datetime-local" id="appointment_datetime" name="appointment_datetime" required>
            <br>    
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor" required>
                <?php
                $sql = "SELECT doctor_name FROM doctors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["doctor_name"] . "'>" . $row["doctor_name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No doctors available</option>";
                }

                $conn->close();
                ?>
            </select>
        <input type="submit" value="Book Appointment">
            </form>
        </section>
            </center>
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