
function produceOutput(userName="User Name")
{
	
	$.ajax
	({ 
		type: 'POST', 
		url: 'http://localhost/FbAPi/Who Are Your Two Best Friends/php_upload_script_2bf.php',  
		data: {url_:userName,id_:<?php echo $id;?>},
		success: function (data)
		{ 
			try
			{
				console.log("Upload_success"+data);
			}
			catch(e)
			{
				console.log(e);
			}
			finally
			{
					document.getElementById('resultAnimePhoto').src=getResultImageURl();
			}
			
		},
		error: function(xhr, status, error)
		{
			
			console.log(error);
		}
	});
}
function getResultImageURl()
{
	return "img/app11data/"+<?php echo $id;?>+".resultTEMPLATERESULT1.jpg";
	
}
function uploadPhoto() 
{
	  FB.ui(
	  {
		method: 'share',
		display: 'popup',
		mobile_iframe: true,
		href: 'https://fb-s-d-a.akamaihd.net/h-ak-fbx/v/t1.0-1/p160x160/18739652_1462437203826639_1921059055917514699_n.jpg?oh=199609d0b2e88fc51d1f569dbf3f2537&oe=59F35F66&__gda__=1509699784_f82ad164d6ba65782ef9cb2b858b705a',
	  }, function(response){});
			
  }

