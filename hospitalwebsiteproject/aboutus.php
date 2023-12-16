<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>

        .doctors-table {
            margin-top: 20px;
            margin-left: 370px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 70%;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
        background-color: #3498db;
        color: #fff;
    }

    table tbody tr {
        background-color: grey;
    }
    </style>
        </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="banner">
        <div class = "navbar">
            <div class = "logo">
                <a href="mainpage.html">
                    <img src="Siam Hospital Logo (Cut).png" alt="">
                </a></div>
            <ul>
                <li><a href="mainpage.html">Home</a></li>
                <li><a href="services.html">Our Services</a></li>
                <li><a href="aboutus.php">Our Doctors</a></li>

            </ul>
        </div>
        <div class = "btn-group">
            <a href="doctors.html"><button>Doctors</button></a>
            <a href="patients.html"><button>Patients</button></a>
        </div>
    <div class="content">
        <h1>ABOUT OUR DOCTORS</h1>

        <div class="doctors-table">
            <table>
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'hospital_connect.php';
                    $sqlDoctors = "SELECT doctor_name, email FROM doctors";
                    $resultDoctors = $conn->query($sqlDoctors);

                    if ($resultDoctors->num_rows > 0) {
                        while ($rowDoctor = $resultDoctors->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$rowDoctor['doctor_name']}</td>";
                            echo "<td>{$rowDoctor['email']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No doctors available</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
