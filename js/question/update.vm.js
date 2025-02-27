/**
 * Egy tag-et reprezentáló osztály
 * 
 * @param {integer} tag_id
 * @param {string} name
 */
function Tag(tag_id, name)
{
    var self = this;
    
    self.name = name + ' <i class="icon icon-remove" ></i>' + '<input type="hidden" name="Question[tags][]" value="' + tag_id + '" />';
    self.id = tag_id;
}

/**
 * 
 * 
 * @param {integer} option_id
 * @param {string} text
 * @param {boolean} correct
 */
function Option(option_id, text, correct)
{
    var self = this;
    
    self.text = ko.observable(text);
    self.option_id = option_id;
    self.correct = ko.observable(correct == 1);
}

/**
 * Question módosítása
 * 
 * @returns {undefined}
 */
function UpdateViewModel() {
    var self = this;   

    /**
     * Tagek
     */
    self.tags = ko.observableArray([]);
    
    /**
     * Option-ök, válaszlehetőségek
     */
    self.options = ko.observableArray([]);
    
    /**
     * Új válaszlehetőség hozzáadásához kell
     */
    self.newOption = ko.observable();

    /**
     * Kitörli a tag-et a felületről
     * 
     * @param {Tag} tag
     */
    self.removeTag = function(tag) {
        self.tags.destroy(tag);
    }

    /**
     * Kitörli a válaszlehetőséget
     * 
     * @param {Question} question
     */
    self.removeQuestion = function(question) {
        self.options.destroy(question);
    }

    /**
     * Hozzáad egy tag-e a felülethez
     * 
     * @param {integer} tag_id
     * @param {string} name
     */
    self.addTag = function(tag_id, name) {
        self.tags.push(new Tag(tag_id, name));
    }

    self.addOption = function() {
        self.options.push(new Option(null, self.newOption(), 0));
        self.newOption('');
    }
    
    //Kezdő adatok beállítása
    var mappedTags = $.map(
        initTags,
        function(item) {
            return new Tag(item.tag_id, item.name);
        }
    );
    self.tags(mappedTags);
    
    var mappedOptions = $.map(
        initOptions,
        function(item) {
            return new Option(item.option_id, item.text, item.correct);
        }
    );
    self.options(mappedOptions);
    
}

var questionVM = new UpdateViewModel();
ko.applyBindings(questionVM);

