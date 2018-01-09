
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
for (var i = 0; i < 3; i++)
    questionSheet[i] = new questionBlueprint();

// Hard coded End
questionSheet[0].questionPrint.question = "How often do you drink?";
questionSheet[1].questionPrint.question = "How many GirlFriends Do You have?";


questionSheet[0].questionPrint.answers = ['Once in a Week', 'Twice in a Week', '4 times in a Day', 'Not at all'];
questionSheet[1].questionPrint.answers = ['1', '2', '5', '0'];


questionSheet[0].questionPrint.setAnswer(3);
questionSheet[1].questionPrint.setAnswer(2);


questionSheet[0].questionPrint.setAnswerType("button");
questionSheet[1].questionPrint.setAnswerType("button");

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
function displayScore() {
    var glow = ['Pakistan', 'Argentina', 'France', 'America', 'Germany'];
    let i= Math.floor(Math.random() * (glow.length - 1)) + 1;
    document.getElementById('middleStage').style.display = 'none';
    document.getElementById('FinalStage').style.display = 'inline';
    document.getElementById('reI').src = "img/lovelust/"+i+".PNG";
    
}

