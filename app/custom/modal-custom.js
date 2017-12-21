
$(document).ready(function(){
	$(document).on("click", ".group-share-modal .share-modal", function () {
	    var contentPost=$(this).data('content');
	    var userPost=$(this).data('user');
	    var typePost=$(this).data('typepost');
	    var idPost=$(this).data('id');
	    var idUserShare=$(this).data('useridshare');
	    var extraContentPost=$(this).data('extracontent');
	    $('.post-content .share-post-content').html(contentPost);
	    $('#share-title').html("Share "+userPost+"'s Post");
	    var extraContentType="";

	    switch(typePost){
	    	case 1:
	    		extraContentType=
	    		'<div class="post-thumb">'+
					'<img class="gif-play-image" src="<?php echo base_url();?>uploads/post/photo/'+extraContentPost+'" alt="gif"></div>';
				break;
	    	case 2:
	    		extraContentType=
				'<div class="post-video">'+
					'<div class="video-thumb f-none">'+
						'<img src="<?php echo base_url();?>uploads/post/video/'+extraContentPost+'" alt="photo">'+
						'<a href="<?php echo base_url();?>uploads/post/video/'+extraContentPost+'" class="play-video">'+
							'<svg class="olymp-play-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo base_url();?>app/icons/icons.svg#olymp-play-icon"></use></svg></a></div></div>';
				break;
			default:
				break;
	    }
	    $('#idPost').val(idPost);
	    $('#idUser').val(idUserShare);

	    $('#extra-content-post').html(extraContentType);
	    $('#share-post').modal('show');
	});

    $("button#submitSharePost").click(function(){
        $.ajax({
            url: '<?php echo base_url();?>Newsfeed/sharePost',
            type: 'POST', //or POST
            data: $(".form-share-post *").serializeArray(),
            success: function(data){
                 alert(data);
            }
        });
    });
});
