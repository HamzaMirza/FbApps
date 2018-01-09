<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anime</title>
	<script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
	<style>
		#container
		 {
			
			/*height:79.55%;*/
			position:absolute;
			top:80px;
			background-color:white;
			font-family:'Open-sans';
			text-align:center;
		}
		#initialStage
		{
			width:80%;
			box-shadow:1px 1px 8px 2px #000DDD;
			padding-top:5px;
			height:100%;
		}
		#coverPhoto
		{
			padding-left:9.95%;
			object-fit: contain;
		}
		 #login
		 {
			
			width:80%;
		 }
		  #shareBtn
		 {
			margin-top:10px;
			width:80% !important;
		 }
	 	#resultPhoto
		{
			width:100%; height:100%;
		}
	</style>
</head>

<body>
<div id="fb-root"></div>

 <script>
	// let friendproto={imgSrc:"",nameF:""};
		var Username,gender,DPsrc,friends=[];
		friends.push({imgSrc:"",nameF:""});friends.push({imgSrc:"",nameF:""});
		 window.fbAsyncInit = function() {
   FB.init({
      appId      : '120014955310103',
      xfbml      : true,
      version    : 'v2.10'
    });

    checkLoginState();

  };
		  
    function checkLoginState()
    {
		FB.getLoginStatus(function(response) 
		{
		   if (response.status === 'connected') 
			{
			
				FB.api('/me',{fields: "id,about,picture.width(500).height(500),name"}, 
				function(response) 
				{
					Username=JSON.stringify(response.name);	
					DPsrc=response.picture.data.url;	
					console.log(JSON.stringify(DPsrc));
					FB.api('/me/taggable_friends','get',{fields:'id,name,picture.width(500).height(500)'}, function(response)
					{
					//	console.log(friends)
			
						for(var i=0;i<response.data.length;i++)
						{
							if(i>1) break;
							 friends[i].imgSrc= response.data[i].picture.data.url;
							 friends[i].nameF= response.data[i].name;
	
						} 
					
						console.log(friends); 
						$.ajax({ 
							type: 'post', 
							url: 'http://localhost/FbAPi/Who Are Your Two Best Friends/downlodDp_2bf.php', 
							data: {url_:DPsrc,friendlist:JSON.stringify(friends)},
							success: function (data)
							{ 
								try
								{ 
									console.log("sux");
									console.log(data);
									
								
								}
								catch(e)
								{
									console.log(e);
								}
								
							},
							error: function(xhr, status, error)
							{
								
								console.log(error);
							}
						});
					
					});
					
				});
			} 
			else 
			{
				console.log('Please log into this app. '+response.status);  
			
			}
			
		});
	}
  
    function login()
    {
		try
		{
			FB.login(function(response) 
			{

				if (response.status === 'connected') 
				{
					document.getElementById('initialStage').style.display='none';
					
					document.getElementById('FinalStage').style.display='inline';
					produceOutput(Username);
				} 
				else
				  console.log(response);		
			}, {scope: 'public_profile,email,user_friends,publish_actions,user_photos,read_custom_friendlists,user_birthday,user_hometown,user_location,user_website,user_work_history,user_about_me'});
	 
		}
		catch(e)
		{
			console.log("Please wait for the app to load");
		}
	}
 
 
 
 
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));



</script>
		<div class="container" >
			<div class="row" >
				<div class="col-md-6 col-md-offset-2 col-xs-8 col-xs-offset-2" id="container" style="margin-top:3%;">
					<div id="initialStage">
							<h1 class="h1"> Who Are Your Two Best Friends</h1>
							 <img src="img/2bf/cover.png" class="img-responsive"  id="coverPhoto"/>
							 <h2 class="h2">Please Login to see the result</h2>
							<button class="btn btn-primary btn-lg" id="login" onClick="login()" > Login with Facebook <span class="fa fa-facebook"></span> </button>
							<h6 style="width:80%; padding-left:15%;">In life we need a few friends who love us for what we are. Find out which ones are yours!</h6>
					</div>
							<div id="FinalStage" style="display:none">
							<div class="row" id="quiz" >		
							<div class="col-xs-12" id="resultPhoto" >
							 <div class="col-xs-3" style="height:100%;width:100%; ">
									<img  class="img-responsive" style="max-height:100%; max-width:100%; " id="resultAnimePhoto"/>
							 </div>
							</div>
						</div>
					 <button class="btn btn-primary btn-lg" data-layout="button" data-size="large" data-mobile-iframe="true" id="shareBtn" onclick="buttonClicked()" > <span class="fa fa-facebook"></span> Share  </button>  
				 </div>
						
				</div>	
			</div>
		</div>		
<!-- -------------------------------------------------------------------- JS CUSTOM SOURCE SCRIPT ----------------------------------------------------------------------------------- -->
<script src="js/2bf.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<script src="bootstrap/js/bootstrap.js"></script>

	
</body>
</html>