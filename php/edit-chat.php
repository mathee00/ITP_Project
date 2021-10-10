<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
    
        include_once "config.php";

        $message_id = mysqli_real_escape_string($conn, $_POST['message_id']);;
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(empty($message)){
            $message = "this is sample Supun testing Saturday";
        }
        if(!empty($message)){
            $sql = mysqli_query($conn, "UPDATE messages SET msg = '$message' where msg_id = $message_id");
            if ($sql) {
                echo "Record updated successfully";
                header("location:../chat.php");                
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            
            mysqli_close($conn);

        }
    }else{
        header("location: ../login.php");
    }


    
?>