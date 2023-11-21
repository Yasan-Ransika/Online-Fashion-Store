<?php require ("dbh.php");
?>
<?php
    //calling from Esubmt button
	if(isset($_POST["submit"])){
	
        //varible declartion and initializing
        session_start();
       
       
        

        $username =$_POST["uid"];
        $pwd =$_POST["pwd"];
        
        //creating the query
        $sql = "SELECT * FROM users WHERE usersUid='$username' AND usersPwd='$pwd'";

        $result = mysqli_query($conn, $sql);
       


        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<script>alert('Login Successfull!')</script>";

            $_SESSION['email'] = $row ['usersEmail'];
            $_SESSION['name'] = $row['Name'];
            $_SESSION['Uid'] = $row['usersUid'];
            $_SESSION['id'] = $row['usersId'];
            $_SESSION['loginstat'] = True;  

    
            if($row['UserType'] == 'dvp'){
                echo "<script>window.location.replace('../Delivery_Person.html')</script>";	//go back to MainPage of student page
            }
            else if($row['UserType'] == 'csr'){
                echo "<script>window.location.replace('../customer.html')</script>";		//go back to MainPage of staff page
            }
            else if($row['UserType'] == 'slr'){
                echo "<script>window.location.replace('../Seller.html')</script>";		//go back to MainPage of staff page
            }

     
           
        }
        }
        else{
            echo "<script> alert('Invalid password!')</script>";
            echo "<script>window.location.replace('login.html')</script>";					//go back to login page
        }

        
        
        //close the connection
        $conn->close();
    }
    ?>
?>