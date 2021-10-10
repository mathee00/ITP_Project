<?php include_once "admin-header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form chat search">
        <header>FOLMS Chat Search</header>
        <form action="php/search-chat-form.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                <label>Search for Chat</label>
                <input type="text" name="search" placeholder="Write your search text" required>
            </div>
            <div class="field button">
            <input type="submit" name="submit" value="Search">
            </div>
        </form>
        </section>
    </div>
    <div class="wrapper">
        <section class="form chat search">
        <header>FOLMS Chat Report</header>
        <form action="php/search-chat-form.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input" class="display:none">
                <label>Report Display all the Chat</label>
                <label>recorded in the FOLMS Application</label>
                <!-- <input type="text" name="search" placeholder="Write your search text" required> -->
            </div>
            <div class="field button">
            <input type="submit" name="submit" value="Report">
            </div>
        </form>
        </section>
    </div>
    <div class="wrapper">
        <section class="form chat search">
        <header>FOLMS Chat PDF Report</header>
        <form action="php/pdf-report.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input" class="display:none">
                <label>PDF Report all the Chat</label>
                <label>recorded in the FOLMS Application</label>
                <!-- <input type="text" name="search" placeholder="Write your search text" required> -->
            </div>
            <div class="field button">
            <input type="submit" name="submit" value="PDF Report">
            </div>
        </form>
        </section>
    </div>

    <?php
    // if (isset($_POST['search'])) {
    //     require "php/search-chat-form.php";

    //     if (count($results) > 0) {
    //         foreach ($results as $r) {
    //             printf("<div>%s - %s</div>", $r['name'], $r['email']);
    //         }
    //     } else {echo "No results found";}
    // }

    ?>
  <!-- <div class="wrapper">
    <section class="form signup">
      <header>FOLMS Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div> -->

  <!-- <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script> -->

</body>
</html>