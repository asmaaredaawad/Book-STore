$(function()
{
	$('#category').on("change",function(){
		// d={};
		selected_cID=$('#category option:selected').attr('value');
		console.log(selected_cID);
		$.ajax
			({
				url: "submit_subcategory.php?cat_id='"+selected_cID+"'",
				type: 'GET',
				dataType: 'json',
				// data: d,
				success: function (response) {
					console.log('sucess');
					// response = $.parseJSON(response);
					console.log(response);
					$('#subcategory').empty();
					for (var i = 0; i < response.length; i++) {
						$('#subcategory').append('<option value="'+response[i]['id']+'">'+response[i]['name']+'</option>');
					}

				},
				error: function (error) {
					console.log(error);
				}
			});
	});

});	