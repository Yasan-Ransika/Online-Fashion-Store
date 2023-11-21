<?php  require ("dbh.php");

?>


<?php
if(isset ($_POST["sub-btn"])){

    $email = $_POST['email'];
    $pwd = $_POST['psw'];
    

$sql = "DELETE FROM users WHERE usersEmail ='$email' AND usersPwd = '$pwd' " ;


if ($conn->query($sql) === TRUE)
 {
    echo "<script>
    alert('Deleted in succesfully !') ;
    window.location.replace('../login.html');
</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
}
$conn->close();

?>