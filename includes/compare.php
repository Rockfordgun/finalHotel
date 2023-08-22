<!DOCTYPE html>
<html>

<head>
    <title>Room Comparison</title>
</head>

<body>
    <h1>Room Comparison</h1>
    <div>
        <form method="post">
            <label for="room1">Select Room 1:</label>
            <select name="room1" id="room1">
                <option value="Deluxe Ocean View Suite">Deluxe Ocean View Suite</option>
                <option value="Luxury Garden Terrace">Luxury Garden Terrace</option>
                <option value="Ocean Breeze Room">Ocean Breeze Room</option>
                <!-- Add more room options as needed -->
            </select>
            <br>
            <label for="room2">Select Room 2:</label>
            <select name="room2" id="room2">
                <option value="Deluxe Ocean View Suite">Deluxe Ocean View Suite</option>
                <option value="Luxury Garden Terrace">Luxury Garden Terrace</option>
                <option value="Ocean Breeze Room">Ocean Breeze Room</option>
                <!-- Add more room options as needed -->
            </select>
            <br>
            <input type="submit" name="compare" value="Compare">
        </form>
    </div>

    <?php
    if (isset($_POST['compare'])) {
        $roomType1 = $_POST['room1'];
        $roomType2 = $_POST['room2'];

        // Establish a database connection
        $servername = "your_server_name";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to get room attributes
        function getRoomAttributes($conn, $roomType)
        {
            $sql = "SELECT * FROM rooms WHERE room_type = '$roomType'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return null;
            }
        }

        $room1Attributes = getRoomAttributes($conn, $roomType1);
        $room2Attributes = getRoomAttributes($conn, $roomType2);

        if ($room1Attributes && $room2Attributes) {
            echo "<h2>Comparison between $roomType1 and $roomType2</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Attribute</th><th>$roomType1</th><th>$roomType2</th></tr>";
            echo "<tr><td>Number of Persons</td><td>{$room1Attributes['num_persons']}</td><td>{$room2Attributes['num_persons']}</td></tr>";
            echo "<tr><td>View</td><td>{$room1Attributes['view']}</td><td>{$room2Attributes['view']}</td></tr>";
            echo "<tr><td>Number of Beds</td><td>{$room1Attributes['num_beds']}</td><td>{$room2Attributes['num_beds']}</td></tr>";
            echo "<tr><td>WiFi</td><td>" . ($room1Attributes['wifi'] ? 'Yes' : 'No') . "</td><td>" . ($room2Attributes['wifi'] ? 'Yes' : 'No') . "</td></tr>";
            echo "<tr><td>Price</td><td>{$room1Attributes['price']}</td><td>{$room2Attributes['price']}</td></tr>";
            echo "<tr><td>Airport Pickups</td><td>" . ($room1Attributes['pickups'] ? 'Yes' : 'No') . "</td><td>" . ($room2Attributes['pickups'] ? 'Yes' : 'No') . "</td></tr>";
            echo "</table>";
        } else {
            echo "One or both rooms not found.";
        }

        // Close the connection
        $conn->close();
    }
    ?>
</body>

</html>