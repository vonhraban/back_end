/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * 
 * @param {string} name
 * @param {integer} score
 * @param {integer} difficulty
 */
function Question(name, score, difficulty)
{
    var self = this;
    self.name = name;
    self.score = score;
    self.difficulty = difficulty;
}

// Overall viewmodel for this screen, along with initial state
function QuestionsViewModel() {
    var self = this;   

    // Editable data
    self.questions = ko.observableArray([]);

    self.removeQuestion = function(question) { self.questions.destroy(question) }
    
    //Kezdő adatok beállítása
    var mappedQuestions = $.map(
        initQuestions,
        function(item) {
            return new Question(item.name, item.score, item.difficulty);
        }
    );
    self.questions(mappedQuestions);
}

ko.applyBindings(new QuestionsViewModel());