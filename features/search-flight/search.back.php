<?php
$err = "";
include "../../connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cityFrom = $_POST['fromCity'];
    $cityTo = $_POST['toCity'];


    //TODO: search in database
    $query = "SELECT * FROM flight WHERE itineraryFrom='$cityFrom' AND itineraryTo='$cityTo' AND cancelled=false";
    $results = mysqli_query($conn, $query);
    
    if ($results) {
        // Check if there are rows in the result set
        if (mysqli_num_rows($results) > 0) {
            // Loop through the result set
            while ($row = mysqli_fetch_assoc($results)) {
                $name = $row['name'];
                $time_start=$row['start_time'];
                $time_end=$row['end_time'];
                // Echo the flight name
                echo "<p>Name: $name</p>";
                echo "<p>time_start: $time_start</p>";
                echo "<p>time_end: $time_end</p>";
            }
        } else {
            // No matching flights found
            echo "No matching flights found.";
        }
    } else {
        // Handle query error
        echo "Error retrieving flight names: " . mysqli_error($conn);
    }
    // appear ui here
    // Sample array of items
    $listItems = array("Item 1", "Item 2", "Item 3", "Item 4", "Item 5");



    // Display the list in HTML
    // Loop to add items to the array
    for ($i = 1; $i <= 5; $i++) {
        $item = array(
            'id' => $i,
            'name' => 'Item ' . $i,
            'time_start' => 'Start Time ' . $i,
            'time_end' => 'End Time ' . $i
        );
        // Add the item to the array
        $items[] = $item;
    }


// Display the table in HTML
    echo "<div class='table-container'>";
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Time Start</th>';
    echo '<th>Time End</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($items as $item) {
        echo '<tr>';
        echo '<td>' . $item['id'] . '</td>';
        echo '<td>' . $item['name'] . '</td>';
        echo '<td>' . $item['time_start'] . '</td>';
        echo '<td>' . $item['time_end'] . '</td>';
        echo
        '<td> 
                    <button class="reserve-button">Reserve</button>
                    <button class="login-button">Info</button>
         </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}