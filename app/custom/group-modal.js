$(document).ready(function(){
	$(document).on("click",".create-group", function () {
	    $('#create-group').modal('show');
	});

    $("button#submitGroup").click(function(){
    	var idUser=$('#create-group').data('user');
    	var nameGroup=$('#nameGroup').val();
    	if(nameGroup!=""){
	        $.ajax({
	            url: 'http://localhost/proyek_fai/Groups/createGroup',
	            type: 'POST', //or POST
	            dataType:"json",
	            data:{idUser:idUser,nameGroup:nameGroup},
	            success: function(data){
	                 alert("success");
	            }
	        });
    	}
    });

});