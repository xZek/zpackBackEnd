<?php
/*
        -->VERITABANI BAGLANTI
        -->EĞER GİRİŞ YAPILMADIYSA YONLENDIRME
        -->GIRIŞ YAPILDIGINA DAİR GEREKLİ BİLGİLER LOGIN DETAILS TABLOSUNA INSERT EDILIR
        -->GRUP SOHBET TABLOSU GETIRILIR
        -->JAVASCRIPT KODLARI ILE GEREKLI GUNCELLEMELER YAPILIR ( HERBIRI AJAX KOMUTUYLA TEKRAR GUNCELLER)




*/


?>

<?php
///////////////////////////////////////////////
include('database_connection.php');
include('../header.php');


if(!isset($_SESSION['ID']))
{
 header("location:login.php");
}
////////////////////////////////////////////////

$sub_query = "
INSERT INTO login_details
(user_id)
VALUES ('".$_SESSION['ID']."')
";
$statement = $connect->prepare($sub_query);
$statement->execute();
$_SESSION['login_details_id'] = $connect->lastInsertId();


?>
<style>
.container2 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container2::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container2 img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container2 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
</style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>
    <body>


   <div class="table-responsive">

    <div id="user_details"></div>
    <div id="user_model_details"></div>

<h3>SOHBET</H3>
        <div id="group_chat_dialog">
         <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

         </div>
         <div class="form-group">
          <div class="chat_message_area">
           <div id="group_chat_message" contenteditable class="form-control">

           </div>

          </div>
         </div>
         <div class="form-group" align="right">
          <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Gönder</button>
         </div>
        </div>
   </div>
  </div>
    </body>
</html>

<style>


#group_chat_message
{
 width: 100%;
 height: auto;
 min-height: 80px;
 overflow: auto;
 padding:6px 24px 6px 12px;
}

</style>

<script type="text/javascript">

</script>
<script>
$(document).ready(function(){

 setInterval(function(){
  fetch_group_chat_history();
}, 5000);
setInterval(function(){
 update_last_activity();
}, 5000)
 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 $('#group_chat_message').emojioneArea({
  });
 $('#send_group_chat').click(function(){
  var chat_message = $('#group_chat_message').html();
  var action = 'insert_data';
  if(chat_message != '')
  {
   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{chat_message:chat_message, action:action},
    success:function(data){
      var element = $('#group_chat_message').emojioneArea();
        element[0].emojioneArea.setText('');
        $('#group_chat_history').html(data);

    }
   })
  }
 });

 function fetch_group_chat_history()
 {
  var group_chat_dialog_active = $('#is_active_group_chat_window');
  var action = "fetch_data";

   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{action:action},
    success:function(data)
    {
     $('#group_chat_history').html(data);
    }
   })

 }

  fetch_group_chat_history();


});
</script>
