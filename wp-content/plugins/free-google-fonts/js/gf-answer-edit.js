function GfValidateAnswerEdition() {
    var answer = jQuery('#answer').val();
    
    if (answer.trim().length == 0) {
        alert('You have to fill answer.');
        jQuery('#answer').focus();
        return false;
    }       
    
    return confirm('Are you sure you want to save answer data?');
}