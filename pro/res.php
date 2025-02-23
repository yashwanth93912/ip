<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '12345';
    $dbname = "restaurant";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date= isset($_POST['date']) ? $_POST['date'] : '';
        $Restaurant = isset($_POST['Restaurant']) ? $_POST['Restaurant'] : '';
        $time = isset($_POST['time']) ? $_POST['time'] : '';
        $Number_of_guests = isset($_POST['Number_of_guests']) ? $_POST['Number_of_guests'] : '';
        $tables = isset($_POST['tables']) ? $_POST['tables'] : '';

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO bookings (date,Restaurant,time,Number_of_guests,tables) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $date, $Restaurant, $time, $Number_of_guests, $tables);

        // Execute
        $stmt->execute();

        echo "<span class='success-message'>Booked successfully!</span>";
        
        $stmt->close();
    }

    $conn->close();
    ?>