<?php include_once "../admin-header.php"; ?>
<body>
    <div class="m-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include_once "config.php";
                if (isset($_POST['search'])) {
                $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
                // $sql = "SELECT msg_id,outgoing_msg_id, incoming_msg_id,  dateupdated,msg FROM `messages` 
                // WHERE msg LIKE '%{$searchTerm}%'               
                // ";

                    $sql = "SELECT messages.msg_id, messages.incoming_msg_id, u1.fname As to_name, 
                    messages.outgoing_msg_id, u2.fname As from_name, messages.dateupdated,messages.msg
                FROM messages
                INNER JOIN USERS as U1 ON messages.incoming_msg_id = U1.unique_id
                INNER JOIN USERS as U2 ON messages.outgoing_msg_id = U2.unique_id  
                where msg like '%{$searchTerm}%'             
                ";
                } else {
                    $sql = "SELECT messages.msg_id, messages.incoming_msg_id, u1.fname As to_name, 
                    messages.outgoing_msg_id, u2.fname As from_name, messages.dateupdated,messages.msg
                FROM messages
                INNER JOIN USERS as U1 ON messages.incoming_msg_id = U1.unique_id
                INNER JOIN USERS as U2 ON messages.outgoing_msg_id = U2.unique_id
                
                ";
                }

                $output = "";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) > 0){
                    while($row = mysqli_fetch_assoc($query)){
                        $output .= '
                        <tr>           
                            <td>'. $row['from_name'].'</td><td>'. $row['to_name']. '</td><td>' . $row['dateupdated'] .'</td><td>'. $row['msg'] .'</td>
                        </tr>
                            ';
                    }
                }else{
                    $output .= 'No messages found related to your search term';
                }
                echo $output;
            ?>                
            </tbody>
        </table>
    </div>
    <div class="link">Do you want to go back to Admin Search? <a href="../admin.php">Go  now</a></div>
</body>
</html>