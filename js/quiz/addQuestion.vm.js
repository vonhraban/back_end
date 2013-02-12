function QuestionViewModel()
{
    var self = this;
    
    self.ajaxInProgress = ko.observable();
    
    self.toggle = function(link, quiz_id, question_id) {
        self.ajaxInProgress(true);
        link = link.replace('replace_quiz_id', quiz_id);
        link = link.replace('replace_question_id', question_id);
        $.get(link, function(data) {
            $('#view_' + question_id).html(data);
            self.ajaxInProgress(false);
        });
        
    }
}

var questionVM = new QuestionViewModel();

// Activates knockout.js
ko.applyBindings(questionVM);
