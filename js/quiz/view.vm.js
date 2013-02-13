/**
 * 
 * @param {string} name
 * @param {integer} score
 * @param {integer} difficulty
 */
function Question(question_id, name, score, difficulty)
{
    var self = this;
    self.name = ko.observable(name);
    self.score = score;
    self.difficulty = difficulty;
    self.question_id = question_id;
}

// Overall viewmodel for this screen, along with initial state
function QuestionsViewModel() {
    var self = this;   

    // Editable data
    self.questions = ko.observableArray([]);

    self.removeQuestion = function(link, question) {
        self.questions.destroy(question);
        link = link.replace('replace_question_id', question.question_id);
        $.get(link);
    }
    
    //Kezdő adatok beállítása
    var mappedQuestions = $.map(
        initQuestions,
        function(item) {
            return new Question(item.question_id, item.name, item.score, item.difficulty);
        }
    );
    self.questions(mappedQuestions);
}
var questionVM = new QuestionsViewModel();
ko.applyBindings(questionVM);