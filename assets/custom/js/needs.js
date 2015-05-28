function genderCheck(){
	var genderChecked = jQuery("input[name=gender]:checked").val();
	var personaldets = new Array();
	var no_qstn = parseInt($('#questions_answered').val());
	personaldets['gender'] = genderChecked;
	updatePersonalDetails(personaldets);
}

function maritialstatusCheck(){
	var maritialChecked = jQuery("input[name=maritial_status]:checked").val();
	var personaldets = new Array();
	personaldets['maritial_status'] = maritialChecked;
	updatePersonalDetails(personaldets);
}

function stateCheck() {
	var stateChecked = jQuery("select[name=state]").val();
	
	var personaldets = new Array();
	personaldets['state'] = stateChecked;
	updatePersonalDetails(personaldets);
}

function housingCheck(){
	var housingChecked = jQuery("input[name=housing_situation]:checked").val();
	if (housingChecked==1) {
		$('#housing_display_1').show();
		$('#housing_display_2').hide();
		$('#monthly_rent').val('');
	}else if (housingChecked==2) {
		$('#housing_display_2').show();
		$('#housing_display_1').hide();
		$('#owe_amount').val('');
	}
	
	var personaldets = new Array();
	personaldets['housing_situation'] = housingChecked;
	updatePersonalDetails(personaldets);
	getFinalResult();
}

function oweAmountUpdate(amtType){
	if (amtType==1) {
		var owe_amount = jQuery("input[name=owe_amount]").val();
		
	}else if (amtType==2) {
		var owe_amount = jQuery("input[name=monthly_rent]").val();
	}
	
	var personaldets = new Array();
	personaldets['amount_owe_rent'] = owe_amount;
	updatePersonalDetails(personaldets);
	getFinalResult();
}

function collegeCheck(){
	var collegeChecked = jQuery("input[name=pay_college]:checked").val();
	getFinalResult();
	
	var personaldets = new Array();
	personaldets['pay_college'] = collegeChecked;
	updatePersonalDetails(personaldets);
}

function updatePersonalDetails(personaldetails){
		
	var datastring = '';
	for (var i in personaldetails) {
		datastring=datastring+"&"+i+"="+personaldetails[i];	
    }
	//datastring = "&gender=2&mart=1";
	var params = datastring.slice(1);
	
	$.ajax({type: "POST", url: "/lifeinsurance/ajaxrequest",data: params, 
		success: function(data){
			//alert(data);
		},
		error: function (request, status, error) {
		    //alert(error);
		}
	});
}