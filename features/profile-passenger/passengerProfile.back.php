<?php
include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
$err = "";
    $id = $_POST['id'];

    $sql = "select * from passenger where passengerId = '$id' and ";
    $result = mysqli_query($conn,$sql);
    echo mysqli_fetch_all($result); // show info ? nshoof deh htl3 ehh brdo

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            // Display specific information from the fetched rows
            echo $row['passengerId'] . "<br>";
            echo $row['name'] . "<br>";
            echo $row['email'] . "<br>";
            echo $row['tel'] . "<br>";
            echo $row['account'] . "<br>";
            echo $row['password'] . "<br>"; //n3ml verify lel password w n3mlo show aw mn3rfsh hn3ml show lel password wla l2
            
            echo "<hr>"; // Separate each result
        }
    } else {
        echo "No results found.";
        $err = "No results found.";
    }
    
   
    
    
    }

?>