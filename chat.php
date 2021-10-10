<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <script>
    function editMessage(id) {
        selectedMsgId = id;
        clickedButton = document.getElementById(id);
        messageElement = clickedButton.previousElementSibling;
        selectedMsgId = messageElement.id;
        myMessage = prompt("Please Edit your message", messageElement.textContent);
        if (myMessage != null) {
            messageElement.textContent = myMessage;
        }
        //Send data to edit chat php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/edit-chat.php", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  inputField.value = "";
                  scrollToBottom();
              }
          }
        }
        let formData = new FormData();
        formData.append("message_id",selectedMsgId);
        formData.append("message",myMessage);
        // Display the keys for testing purpose 
        for (var key of formData.keys()) {
          console.log(key);
        }
        // Display the values for testing purpose
        for (var value of formData.values()) {
          console.log(value);
        }

        xhr.send(formData);

    }

    function deleteConfirmation(id) {
        clickedButton = document.getElementById(id);
        savedButton = clickedButton.previousElementSibling;
        messageElement = savedButton.previousElementSibling;
        selectedMsgId = messageElement.id;
        confirm("Do you want to delete this message!!!" + messageElement.textContent);
        //Send data to delete chat php
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/delete-chat.php", true);
        let formData = new FormData();
        formData.append("message_id",selectedMsgId);
        xhr.send(formData);
        xhr.onload = () => alert(xhr.response);
    }
  </script>
</body>
</html>
