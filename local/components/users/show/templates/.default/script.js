$( document ).ready(function(){
	$('#users_show input[name="name"').keyup(function(){
		if($(this).val().trim()=='')
			return false;
		/*$.ajax({
		   type: "POST",
		   url: "/ajax.php",
		   data: "name="+$(this).val(),
		   success: function(msg){
			   $('.ajax_data').html(msg);
		   }
		 });*/
		 
		$.ajax({
		   type: "POST",
		   url: "/ajax.php",
		   data: "name="+$(this).val(),
		   success: function(msg){
			   data = JSON.parse(msg);
			   table = '<table border="1" cellspacing="1" cellpadding="15"><tr><td><a href="?order=ID&sort='+data['SORT']+'">ID</a></td><td><a href="?order=NAME&sort='+data['SORT']+'">NAME</a></td></tr>';
			   data['ITEMS'].forEach(
					function(item, i, arr){
						table += '<tr><td>'+item['ID']+'</td><td>'+item['NAME']+'</td></tr>';
				});
				table += '</table>';
				$('.ajax_data').html(table);
		   }
		 });
	});
})