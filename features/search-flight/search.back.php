<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cityFrom = $_POST['fromCity'];
    $cityTo = $_POST['toCity'];


    //TODO: search in database


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
//    echo '</div>';
}