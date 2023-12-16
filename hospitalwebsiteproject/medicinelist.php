<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Shop</title>
    <link rel="stylesheet" href="medicine-style.css">
</head>
<body>

    <div class="banner">
        <img class="logo" src="Siam Hospital Logo (Cut).png" alt="Logo">
        <div class="navbar">
            <ul>
                <li><a href="patient-homepage.php">Go Back</a></li>
            </ul>
        </div>
    </div>
    
    <div class="content">
        <h1 style="font-weight: bold;">Welcome to Our Medication Shop</h1>
    
    
        <div id="medications">
            <div class="medication-item">
                <p><strong>Tylenol</strong> - Pain Relief (10 in stock)</p>
                <button onclick="addToCart('Tylenol')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Aspirin</strong> - Pain Relief (35 in stock)</p>
                <button onclick="addToCart('Aspirin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Ibuprofen</strong> - Anti-Inflammatory (35 in stock)</p>
                <button onclick="addToCart('Ibuprofen')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Acetaminophen</strong> - Fever Reducer (21 in stock)</p>
                <button onclick="addToCart('Acetaminophen')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Lisinopril</strong> - Blood Pressure (39 in stock)</p>
                <button onclick="addToCart('Lisinopril')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Simvastatin</strong> - Cholesterol Control (42 in stock)</p>
                <button onclick="addToCart('Simvastatin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Metformin</strong> - Diabetes Management (2 in stock)</p>
                <button onclick="addToCart('Metformin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Albuterol</strong> - Bronchodilator (5 in stock)</p>
                <button onclick="addToCart('Albuterol')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Levothyroxine</strong> - Thyroid Hormone (15 in stock)</p>
                <button onclick="addToCart('Levothyroxine')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Omeprazole</strong> - Acid Reducer (3 in stock)</p>
                <button onclick="addToCart('Omeprazole')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Warfarin</strong> - Blood Thinner (40 in stock)</p>
                <button onclick="addToCart('Warfarin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Prednisone</strong> - Immune Suppressant (49 in stock)</p>
                <button onclick="addToCart('Prednisone')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Clopidogrel</strong> - Platelet Inhibitor (38 in stock)</p>
                <button onclick="addToCart('Clopidogrel')">Contact your doctor for more information</button>
            </div>
            
            <div class="medication-item">
                <p><strong>Citalopram</strong> - Antidepressant (4 in stock)</p>
                <button onclick="addToCart('Citalopram')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Hydrochlorothiazide</strong> - Diuretic (17 in stock)</p>
                <button onclick="addToCart('Hydrochlorothiazide')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Atorvastatin</strong> - Statin (23 in stock)</p>
                <button onclick="addToCart('MAtorvastatin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Gabapentin</strong> - Nerve Pain Relief (26 in stock)</p>
                <button onclick="addToCart('Gabapentin')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Amlodipine</strong> - Calcium Channel Blocker (36 in stock)</p>
                <button onclick="addToCart('Amlodipine')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Sertraline</strong> - Antidepressant (1 in stock)</p>
                <button onclick="addToCart('Sertraline')">Contact your doctor for more information</button>
            </div>
    
            <div class="medication-item">
                <p><strong>Ranitidine</strong> - H2 Blocker (9 in stock)</p>
                <button onclick="addToCart('Ranitidine')">Contact your doctor for more information</button>
            </div>
    
        </div>
    
        </div>
    </div>
    
    <script>
        
        const medications = [
            { name: "Tylenol", description: "Pain Relief", stock: 10 },
            { name: "Aspirin", description: "Pain Relief", stock: 25 },
            { name: "Ibuprofen", description: "Anti-Inflammatory", stock: 35 },
            { name: "Acetaminophen", description: "Fever Reducer", stock: 21 },
            { name: "Lisinopril", description: "Blood Pressure", stock: 39 },
            { name: "Simvastatin", description: "Cholesterol Control", stock: 42 },
            { name: "Metformin", description: "Diabetes Management", stock: 2 },
            { name: "Albuterol", description: "Bronchodilator", stock: 5 },
            { name: "Levothyroxine", description: "Thyroid Hormone", stock: 15 },
            { name: "Omeprazole", description: "Acid Reducer", stock: 3 },
            { name: "Warfarin", description: "Blood Thinner", stock: 40 },
            { name: "Prednisone", description: "Immune Suppressant", stock: 49 },
            { name: "Clopidogrel", description: "Platelet Inhibitor", stock: 38 },
            { name: "Citalopram", description: "Antidepressant", stock: 4 },
            { name: "Hydrochlorothiazide", description: "Diuretic", stock: 17 },
            { name: "Atorvastatin", description: "Statin", stock: 23 },
            { name: "Gabapentin", description: "Nerve Pain Relief", stock: 26 },
            { name: "Amlodipine", description: "Calcium Channel Blocker", stock: 36 },
            { name: "Sertraline", description: "Antidepressant", stock: 1 },
            { name: "Ranitidine", description: "H2 Blocker", stock: 9 },
        ];
    
        function addToCart(medicationName) {
        alert(`Added ${medicationName}. Redirecting to User Login Page...`);
        window.location.href = "patient-homepage.php";
    }
    
        const medicationsContainer = document.getElementById("medications");
        medications.forEach(medication => {
            const medicationItem = document.createElement("div");
            medicationItem.classList.add("medication-item");
    
            const medicationInfo = document.createElement("p");
            medicationInfo.innerHTML = `<strong>${medication.name}</strong> - ${medication.description} (${medication.stock} in stock)`;
    
            const addToCartButton = document.createElement("button");
            addToCartButton.textContent = "Contact your doctor for more information";
            addToCartButton.addEventListener("click", () => addToCart(medication));
    
            medicationItem.appendChild(medicationInfo);
            medicationItem.appendChild(addToCartButton);
            medicationsContainer.appendChild(medicationItem);
        });
    </script>
    
    </body>
    </html>
    