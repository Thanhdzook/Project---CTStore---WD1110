<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="/Project---CTStore---WD1110/Messages/View_chat_box" class="back-icon">
          <i class="fas fa-arrow-left"></i>
        </a>
        <div class="details">
          <span></span>
          <div>
            <?php
              if(isset($data["account"])){
                while($row = mysqli_fetch_array($data["account"])){
                  echo $row["full_name"];
                  $unique_id = $row["unique_id"];
                }
              }
              else{
                $unique_id = 123;
              }
            ?>
          </div>
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" name="incoming_id" class="incoming_id" value="<?php echo $unique_id ?>" id="" hidden>
        <input type="text" name="message" class="input-field" placeholder="Nhập nội dung ở đây..." autocomplete="off">
        <button>
          gui
        </button>
      </form>
    </section>
  </div>

  <script src="/Project---CTStore---WD1110/MVC/wwwroot/js/chat-event.js"></script>
  
</body>
</html> -->
