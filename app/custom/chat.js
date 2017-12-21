
	$(document).ready(function(){
		var myVar;
		$(".js-chat-open-custom").on('click', function () {
			$('.popup-chat-responsive').toggleClass('open-chat');
			var name=$(this).data("name");
			var toIdUser=$(this).data("toid");
			var fromIdUser=$(this).data("fromid");
			$("#myPopup").attr("data-toid",toIdUser);
			$("#myPopup").attr("data-fromid",fromIdUser);
			$("#nameUser").html(name);
			checkRoom();
			var room =$("#myPopup").attr("data-room");
			getChatText();
			return false;
		});
	    $(".js-chat-close-custom").on('click', function () {
	        $('.popup-chat-responsive').removeClass('open-chat');
	        return false
	    });
	    $(".chat-box").focusin(function(){
			$(".chat-box" ).on( "keydown", function(event) {
			    if(event.which == 13){
					sendChatText();
					$(".chat-box").val("");
			    } 
			});
			return false
	    })
	    function sendChatText(){
		  var chatInput = $('.chat-box').val();
		  var fromId=$("#myPopup").attr("data-fromid");
		  var room =$("#myPopup").attr("data-room");
		  var baseurl = '<?php echo base_url();?>';

		  if(chatInput != ""){
		    $.ajax({
		      type: "POST",
		      url: "http://localhost/proyek_fai/Chat/sendChat",
		      dataType:"json",
		      data:{idUser:fromId,idRoom:room,contentChat:chatInput,extraContent:""},
		      success:function(data){
		      	alert("success");
		      }
		    });
		  }
		  return false
		}

		function getChatText(){
			var room =$("#myPopup").attr("data-room");
			$.ajax({
				type:"POST",
				url:"http://localhost/proyek_fai/Chat/getChat",
				dataType:"json",
				data:{idRoom:room},
				success:function(data){
					console.log(data);
				}
			});			
		}
		function checkRoom(){
			var fromId=$("#myPopup").attr("data-fromid");
			var toId=$("#myPopup").attr("data-toid");
			var x;
			$.ajax({
				type:"POST",
				url:"http://localhost/proyek_fai/Chat/checkRoom",
				dataType:"json",
				data:{idUser:fromId,idFriend:toId},
				success:function(data){
					if(data==0){
						$("#myPopup").attr("data-room",0);
					}else{
						$("#myPopup").attr("data-room",data[0]["ID_ROOM"]);
					}
				}
			});

		}

	});
