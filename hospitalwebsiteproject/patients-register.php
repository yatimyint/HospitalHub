<?php
    session_start();
    include 'hospital_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'hospital_connect.php';
    
        $full_name = $_POST["patient_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        $result = $conn->query("SELECT MAX(patient_id) as max_id FROM patients");
        $row = $result->fetch_assoc();
        $max_id = $row['max_id'];

        $patient_id = $max_id + 1;
        
        $stmt = $conn->prepare("INSERT INTO patients (patient_id, patient_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $patient_id, $full_name, $email, $password);
    
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registration Successful, Login Now!";
        }
    
        $stmt->close();
        $conn->close();
    }
    
    ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
    <header>
        <div class="banner">
            <div class="navbar">
                <div class="logo">
                    <a href="mainpage.html">
                        <img src="Siam Hospital Logo (Cut).png" alt="Hospital Logo">
                    </a>
                </div>
                <ul>
                    <li><a href="mainpage.html">Home</a></li>
                    <li><a href="services.html">Our Services</a></li>
                    <li><a href="aboutus.php">Our Doctors</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <a href="doctors.html"><button>Doctors</button></a>
                <a href="patients.html"><button>Patients</button></a>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="register-box">
        <h2 style="color:#fffff;">PATIENT REGISTRATION</h2>
        <?php
            if (isset($_SESSION['success_message'])) {
                echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                unset($_SESSION['success_message']);
            }
            ?>
            <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" placeholder="Full Name" name="patient_name" required>
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit">REGISTER</button>
       
    </form>
        </div>
        </div>
        </div>

</body>
</html>