<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus1.css">
</head>
<body>
    <div class="container">
        <h1>Pet care</h1>
        <div class="items">
            <a  href="premiere1.html" id="home">Home</a>
            <a href="service1.html" id="services">Services</a>
            <a href="contactus1.php"  id="contactus">Contact Us</a>
        </div></div>
        <div class="formulaire">
            <form action="" method="post" id="contactForm">
                <label  class="label" for="userinput">Lastname</label><br>
                <input placeholder="Last Name" id="userinput" name="userinput" type="text"><br>

                <label class="label" for="username">First Name</label><br>
                <input  placeholder="First Name" type="text" name="username" id="username"><br>

                <label  class="label" for="mail">e-mail address</label><br>
                <input  placeholder="e-mail" id="mail" type="text"  name="mail"><br>

                <label class="label" for="num">Phone number</label><br>
                <input placeholder="+216" type="number" name="num" id="num"><br>

                <label  class="label"for="s">service</label><br>
                <select name="s" id="s" >
                    <option value="vaccination" selected>Vaccination</option>
                    <option value="groom">Groom</option>
                    <option value="walk">Walk</option></select><br>

                    <input id="b2" type="submit" name="submit" value="submit"><br>
                    <input id="b1"  type="button" value="cancel"><br>
            </form>
            <?php
if (isset($_POST['submit'])) {
    //echo "Hello";

    // Get and sanitize user input
    $userinput = $_POST["userinput"];
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $num = $_POST["num"];
    $s = $_POST["s"];

    // Database credentials
    $host = "localhost";
    $dbname = "projetweb";
    $us = "root";
    $password = "";

    // Connect to the database
    $conn = new mysqli($host, $us, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO donees (userinput, username, mail, num, s) VALUES (?, ?, ?, ?, ?)");
    
    // Bind parameters (s for string, i for integer)
    $stmt->bind_param("sssis", $userinput, $username, $mail, $num, $s);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
            <img class="im2" src="img10.png">
        </div>
        <footer>
            <div class="adresse">
                <p id="address">Address<br>
                    1234 Main Street, Suite 200<br>
                    Los Angeles, CA 90015<br>
                     United States
                </p>
            </div>
            <div class="liens">
                <img id="instagram" src="instagram.png">
                <img id="facebook" src="facebook.png">
                <img id="tiktok" src="tiktok.png">
            </div>
            <div class="horaire">
                BUSINESS HOURS<br>
              MON-FRI 9:00 AM - 7:00 PM<br>
              SAT 9:00 AM - 1:00 PM<br>
               SUN 10:00 AM - 12:00 PM
            </div>
            
        </footer>
        <script>
        function submitForm() {
          
            const userinput = document.getElementById('userinput').value;
            const username = document.getElementById('Username').value;
            const mail = document.getElementById('mail').value;
            const num = document.getElementById('num').value;
          
            // Vérification des noms contenant uniquement des lettres
            if (!/^[a-zA-Z]+$/.test(userinput) || !/^[a-zA-Z]+$/.test(username)) {
              alert("Last Name and First Name must contain only letters.");
              return false;
            }
          
            // Vérification de l'adresse e-mail
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Valide une adresse e-mail
            if (!emailRegex.test(mail)) {
              alert("Please enter a valid email address.");
              return false;
            }
          
            // Vérification du numéro de téléphone (8 chiffres)
            const phoneRegex = /^\d{8}$/; // Valide un numéro de téléphone de 8 chiffres
            if (!phoneRegex.test(num)) {
              alert("Please enter a valid phone number (8 digits).");
              return false;
            }
          
            // Si toutes les validations réussissent, soumettre le formulaire
            alert("Form submitted successfully!"); // Affiche un message de succès
            document.getElementById('contactForm').submit(); // Soumet le formulaire
            return true;
          }
          
          // Fonction pour effacer les valeurs du formulaire
          function clearForm() {
            document.getElementById('contactForm').reset();
          }
          
          // Associe les fonctions aux boutons
          document.getElementById('b1').addEventListener('click', clearForm);
          document.getElementById('b2').addEventListener('click', submitForm);
        </script>
</body>
</html>