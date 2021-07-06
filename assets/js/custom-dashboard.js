(function($){
    $(document).ready(function(){
    $('#askmodal').modal({
    show: true
    }); 
    // $('#btnnav').toggle();
    // addschedtoUI();
	});

	$('#askbarangay').click(function(){
		event.preventDefault();
	    $('#askmodal').modal("hide"); 
	});

	$('#askcity').click(function(){
		event.preventDefault();
	    $('#askmodal').modal("hide"); 
	});

	$('#openvsform').on('submit',function(){
		event.preventDefault();
		var fd = new FormData(this);

		$.ajax({
			type:"post",
			url: location.origin+":5000/openvs",
			data: fd,
            contentType: false,
            processData: false,
            beforeSend: function(){
            	$('#btnopenvs').html(`<i class="fa fa-circle-o-notch fa-spin"></i> Processing`);
            	$(':input[type="submit"]').prop('disabled', true);
            },
			success:function(response){
				$(':input[type="submit"]').prop('disabled', false);
				 if(response['open']=="Invalid Data"){
				 	swal({
							title: "Invalid Excell File",
							text: "Pls Download the File above for the correct format",
							type: "error",
							showConfirmButton:true
						})
				 	$('#openvsupload').val('');
				 }
				 else if (response['open']=="Blank Data"){
				 	swal({
							title: "Invalid Excell File",
							text: "The File Uploaded Contains 0 rows",
							type: "error",
							showConfirmButton:true
						})
				 	$('#openvsupload').val('');
				 }
				 else if (response['open']=="Short"){
				 	swal({
							title: "Number of Vaccine Station is not sufficient",
							text: "Pls Identify Additional Vaccine Stations",
							type: "error",
							showConfirmButton:true
						})
				 	$('#openvsupload').val('');
				 }
				 else{
				 	swal({
							title: "Optimal Result Found",
							text: "Click the confirm button to see the result",
							type: "success",
							showConfirmButton:true
						})
				 	res = "";

				 	vc = $("#vca").val();
				 	table = response['table']
				 	open = response['open']
				 	if(open.length>0){
					 	res+="<button class='btn btn-danger mb-2'>Save as PDF</button>";
				 	}
				 	for(i=0;i<open.length;i++){
				 		totalcap = 0;
				 		res+="<h5><strong> Day "+(i+1)+": "+vc+" Vaccine Available </strong></h5>";
				 		data = open[i];

				 		console.log(data);
				 		res += "<table class='table'><thead><th><h6>Vaccine Stations to Open</h6></th></thead><tbody>";
				 		res += "<tr><td>";
				 		for(x=0;x<data.length;x++){
				 			res+=data[x][0]+",";
				 			totalcap+=parseInt(data[x][1]);
				 		}
				 		res += "</td></tr>";
				 		res+="</tbody></table>";
				 		if(vc>totalcap){
				 			vc-=totalcap;
				 		}
				 	}
				 	$txt = `<p>Vaccine name: ${$('#vcn').val()} </p><p>Vaccine Amount: ${$('#vca').val()} doses </p><p>Maximum Duration: ${$('#vcd').val()} days </p>`;
				 	$txt += "<table class='table table-striped'><thead><th>Vaccine Stations</th><th>Capacity</th></thead><tbody>";
				 	for(i=0;i<table.length;i++){
				 		$txt+= "<tr>"
				 		$txt+= "<td>"+table[i][0]+"</td>"
				 		$txt+= "<td>"+table[i][1]+"</td>"
				 		$txt+="</tr>"
				 	}

				 	$txt += "</tbody></table>"
				 	$('#inputview').hide();
				 	$('#resultview').show();
				 	$('#resultview #body').html($txt);
				 	$('#resultbtn').show();
				 	$('#resultbtn').html("<div class='card-body mb-0'><button class='btn btn-primary' id='btngoback'>Go back to Input View</button></div>")
				 	$('#resultbody').html(res);
				 }
				 $('#btnopenvs').html(`PROCESS`);
				},
				error: function(request, status, error){
					$(':input[type="submit"]').prop('disabled', false);
					$('#btnopenvs').html(`PROCESS`);
					swal({
							title: "Server Error",
							text: "Cannot Reach the Server, for consecutive errors please contact us at upminnicer@up.edu.ph",
							type: "error",
							showConfirmButton:true
						})
				}
			})

	})

	$(document).on('click','#btngoback',function(){
		$('#resultbtn').html("<div class='card-body mb-0'><button class='btn btn-primary' id='btngotable'>Go back to Table View</button></div>")
		$('#resultview').hide();
		$('#inputview').show();		 	
	})

	$(document).on('click','#btngotable',function(){
		$('#resultbtn').html("<div class='card-body mb-0'><button class='btn btn-primary' id='btngoback'>Go back to Input View</button></div>")
		$('#inputview').hide();
		$('#resultview').show();		 	
	})

})(jQuery)