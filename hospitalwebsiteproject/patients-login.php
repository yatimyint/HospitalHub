<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (email === "" || password === "") {
                alert("Both your email and password are required");
                return false;
            }
            <?php
                session_start();
                include 'hospital_connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["email"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM patients WHERE email = '$username' AND password = '$password'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $userData = $result->fetch_assoc();

                        $_SESSION["email"] = $username;
                        $_SESSION["patient_name"] = $userData["patient_name"];

                        header("Location: patient-homepage.php");
                        exit();
                    } else {
                        $error_message = "Invalid Username or Password";
                    }
                }
            ?>
            return true;
        }
    </script>
</head>
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
        <br><br>
        <div class="register-box">
            <h2 style="color:#fffff;">PATIENTS LOGIN</h2>
            <br>
                <?php
                if (isset($error_message)) {
                    echo '<p style="color: red;">' . $error_message . '</p>';
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                    <input type="text" placeholder="Email" name="email">
                    <br>
                    <input type="password" placeholder="Password" name="password">
                    <br>
                    <button type="submit">LOGIN</button>
                </form>
        </div>
        </div>
        </div>

</body>
</html>
