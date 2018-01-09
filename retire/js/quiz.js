
var questionHeading = document.getElementById('question');
var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option3 = document.getElementById("option3");
var option4 = document.getElementById("option4");

function questionBlueprint() {
    this.questionPrint = {
        question: "",
        answers: [],
        index: -1,
        answerType: "",
        getAnswer: function () {
            return this.answers[index];
        },
        getAnswerType: function () {
            return this.answerType;
        },
        setAnswer: function (ind) {
            index = ind;
        },
        setAnswerType: function (type) {
            this.answerType = "" + type;
        }
    };
};

var questionSheet = [];
for (var i = 0; i < 5; i++)
    questionSheet[i] = new questionBlueprint();

// Hard coded End
questionSheet[0].questionPrint.question = "What drink do you prefer?";
questionSheet[1].questionPrint.question = "	What season do you like best?";
questionSheet[2].questionPrint.question = "Choose an activity!";
questionSheet[3].questionPrint.question = "Would you rather live in...";
questionSheet[4].questionPrint.question = "What culture appeals to you most?";

questionSheet[0].questionPrint.answers = ['water', 'coffee', 'tea', 'soda'];
questionSheet[1].questionPrint.answers = ['summer', 'spring', 'autumn', 'winter'];
questionSheet[2].questionPrint.answers = ['skiing', 'hiking', 'water-skiing', 'shopping'];
questionSheet[3].questionPrint.answers = ['city', 'country', 'jungle', 'caves'];
questionSheet[4].questionPrint.answers = ['Western', 'Asian', 'Eastern', 'Latin'];

questionSheet[0].questionPrint.setAnswer(3);
questionSheet[1].questionPrint.setAnswer(2);
questionSheet[2].questionPrint.setAnswer(1);
questionSheet[3].questionPrint.setAnswer(2);
questionSheet[4].questionPrint.setAnswer(2);

questionSheet[0].questionPrint.setAnswerType("button");
questionSheet[1].questionPrint.setAnswerType("button");
questionSheet[2].questionPrint.setAnswerType("button");
questionSheet[3].questionPrint.setAnswerType("button");
questionSheet[4].questionPrint.setAnswerType("button");
// Hard coded End
var totalAnsDisplayed = 0;
//alert(questionSheet.length);
function displayQues() {

    if (totalAnsDisplayed >= questionSheet.length - 1) {
        displayScore();
        return;
    }
    questionHeading.innerHTML = questionSheet[totalAnsDisplayed].questionPrint.question;
    option1.innerHTML = questionSheet[totalAnsDisplayed].questionPrint.answers[0];
    option2.innerHTML = questionSheet[totalAnsDisplayed].questionPrint.answers[1];
    option3.innerHTML = questionSheet[totalAnsDisplayed].questionPrint.answers[2];
    option4.innerHTML = questionSheet[totalAnsDisplayed].questionPrint.answers[3];

    totalAnsDisplayed++;
}
displayQues();
var selection = [];
function saveScore(o) {
    if (o == '1')
        selection.push(option1.innerHTML);
    else if (o == '2')
        selection.push(option2.innerHTML);
    else if (o == '3')
        selection.push(option3.innerHTML);
    else if (o == '4')
        selection.push(option4.innerHTML);
    displayQues();
}
var link="";
function displayScore() {
    var glow = ['Pakistan', 'Argentina', 'France', 'America', 'Germany'];
    let i= Math.floor(Math.random() * (glow.length - 1)) + 1;
    document.getElementById('middleStage').style.display = 'none';
    document.getElementById('FinalStage').style.display = 'inline';
    document.getElementById('reI').src = "img/retire/"+i+".png";
    link="http://fbtofun.com/apps/img/retire/"+i+".png";
    
}

