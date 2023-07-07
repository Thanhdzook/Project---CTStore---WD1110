<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/Project---CTStore---WD1110/MVC/wwwroot/css/Messages/Messages123.css"> -->
  <title>Chat</title>
</head>

<body>
  <div class="wrapper-right123">
    <section class="chat-area123">
      <header>
        <div class="message-header123">
          <div class="message-header-icon123"><i class="fa-solid fa-user"></i></div>
          <!-- <div class="message-header-name">bui cuong</div> -->
        </div>
      
        <div class="details123">
          <span></span>
          <div>
            <?php
            if(isset($_SESSION["UN_ID"])){
              $unique_id = $_SESSION["UN_ID"];
              echo $_SESSION["UN_NAME"];
            }
            // if (isset($data["account"])) {
            //   while ($row = mysqli_fetch_array($data["account"])) {
            //     echo $row["full_name"];
            //     $unique_id = $row["unique_id"];
            //   }
            // } 
            else {
              $unique_id = 123;
            }
            ?>
          </div>
        </div>
      </header>
      <div class="chat-box123">
      </div>
      <form action="#" class="typing-area123">
        <input type="text" name="incoming_id" class="incoming_id123" value="<?php echo $unique_id ?>" id="" hidden>
        <input type="text" name="message" class="input-field123" placeholder="Nhập nội dung ở đây..." autocomplete="off">
        <button>
          <i class="fa-solid fa-paper-plane"></i>
        </button class="button123">
      </form>
    </section>
  </div>

  <script src="/Project---CTStore---WD1110/MVC/wwwroot/js/chat-event-user.js"></script>

</body>

</html>