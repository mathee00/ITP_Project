<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $message_id = mysqli_real_escape_string($conn, $_POST['message_id']);;
        if(!empty($message_id)){
            //$sql = mysqli_query($conn, "UPDATE messages SET msg = '$message'  where msg_id = $message_id") or die();
            $sql = mysqli_query($conn, "DELETE FROM messages WHERE msg_id = $message_id");
            if ($sql) {
                echo "Record deleted successfully";
                
              } else {
                echo "Error deleting record: " . mysqli_error($conn);
              }            
            mysqli_close($conn);

        }
    }else{
        header("location: ../login.php");
    }  
?>