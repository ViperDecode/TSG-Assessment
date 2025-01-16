<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "cars"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query
$sql = "SELECT id, model_name, DATE_FORMAT(date_created, '%d %b %Y %l:%i %p') AS formatted_date, manufacture FROM cars";
$result = $conn->query($sql);

// HTML Output
echo "<table border='1'>
        <tr>
            <th>id</th>
            <th>Model name</th>
            <th>date created</th>
            <th>manufacture</th>
        </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["model_name"] . "</td>
                <td>" . $row["formatted_date"] . "</td>
                <td>" . $row["manufacture"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
echo "</table>";

$conn->close();
?>