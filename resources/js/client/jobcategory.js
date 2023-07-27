(function() {
    
    const JobCategory = function() {
        return new JobCategory.init();
    }
    JobCategory.init = function() {
        this.token = $("meta[name=csrf-token]").attr("content");
    }
    JobCategory.prototype = {
        
    }
    JobCategory.init.prototype = JobCategory.prototype;

   

    var jobcategory = JobCategory();
   $(document).ready(function() {
    setTimeout(() => {
        $("#opening").hide();
    }, 300);
    });
})();


window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };