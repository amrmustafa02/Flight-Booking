<?php

include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    $err = "";
    $id = $_GET['id'];

    $sql = "select * from company where companyId = '$id' and ";
    $result = mysqli_query($conn,$sql);
    //echo mysqli_fetch_all($result); // show info ? exho t2reban msh htsht8l m3 function deh

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the rows and display the information
        while ($row = mysqli_fetch_assoc($result)) {
            // Display specific information from the fetched rows
            echo $row['companyId'] . "<br>";
            echo $row['companyName'] . "<br>";
            echo $row['otherColumn'] . "<br>";
            // Add more lines to display other columns as needed
            echo "<hr>"; // Separate each result
        }
    } else {
        echo "No results found.";
        $err = "";
    }


   
    
   
    
    
    }

?>