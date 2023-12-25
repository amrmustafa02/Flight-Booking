<?php
include("../../connection.php");


//$id = $_POST['id'];
$err = "";
$sql = "SELECT * FROM passenger WHERE passengerId = '2'";

$result = mysqli_query($conn,$sql);
$r = mysqli_num_rows($result);
if(!$r)
{
    $err = "id not found";
}
else{
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $messageBy = $_POST['messageBy'] = $rows["name"];
    $messageTo = $_POST['messageTo'];
    $content = $_POST['content'];

    $sql = "select * from company where name = '$messageTo'";
    $result2 = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result2);
    if(!$count)
    {
        $err = "company not found";
    }
    else{
        $sql = " INSERT into messages(content,messageBy,messageTo) values('$content','$messageBy','$messageTo')";

    }


    
    
     


}





// message from passenger to company
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

// $content = $_POST['content'];
// $messageBy = $_POST['messageBy'];
// $messageTo = $_POST['messageTo'];

// $sql = "select * from passenger where name = '$name' and ";


}


?>




<?php
// page of company to show its messages 
$id = $_GET['id'];

$err = "";
$sql = "SELECT * FROM company WHERE companyId = '$id'";

$result = mysqli_query($conn,$sql);

$rows = mysqli_num_rows($result);

if(!$rows)
{
    $err = "id not found";
}else{
    $sql = "SELECT * from messages where messagesId = '$id";
    // show info here
    $result = mysqli_query($conn,$sql);
    $r = mysqli_fetch_all($result);
}




$sql = ""; 


?>