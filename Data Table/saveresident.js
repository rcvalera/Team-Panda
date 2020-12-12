$(function(){

	// Getting the data from the input variable
	$('#myForm').submit(function(event){

		var formdata ={
		'fname' : $('input[name=fname]').val(),
		'lname' : $('input[name=lname]').val(),
		'midname' : $('input[name=midname]').val(),
		'alias' : $('input[name=alias]').val(),
		'faceMarks' : $('input[name=faceMarks]').val(),
		'birthday' : $('input[name=birthday]').val(),
		'birthplace' : $('input[name=birthplace]').val(),
		'status' : $('select[name=status]').val(),
		'gender' : $('select[name=gender]').val(),
		'nationality' : $('input[name=nationality]').val(),
		'religion' : $('input[name=religion]').val(),
		'occupation' : $('select[name=occupation]').val(),
		'voter' : $('select[name=voter]').val(),
		'address' : $('input[name=address]').val(),
		'Paddress' : $('input[name=Paddress]').val(),
		'phone' : $('input[name=phone]').val(),
		'email' : $('input[name=email]').val(),
		'phone1' : $('input[name=phone1]').val(),
		'email1' : $('input[name=email1]').val(),
		'Rtype' : $('select[name=Rtype]').val(),
		'Rstatus' : $('select[name=Rstatus]').val()
	}

	// Call Ajax and isnert data to database

	$.ajax({
		method : 'POST',
		url : 'databases/residentReg.php',
		data: {
			form : formdata
		}
	}).done(function(response){
		alert(response);
	});

		event.preventDefault();
	});	

	$tablebody = $('.table-body');

	//display data when page load
	mydata();

	function mydata(){

		$('.table .table-data2 tr').remove();

		$.ajax({
			method: 'POST',
			url: 'databases/residentReg.php',
			data: {
				bool: 'true'
			},
			dataType: 'json'
		}).done (function (response){

			$.each(response, function(index,array1){
					$tablebody.append("<tr>");
				$.each(array1, function(key, value){
					$('.fetch_data tr').eq(index).append("<td>" + value + "</td>");
				})
			})
		})

	}
});
