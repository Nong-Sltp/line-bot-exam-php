<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MUFORU v1</title>
  <style>
    #pictureUrl { display: block; margin: 0 auto }
  </style>
</head>
<body>
  <img id="pictureUrl" width="25%">
  <p id="userId"></p>
  <p id="displayName"></p>
  <p id="statusMessage"></p>
  <p id="getDecodedIDToken"></p>

  <form method="post">
    User Id : <input type="text" name="uid" id="uid"><br>
    Firstname : <input type="text" name="fname" id="fname"><br>
    Lastname : <input type="text" name="lname" id="lname"><br>
    Tel : <input type="tel" name="tel" id="tel"><br>
    <button type="submit" name="submit" class="btn btn-history btn-block">submit</button>
  </form>

  <?php
    if(isset($_POST['submit'])){
      $name = $_POST['fname'].' '.$_POST['lname'];
      $tel = $_POST['tel'];
      $text = "[ข้อความตอบกลับอัตโนมัติ]\n "."🙏 ขอบคุณมากๆ สำหรับการสั่งซื้อน้าค้าาา คุณ".$name." เบอร์ ".$tel."รบกวนคุณลูกค้า พิมพ์ ชื่อ-นามสกุล
      และเบอร์โทร ในไลน์ได้เลยค่าาา\nและขณะนี้จากระบบที่คุณลูกค้าทำรายการเมื่อสักครู่แอดมินได้รับข้อมูลการชำระเงินและความต้องการสำหรับจัดทำ wallpaper ของคุณลูกค้าเข้าระบบไปเป็นที่เรียบร้อยแล้ว\n
      👉 ลำดับต่อไป แอดมินจะทำการตรวจสอบข้อมูลหากข้อมูลถูกต้อง แอดมินจะทำการส่งวอลเปเปอร์ ให้คุณลูกค้าโดยส่งในไลน์นี้ภายใน 2-5 วันนะคะ\nและหากมีข้อมูลส่วนใดที่ต้องขอเพิ่มเติมแอดมินแจ้งให้ทราบอีกครั้ง และเมื่อวอลเปเปอร์เสร็จแล้วแล้วแอดมินจะแจ้งในไลน์นี้ค่าาา🙏🏻";

      require "vendor/autoload.php";

      $access_token = 'jwIRRQa9sAGkPPlxsosPf9EKdAjl32aR4bgkG5QiB2suzDu0pRW9riQfhYZd0LiqfmFFbeNAM58oHqR9vrB/CXGskgeBnaotn4xrskmLkack7VQPhQ3NlJoMiAZWV2EoK9TCKLrRZ/J8OJmVPX2bCAdB04t89/1O/w1cDnyilFU=';

      $channelSecret = '6f56434c3e11e16eb8d49dc251dc5bbc';

      $pushID = $_POST['uid'];

      $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
      $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

      $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
      $response = $bot->pushMessage($pushID, $textMessageBuilder);

      echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

    }else{

    }
  ?>
  <script src="https://static.line-scdn.net/liff/edge/versions/2.9.0/sdk.js"></script>
  <script>
    function runApp() {
      liff.getProfile().then(profile => {
        document.getElementById("pictureUrl").src = profile.pictureUrl;
        document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
        document.getElementById("uid").value = profile.userId;
      }).catch(err => console.error(err));
    }
    liff.init({ liffId: "1656884698-7OynneJZ" }, () => {
      if (liff.isLoggedIn()) {
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
  </script>
</body>
</html>