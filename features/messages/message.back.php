<?php
include("../../connection.php");


// $id = $_COOKIE['id'];
//$id = $_POST['id'];
$err = "";
$sql = "SELECT * FROM passenger WHERE passengerId = '1'";  // $id

$result = mysqli_query($conn,$sql);
$r = mysqli_num_rows($result);
if(!$r)
{
    echo "id not found";
    $err = "id not found";
}
else{
    // to get single value from first index 
    //$rowss = mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo "hona yarkod hazal2oom";
    //echo $rows;
    echo "<br>";
    echo "qweqwqw <br>";
    //$rows = mysqli_fetch_assoc($result);
    $messageBy;
    while($rows = mysqli_fetch_assoc($result))
    {
        echo $rows['name'] ; echo "<br>";
        $messageBy = $rows["name"];
        echo $rows['passengerId']; echo "<br>";
        echo $rows['email']; echo "<br>";
    }
    // $messageBy = $_POST['messageBy'] = $rows["name"];
    // $messageTo = $_POST['messageTo'];
    // $content = $_POST['content'];
   
  
   $messageTo = "kansas";
    $content = "hey kansass";
echo "<br>";
    echo $messageBy;
    echo "<br>";
    $sql = "select * from company where name = '$messageTo'";
    $result2 = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result2);
    if(!$count)
    {
        echo "company not found";
        $err = "company not found";
    }
    else{
        echo "sdsd";
        $sql = " INSERT into messages(content,messageBy,messageTo) values('$content','$messageBy','$messageTo')";
        $result = mysqli_query($conn,$sql);
    }


    
    
     


}





// message from passenger to company
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

// $content = $_POST['content'];
// $messageBy = $_POST['messageBy'];
// $messageTo = $_POST['messageTo'];

// $sql = "select * from passenger where name = '$name' and ";


//}


?>





