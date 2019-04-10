var userIcon = document.getElementsByClassName('header__top-user'),
	userSignIn = document.getElementsByClassName('user__signIn'),
	sticky = document.getElementById("sticky"),
	sidebar = document.getElementById("sidebar")


$(document).ready(function() {

	$('.user__icon').on('click', function() {
		$('.user__signIn').toggleClass('user__signIn-active');
		
		if($('.user__signIn').hasClass('user__signIn-active')) {
			$('.user__icon').html('<i class="fas fa-times"></i>')
		}else {
			$('.user__icon').html('<i class="fas fa-user"></i>')
		}
	})

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#search").keyup(function(){
		var search = $(this).val();
		if(search.length > 0) {
			$('.search__resultsBlock').fadeIn();	
		}

		$.ajax({
			url: "/search",
			type: "POST",
			data: {"search": search},
			cache: false,                         
			success: function(response){
				$(".search__resultsBlock").html(response);
			}
		});
		return false;
	});

	window.onscroll = function() {fixedBlock()};

	$('.commentlist li').each(function(i) {
		$(this).find('div.commentNumber').text('#' + (i+1))
	})

	$('#commentform').on('click', '#submit', function(e) {
		e.preventDefault();

		var comParent = $(this);

		var data = $('#commentform').serializeArray();

		$.ajax({
			url: $('#commentform').attr('action'),
			data: data,
			type: 'POST',
			datatype: 'JSON',
			success: function(response) {
				if(response.errors) {
					$('.wrap_result_errors').fadeIn(500).append('<ul><li>'+response.errors.join('<br />')+'<li></ul>')
					$('.wrap_result_errors').delay(5000).fadeOut(500);
				}	
				else if(response.success) {
					$('.wrap_result').text('Сохранено')
					.delay(500)
					.fadeOut(500, function() {
						if(response.data.parent_id > 0) {
							comParent.parents('div#respond').prev().after('<ul class="children">' + response.comment + '</ul>').fadeIn(500);
						}else {
							if($.contains('#comments', 'ol.commentlist')) {
								$('ol.commentlist').append(response.comment)
							}else {
								$('#respond').after('<ol class="commentlist group">' + response.comment + '</ol>')
							}
						}

						$('#cancel-comment-reply-link').click();
						$('#user_comment').val('');
						setTimeout(function(){
							$('.comment-container').removeClass('newComment')
						},500)
					});
				}
			},
			error:function() {
				alert('error')
			}
		})


	})

	$(".like__up").click(function(e){
		e.preventDefault();
		var articleId = this.getAttribute('data-id')
		$(this).toggleClass('like-active');
		var data = {"articleId":articleId, 'value': 1};
		$.ajax({
			url: "/like",
			type: "POST",
			data: {"data": data},
			cache: false,                          
		   	success: function(response){
		   			$('.likes__count').html(response)
		   	}
		});
	})

	$(".like__down").click(function(e){
		e.preventDefault();
		var articleId = this.getAttribute('data-id')
		$(this).toggleClass('unlike-active');
		var data = {"articleId":articleId, 'value': -1};
		$.ajax({
			url: "/like",
			type: "POST",
			data: {"data": data},
			cache: false,                          
		   	success: function(response){
		   		if(response == 'error') {
		   			alert('Зарегистрируйтесь')
		   		}else {
		   			$('.likes__count').html(response)
		   		}
		   		
		   	}
		});
	})
})




function fixedBlock() {
	if (window.pageYOffset > sticky.offsetTop) {
		sidebar.classList.add("sticky");
	} else {
		sidebar.classList.remove("sticky");
	}
}




