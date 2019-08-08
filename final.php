<?php

$send=$_POST['sender'];
$recv=$_POST['recv'];
$amount=$_POST['amount'];

$db = mysqli_connect('localhost', 'root', '', 'Credit_Management');          
$sql= "select credit from user where email = '$send';";
$result = mysqli_query($db, $sql);
$balance=mysqli_fetch_assoc($result)['credit'];
if($amount>$balance)
{
    echo '<div><h1>You Have Insufficient Balance !!!!<h1></div>';
    echo '<h1>Existing credit : ',$balance;
    //echo "$balance";
    echo nl2br("\n");
    echo "Requested credit : ",$amount;
}
    
else
{ 
    $sql1= "update user set credit=credit+'$amount' where email = '$recv';";
    $sql2= "update user set credit=credit-'$amount' where email = '$send';";
    $sql3= "insert into `transfers`(from_user,to_user,amount) values('$send','$recv','$amount');";
    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    if (mysqli_query($db, $sql3)) {
        echo "New record created successfully";
    } else 
        echo "Error: ";
    //mysqli_query($db, $sql3);
    echo "<div><h1>Successful Transfer !!!!</div>";
}
mysqli_close($db);
?>

<html>
<body background="images/money-transfer.jpg">
<br>
<a href="creditHome.php" style="color:rgb(255,255,255)"><h2><u>click here to go to home</u></h2></a>
</body>
</html>