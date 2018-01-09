
$('.pull-down').each(function() {
  var $this=$(this);
	$this.css('margin-top', $this.parent().height()-$this.height());
	
});


var questionHeading = document.getElementById('question');
var answerDiv = document.getElementById('answers');
var btn_next = document.getElementById('btn_next');
function questionBlueprint() {
this.questionPrint = {
    question:"",
    answers:[],
    index:-1,
    answerVisited:false,
    getAnswer:function(){
        return this.answers[this.index];
    },
    getAnswerVisited:function(){
        return this.answerVisited;
    },
    setAnswer:function(ind){
        this.index=ind;
    },
     setAnswerVisited:function(type){
        this.answerVisited=""+type;
    }
};
};

var questionSheet=[];
for(var i=0;i<5;i++)
questionSheet[i]=new questionBlueprint();

// Hard coded End
questionSheet[0].questionPrint.question="Batman series in cartoon network was released in year?";
questionSheet[1].questionPrint.question="Spiderman series in cartoon network was released in year?";
questionSheet[2].questionPrint.question="X-men series in cartoon network was released in year?";
questionSheet[3].questionPrint.question="Superman series in cartoon network was released in year?";
questionSheet[4].questionPrint.question="Goku of Dragon ball z achieved which level<sub>(s)</sub>?";

questionSheet[0].questionPrint.answers=['1947','1955','1989','1992'];
questionSheet[1].questionPrint.answers=['1947','1955','1977','1995'];
questionSheet[2].questionPrint.answers=['1947','1992','1989','1995'];
questionSheet[3].questionPrint.answers=['1947','1951','1989','1995'];
questionSheet[4].questionPrint.answers=['Super Saiyan 1','Super Saiyan 2','Super Saiyan 4','Super Saiyan 8'];

questionSheet[0].questionPrint.setAnswer(3);
questionSheet[1].questionPrint.setAnswer(2);
questionSheet[2].questionPrint.setAnswer(1);
questionSheet[3].questionPrint.setAnswer(2);
questionSheet[4].questionPrint.setAnswer(2);

// Hard coded End
var totalAnsDisplayed=-1;
//alert(questionSheet.length);
function displayQues()
{
    totalAnsDisplayed++;
    if(totalAnsDisplayed >= questionSheet.length-1)
     {
         setScore();
         displayScore();
         return ;
     }
     questionHeading.innerHTML=questionSheet[totalAnsDisplayed].questionPrint.question;
	// alert(questionHeading.innerHTML);
     questionSheet[totalAnsDisplayed].questionPrint.answerVisited=true;
     for(var i=0;i<questionSheet[totalAnsDisplayed].questionPrint.answers.length;i++)
     {
         var label=document.createElement("text");
         var node = document.createElement("input");
         node.type="radio";
         node.name="Ans:"+totalAnsDisplayed;
         node.value=questionSheet[totalAnsDisplayed].questionPrint.answers[i];
		 console.log(node.value);
		 node.onclick = function () {
				$('#btn_next').removeAttr('disabled');
			};
			node.style.color='red';
         label.innerHTML=questionSheet[totalAnsDisplayed].questionPrint.answers[i];
         answerDiv.appendChild(node);
         answerDiv.appendChild(label);
          answerDiv.appendChild(document.createElement("br"));
     }
   
}
var score=0;
function setScore()
{
	
    for(var i=0;i<questionSheet.length;i++)
	{
		
	}
}
function displayScore()
{
 alert(score); 
}

 btn_next.onclick=function()
 {	
 
		var answeredValue;
		for(var i=0;i<answerDiv.childNodes.length;i++)
		{
			if(answerDiv.childNodes[i].checked)
			{
				answeredValue=answerDiv.childNodes[i].value;
			}
		}
		//alert(questionSheet[totalAnsDisplayed].questionPrint.index);
		if(answeredValue==questionSheet[totalAnsDisplayed].questionPrint.getAnswer())
			score++;
		else 
			score--;
		console.log("correct: "+questionSheet[totalAnsDisplayed].questionPrint.getAnswer()+
		"\n"+"Answered: "+answeredValue+"\n Score:"+score
		
		
		);
		while (answerDiv.firstChild) 
		{
			answerDiv.removeChild(answerDiv.firstChild);
		} 
		btn_next.setAttributeNode(document.createAttribute('disabled'));
		displayQues();

};



