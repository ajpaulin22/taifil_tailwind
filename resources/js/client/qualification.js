(function() {
    
    const Qualification = function() {
        return new Qualification.init();
    }
    Qualification.init = function() {
        this.token = $("meta[name=csrf-token]").attr("content");
        this.quill;
        this.modal;
    }
    Qualification.prototype = {
       getData:function(id){
        let self= this;
        $.ajax({
            url:"/client/qualification/get-data",
            type:"GET",
            data:{
                _token:self.token,
                ID:id
            },
            dataType:"JSON",
            success:function(promise){
                
                if(promise.success){
                    quill.root.innerHTML = promise.data[0].content;
                    modal.show();
                }else if (!promise.success && promise.messageTitle == "empty"){
                    modal.show();
                }else(
                    console.log(promise.message)
                )
            }
        })
       },
       saveUpdate:function(){
        $.ajax({
            url:"/client/qualification/post-qualification",
            type:"POST",
            data:{
                _token:qualification.token,
                content:quill.root.innerHTML,
                type:location.search.slice(6),
                id:$("#id-content").val()
             },
            dataType:"JSON",
            success:function(promise){
                if(promise.success){
                    modal.hide();
                    quill.root.innerHTML = "";
                    iziToast.success({
                        class:'rounded-lg overflow-hidden',
                        title: promise.messageTitle,
                        message: promise.message,
                        position:'topRight'
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            }
        })
       }
    }
    Qualification.init.prototype = Qualification.prototype;

   

    var qualification = Qualification();
   $(document).ready(function() {


    const options = {
        placement: 'bottom-right',
        backdrop: 'dynamic',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        closable: true,
      };
    modal = new flowbite.Modal($("#qualification-modal")[0],options);

    quill = new Quill('#content',{modules: { 
            toolbar: '#toolbar-container'
        },
            scrollingContainer: '#scrolling-container', 
            placeholder: 'Compose your Qualifications',
            theme: 'snow'
    });

    $("#edit").on("click",function(){
        
        qualification.getData($("#id-content").val())
    })
    $(".close-modal").on("click",function(){
        modal.hide();
        quill.root.innerHTML = "";
    })

    $("#save_qualification").on("click",function(){
        qualification.saveUpdate()
    });

    });
})();


window.history.forward();

function noBack() {
    window.history.forward();
}
setTimeout("noBack()", 0);
window.onunload = function() { null };