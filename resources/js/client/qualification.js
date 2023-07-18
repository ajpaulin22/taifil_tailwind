(function() {
    
    const Qualification = function() {
        return new Qualification.init();
    }
    Qualification.init = function() {
        this.token = $("meta[name=csrf-token]").attr("content");
    }
    Qualification.prototype = {
        
    }
    Qualification.init.prototype = Qualification.prototype;

   

    var qualification = Qualification();
   $(document).ready(function() {
    setTimeout(() => {
        $("#opening").hide();
    }, 1000);

    var quill = new Quill('#content',{modules: { 
            toolbar: '#toolbar-container'
        },
            scrollingContainer: '#scrolling-container', 
            placeholder: 'Compose your Qualifications',
            theme: 'snow'
    });


    });
})();


window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };