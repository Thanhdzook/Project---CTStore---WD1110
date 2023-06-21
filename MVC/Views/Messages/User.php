<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
<body>
  <div class="wrapper">
    <section class="users">
    <a href="/Project---CTStore---WD1110/Admin/View_Index_Admin/null" class="logout">Out</a>
      <header>
        <div class="content">
          <div class="details">
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text">Lựa chọn bạn bè để trò chuyện</span>
        <input class="" type="text" name="search" id="" placeholder="Nhập tên để tìm kiếm">
        <button class="">Tìm</button>
      </div>
      <div class="users-list">
        ok
      </div>
    </section>
  </div>

  <script src="/Project---CTStore---WD1110/MVC/wwwroot/js/user-event.js"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .chat-container {
        width: 400px;
        height: 300px;
        overflow-y: scroll;
        border: 1px solid #ccc;
        padding: 10px;
    }
    
    .message {
        margin-bottom: 10px;
    }
    
    .sender-name {
        font-weight: bold;
    }
    
    .message-content {
        text-align: right;
    }
</style>



</head>
<body>
<div class="chat-container">
    <div class="message">
        <div class="sender-name">John Doe</div>
        <div class="message-content">Hello, how are you?</div>
    </div>
    <div class="message">
        <div class="sender-name">Jane Smith</div>
        <div class="message-content">I'm doing great! Thanks for asking.</div>
    </div>
    <!-- More messages... -->
</div>

<form>
    <input type="text" name="sender" placeholder="Your Name" required>
    <textarea name="message" placeholder="Type your message here" required></textarea>
    <button type="submit">Send</button>
</form>
</body>
</html>