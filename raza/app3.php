<?php


$mysqli=mysqli_connect("localhost", "root", "","appData");

$q = "SELECT id FROM app3 ORDER BY id DESC LIMIT 1";

$result = $mysqli->query($q);

if(!$result) {
    die('<br/>MySQL Error: ' . mysql_error());
}
else {
    
    $row = mysqli_fetch_array($result);
    
    if ($row !== FALSE) {
        $id = $row['id'];
    }
    else {
        die('<br/>MySQL Error: ' . mysql_error());
    }
}
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php
include_once 'Facebook/autoload.php';

if (!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
  'app_id' => '502487440092647',
  'app_secret' => '7fd571cbae8c5de5944a4ef21201f63d',
  'default_graph_version' => 'v2.10',
  ]);

$accessToken = $_SESSION['fb_access_token'];

try {
  $response = $fb->get('/me?fields=id,name,picture.type(large)',$accessToken );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
$friends= $fb->get('/me/taggable_friends?fields=name,id,picture.type(large)',$accessToken);
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
$picture = array();
$uid = array();
$uname = array();
$body = $friends->getDecodedBody();
$randnum = UniqueRandomNumbersWithinRange(0,24,3);
$userpicture = $user['picture']['url'];
$username = $user['name'];
#echo "<img src='".$userpicture."' />";
$i = 0;
foreach ($body['data'] as $friend ){
    
    if(in_array( $i ,$randnum )){
        array_push($picture, $friend['picture']['data']['url']);
        array_push($uid, $friend['id']);
        array_push($uname, $friend['name']);
    }
    
    $i++;
}
        $url1 = $picture[0];
        $url2 = $picture[1];
        $url3 = $picture[2];
        $urluser = $userpicture;
        $img1 = 'img/app3data/'.++$id.'1.jpg';
        $img2 = 'img/app3data/'.++$id.'2.jpg';
        $img3 = 'img/app3data/'.++$id.'3.jpg';
        $userimg = 'img/app3data/'.++$id.'user.jpg';
        
        file_put_contents($img1, file_get_contents($url1));
        file_put_contents($img2, file_get_contents($url2));
        file_put_contents($img3, file_get_contents($url3));
        file_put_contents($userimg, file_get_contents($urluser));
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
      <meta property="og:url"                content="http://localhost:81/fbapps/app3.php" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="Who Sent you a Message on FB" />
        <meta property="og:description"        content="Find out Who Sent you a Message on FB" />
        <meta property="og:image"              content="http://http://localhost:81/fbapps/wp/wp-content/uploads/2017/08/app1.gif" />
      <title>Who sent you message on fb?</title>
    <!-- Latest compiled and minified CSS -->
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <style>
         body {
            background: red; /* For browsers that do not support gradients */
              background: -webkit-linear-gradient(-180deg, #DC6082, #ECECEC); /* For Safari 5.1 to 6.0 */
              background: -o-linear-gradient(-180deg, #DC6082, #ECECEC); /* For Opera 11.1 to 12.0 */
              background: -moz-linear-gradient(-180deg, #DC6082, #ECECEC); /* For Firefox 3.6 to 15 */
              background: linear-gradient(-180deg,#DC6082, #ECECEC);
         
         }
        .greenblob {
        
            display: inline-block;
            width: 15px;
            height: 15px;
            background-color: green;
            border-radius: 50%;
            
        }
        .appBox{
            background-color: #EAEBED;
        }
        .title {
            background-color: #0183FF;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 26px;
            color: white;
            padding: 5px;
        }
        #name {
            
            font-size: 18px;
            font-weight: 700;
        }
        .title img {
            margin-left: 85px;
        }
        .content {
            padding: 0px 10px;
        }
        .stats {
            background-color: white;
            padding: 5px 2px;
        }
        #recent {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            margin-left: 40px;
        }
        #requests {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            color: grey;
            margin-left: 40px;
        }
        #newmsg {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            color: #0681FD;
            font-size: 18px;
            margin-left: 40px;
        }
        .shadow {
          -webkit-box-shadow: 1px 0px 0px 1px grey;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
          -moz-box-shadow:    1px 0px 0px 1px grey;  /* Firefox 3.5 - 3.6 */
          box-shadow:         1px 0px 0px 1px grey;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
        }
        .friends {
            background-color: #EDF1FA;
            border-bottom: 1px black solid;
            padding: 10px 5px;
            height: 150px;
        }
        .friends img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .right {
         float: right;
        }
        .fname {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 22px;
            color: black;
        }
        .fmsg {
            font-weight: 700;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            color: grey;
        }
        img.icon {
            width: 20px;
            height: 20px;
            position: relative;
            left: -30px;
            top: 30px;
        }
    </style>
</head>

<body>

<!-- GETTING FB SDK JS -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '502487440092647',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- ENDING FB SDK JS -->

    <div class="container app_page" id="app">
    <div class="row" >
        <div class="col-md-6 col-md-offset-3">
          <div class="appBox" >
            <div class="title">
                <p><span>Who Sent A Message? <img id="userPic" src="<?php echo $userimg; ?>" width="50" height="50" /> <span id="name"><?php echo $username; ?></span> </span></p>
            </div>
            <div class="content">
             <div class="stats shadow" >
                <p><span id="recent">Recent(87)</span> <span id="requests">Message Requests</span> <span id="newmsg">New Message</span></p>
             </div>
             <div class="msgs">
                <div class="friends friend1">
                    <span>
                        <img id="friendpic1" src="<?php echo $img1; ?>" />
                        <img class="icon" src="img/messenger.png" />
                        <span id="friendname1" class="fname"><?php echo $uname[0]; ?></span>
                        <span id="friendtext1" class="fmsg">I got a call from ex...</span>
                        
                    </span>
                    <span class="right">
                        11:50
                        <span class="greenblob"></span>
                    </span>
                </div>
                <div class="friends friend2">
                     <span>
                        <img id="friendpic2" src="<?php echo $img2; ?>" />
                        <img  class="icon" src="img/messenger.png" />
                        <span id="friendname2" class="fname"><?php echo $uname[1]; ?></span>
                        
                        <span id="friendtext2" class="fmsg">Someone told me you sound like an owl</span>
                    </span>
                    <span class="right">
                        21:15
                        <span class="greenblob"></span>
                    </span>
                </div>
                <div class="friends friend3">
                     <span>
                        <img id="friendpic3" src="<?php echo $img3; ?>" />
                        <img class="icon" src="img/messenger.png" />
                        <span id="friendname3" class="fname"><?php echo $uname[2]; ?></span>
                        
                        <span id="friendtext3" class="fmsg">Wanna get drunk? :P</span>
                    </span>
                    <span class="right">
                        12:32
                        <span class="greenblob"></span>
                    </span>
                </div>
             </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-block" id="btnSave">Share on Facebook</button>
        </div>
    </div>
</div>
<canvas width="1920px" height="800px" style="display:none;" id="canvas"></canvas>
<!--SCRIPTS-->
<script
  src="jquery-3.2.1.min.js"></script>

<script src="html2canvas.js"></script>
<script src="FileSavermin.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

function buttonClicked() {
    document.getElementById('app').scrollIntoView();
    html2canvas(document.querySelector("#app"), {
        logging: true,
        allowTaint: true,
        canvas: canvas
    }).then(function(canvas) {
        var dataImage = canvas.toDataURL("image/png");
        $.ajax({
            type: "POST",
            url: "http://localhost:81/fbapps/save.php",
            data: { 
                data:dataImage
            }
        }).done(function(fileName) {
                window.open("http://localhost:81/fbapps/" + fileName.replace(/['"]+/g, ''));

        }); 
    });
}

 $(document).on('click','#btnSave',function(e) {
  buttonClicked();   
  var friendimg1 = $("#friendpic1").attr('src');
  var friendimg2 = $("#friendpic2").attr('src');
  var friendimg3 = $("#friendpic3").attr('src');
  
  var friendname1 = $("#friendname1").text();
  var friendname2 = $("#friendname2").text();
  var friendname3 = $("#friendname3").text();
  
  var friendtext1 = $("#friendtext1").text();
  var friendtext2 = $("#friendtext2").text();
  var friendtext3 = $("#friendtext3").text();
  
  var userPic = $("#userPic").attr('src');
  var userName = $("#name").text();
  
  $.ajax({
         data: {
            friendimg1: friendimg1,
            friendimg2: friendimg2,
            friendimg3: friendimg3,
            friendname1: friendname1,
            friendname2: friendname2,
            friendname3: friendname3,
            friendtext1: friendtext1,
            friendtext2: friendtext2,
            friendtext3: friendtext3,
            userPic: userPic,
            userName: userName
         },
         type: "post",
         url: "app3datasave.php",
         success: function(data){
              alert("Data Save: " + data);
         }
});
 });

</script>
<script>
document.getElementById('btnSave').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'http://localhost:81/fbapps/app3result.php?id=<?php echo ++$id; ?>',
  }, function(response){});
}
</script>
</body>

</html>
