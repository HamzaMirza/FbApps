if(typeof(Storage)!=='undefined')
{
    var btn_ModalLogin = document.getElementById('ModalLogin');
    var btn_ModalSignUp = document.getElementById('ModalSignUp');
    var btn_beginQuiz = document.getElementById('beginQuiz');
  
    btn_ModalLogin.onclick=function()
                            {
                                 var userName=document.getElementById('inputName').value;
                                 var userPassword=document.getElementById('inputPassword').value;
                                if(!findUser(userName))
                                {
                                    alert("User Name Does not exist");
                                }
                                else
                                {
                                    if(!findUserPass(userPassword))
                                    {
                                        alert("User Password Does not match");
                                    }
                                    else
                                    {
                                       // window.location.href="quiz.html";
                                       btn_beginQuiz.disabled=false;
                                         var userNameArray=JSON.parse(localStorage.getItem("users"));
                                         var btn_DisplayName=document.getElementById('DisplayName').innerHTML=userNameArray.userName;
                                         document.getElementById('customModel').style.display="none";
                                  }
                                }
                            }
 $(document).ready(function()
 {
     btn_ModalSignUp.onclick=function()
                            {
                                 var userName=document.getElementById('inputName').value;
                                 var userPassword=document.getElementById('inputPassword').value;
                                if(insertUserName(userName,userPassword))
                                     btn_beginQuiz.disabled=false;
                                var userNameArray=JSON.parse(localStorage.getItem("users"));
                                var btn_DisplayName=document.getElementById('DisplayName').innerHTML=userNameArray.userName;
                                $('#SignLoginModal').modal('toggle');        
                             }

     btn_ModalLogin.onclick=function()
                            {
                                 var userName=document.getElementById('inputName').value;
                                 var userPassword=document.getElementById('inputPassword').value;
                                if(!findUser(userName))
                                {
                                    alert("User Name Does not exist");
                                }
                                else
                                {
                                    if(!findUserPass(userPassword))
                                    {
                                        alert("User Password Does not match");
                                    }
                                    else
                                    {
                                       // window.location.href="quiz.html";
                                       btn_beginQuiz.disabled=false;
                                         var userNameArray=JSON.parse(localStorage.getItem("users"));
                                         var btn_DisplayName=document.getElementById('DisplayName').innerHTML=userNameArray.userName;
                                       $('#SignLoginModal').modal('toggle'); 
                                  }
                                }
                            }                            

     btn_beginQuiz.onclick=function()
                            {
                                   window.location.href="quiz.html";              
                            }      
                                                        
                                                    
                                                
                                            });
    
    function findUser(userName)
    {
        var userNameArray=JSON.parse(localStorage.getItem("users"));
        if(userNameArray.userName===userName)
        return true;
        else
        return false;
        
    }
    function findUserPass(userP)
    {
        var userNameArray=JSON.parse(localStorage.getItem("users"));
        if(userNameArray.password===userP)
        return true;
        else
        return false;
        
    }
    function getUserArray()
    {
        return JSON.parse(localStorage.getItem("users"));     
    }
    function insertUserName(name,pass)
    {
        
        var userNameArray=getUserArray(); 
           var user=
            {
                "userName":name,
                "password":pass,
                "score":-1
            };
          try 
          {
              localStorage.setItem("users",JSON.stringify(user))
              alert("true");
              return true;
          }
          catch(e)
          {
                  return false;
          }
       
    }
    
}
else
{
    alert('Your browser does not support local storage mechanism');
}
