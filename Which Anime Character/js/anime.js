/*
var images=[];
var imageTobeDisplay="";
var NameTobeDisplay="";
$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/FbAPi/js/getImages.php',  
    dataType: 'json',
    success: function (data)
	{ 
        images["male"]=data["male"];
		images["maleTitle"]=data["maleTitle"];
		images["femaleTitle"]=data["femaleTitle"];
		images["female"]=data["female"];
		
		
		//LOGIC OF ANIME Character
		let index=Math.floor(Math.random() * (images["male"].length-1)) + 1 ;
		imageTobeDisplay=images["male"][index];
		nameTobeDisplay=images["maleTitle"][index];
		console.log("heherhehe "+getResultImageSrc());
		//console.log("\n"+imageTobeDisplay+"\n"+nameTobeDisplay);
	
    },
	error: function(xhr, status, error)
	{
		
		console.log(error);
	}
});
function getResultImageSrc()
{
	//console.log("hello "+imageTobeDisplay.slice(3,imageTobeDisplay.length));
	return imageTobeDisplay.slice(3,imageTobeDisplay.length);
	
} */
