$(function(){
	$('input[name=price]').mask('000.000.000.000.000,00', {reverse:true, placeholder:'0,00'});
	$('#search_name').on('keyup', function(){
		var type = $(this).attr('data-type');
		var q = $(this).val();

		$.ajax({
			url:BASE_URL+'/ajax/'+type,
			type:'POST',
			data:{q:q},
			dataType:'json',
			success:function(json){
				if($('.searchResults').length == 0){
					$('#search_name').after('<div class="searchResults"></div>');
				}
				
				var lf = $('#search_name').offset().left;
				$('.searchResults').css('left', lf+'px');
				var tp = $('#busca').height()+34;	
				$('.searchResults').css('top', $('#search_name').offset().top+tp+'px');

				var html = '';
				for(var i in json){
					html += '<div class="si"><a href="javascript:;" onclick="selectClient(this)" data-id="'+json[i].id+'">'+json[i].name+'</a></div>';
				}
				
				$('.searchResults').html(html);
				$('.searchResults').show();
			}
		});
	});

	$('.client_add_button').on('click', function(e){
		e.preventDefault();
		var name = $('#search_name').val();
		if(name != '' && name.length >= 4){
			if(confirm('Deseja adicionar '+name+'?')){
				$.ajax({
					url:BASE_URL+'/ajax/addClient',
					type:'POST',
					data:{name:name},
					dataType:'json',
					success:function(json){
						$('.searchResults').hide();
						$('input[name=client_id]').val(json.id);
					}
				});
				return false;
			}
		}
	});
});

function selectClient(obj){
	var id = $(obj).attr('data-id');
	var name = $(obj).html();
	$('.searchResults').hide();
	$('#search_name').val(name);
	$('input[name=client_id]').val(id);
}