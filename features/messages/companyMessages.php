
<?php

include("../../connection.php");
 // page of company to show its messages 
// $id = $_GET['id'];
//$id = $_COOKIE['id'];
echo "hena";
$err = "";
$sql = "SELECT * FROM company WHERE companyId = 2"; // a7ot id elgeh mn cookies hena $id

$result = mysqli_query($conn,$sql);

$rows = mysqli_num_rows($result);



if(!$rows)
{
    echo "id not found <br>";
    $err = "id not found";
}else{
    // hena atl3 meno esm company
   $r = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $sql = "SELECT * from messages where messageTo = 'kansas' "; // hena n7ot $r['messageTo]
    // show info here
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
    if ($result && mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo $row['content'] . "<br>";
            echo $row['messageBy'] . "<br>";
            echo "<hr>"; 
        }
    } else {
        echo "No messages found.";
        $err = "No messages found.";
    }
    
   // echo $r[0];
}




// $sql = "";  
?>
