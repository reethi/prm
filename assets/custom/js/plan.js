$(function(){
		
	//	onloadUpdateFunction();
	
	
    $("#suggested_amt").html(stringConversion(parseInt(numberConversion($("#suggested_amt").html()))));
	var totamt = numberConversion($("#suggested_amt").html());
	if (totamt>0) {
		var termamnt = numberConversion($("#term_slider_value").html());
		var permamt = numberConversion($("#permanent_value").val());
		var termdur = numberConversion($("#term_duration_slider_value").html());
		var permdur = numberConversion($("#permanent_duration_slider_value").html());
		
		totalCalculations(numberConversion($("#suggested_amt").html()),termamnt,permamt,termdur,permdur);	
	}
	
	//housingCheck();
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
	
	
	
    //On selecting gender
	$("input[name=gender]").click(function(){
		genderCheck();
	});
	
	//On selecting Marital Status
	$("input[name=maritial_status]").click(function(){
		maritialstatusCheck();
	});
	
	//Age Slider
		var age = $('#age_slider_input').html();
		age = ( age !== '' ? age : 0 );
		
		$("#slider_age").noUiSlider({
				range: [0, 100]
			   ,start: age
			   ,step: 1
			   ,handles: 1
			  ,serialization: {
				   to: [ $("#age_slider_input"), 'html' ]
			   }
			   
		   }).change( function(){
				var ageval = parseInt($("#age_slider_input").html());
				$("#age_slider_input").html(ageval);
				getFinalResult();
				var personaldets = new Array();
				personaldets['age'] = ageval;
				updatePersonalDetails(personaldets);
		});
		$("#age_slider_input").html((parseInt(($("#age_slider_input").html()))));
		
		// Select State
		$("select[name=state]").change(function(){
				stateCheck();	
		});
		
		$("input[name=housing_situation]").click(function(){
				housingCheck();  
		});
		
		$("input[name=owe_amount]").change(function(){
			oweAmountUpdate(1);
			//getFinalResult();
		});
		
		$("input[name=monthly_rent]").change(function(){
			oweAmountUpdate(2);
		});
		
		$('.qtyplus').click(function(e){
			e.preventDefault();
			fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal)) {
			    $('input[id='+fieldName+']').val(currentVal + 1);
			} else {
	            $('input[id='+fieldName+']').val(0);
			}
			getFinalResult();
			var personaldets = new Array();
		    personaldets['no_children'] = currentVal + 1;
		    updatePersonalDetails(personaldets);
		});
		
		$(".qtyminus").click(function(e) {
			e.preventDefault();
            fieldName = $(this).attr('field');
			var currentVal = parseInt($('input[name='+fieldName+']').val());
			if (!isNaN(currentVal) && currentVal > 0) {
				$('input[id='+fieldName+']').val(currentVal - 1);
			} else {
				$('input[id='+fieldName+']').val(0);
			}
			getFinalResult();
			var personaldets = new Array();
		    personaldets['no_children'] = currentVal - 1;
		    updatePersonalDetails(personaldets);
		});
		
		
		
		$("input[name=pay_college]").change(function(){
				collegeCheck();
		});
		
		
		var incomeval = $('#income_slider_input').html();
		incomeval = ( incomeval !== '' ? incomeval : 0 );
		
		$("#income_slider").noUiSlider({
				range: [0, 400000]
			   ,start: incomeval
			   ,step: 1000
			   ,handles: 1
			   ,serialization: {
				   to: [ $("#income_slider_input"), 'html' ]
			   }
			   ,slide:function(){
						//$("#income_slider_input").html(stringConversion(parseInt($("#income_slider_input").html())));
				}
			   
		   }).change( function(){
				//alert(stringConversion(parseInt($("#income_slider_input").html())));
				$("#income_slider_input").html(stringConversion(parseInt(numberConversion($("#income_slider_input").html()))));
				var personaldets = new Array();
				personaldets['income_after_taxes'] = parseInt(numberConversion($("#income_slider_input").html()));
				updatePersonalDetails(personaldets);
				getFinalResult();
		});
		$("#income_slider_input").html(stringConversion(parseInt(numberConversion($("#income_slider_input").html()))));
		
		var loanval = $('#loans_slider_input').html();
		loanval = ( loanval !== '' ? loanval : 0 );
		$("#loans_slider").noUiSlider({
				range: [0, 1000000]
			   ,start: loanval
			   ,step: 1000
			   ,handles: 1
			   ,serialization: {
				   to: [ $("#loans_slider_input"), 'html' ]
			   }
			   
		   }).change( function(){
				//alert($("#age_slider_input").val());
				$("#loans_slider_input").html(stringConversion(parseInt(numberConversion($("#loans_slider_input").html()))));
				var personaldets = new Array();
				personaldets['current_loans'] = parseInt(numberConversion($("#loans_slider_input").html()));
				updatePersonalDetails(personaldets);
				getFinalResult();
		});
		$("#loans_slider_input").html(stringConversion(parseInt(numberConversion($("#loans_slider_input").html()))));
		
		var assetval = $('#assets_slider_input').html();
		assetval = ( assetval !== '' ? assetval : 0 );
		$("#assets_slider").noUiSlider({
				range: [0, 1000000]
			   ,start: assetval
			   ,step: 1000
			   ,handles: 1
			   ,serialization: {
				   to: [ $("#assets_slider_input"), 'html' ]
			   }
			   
		   }).change( function(){
				//alert($("#age_slider_input").val());
				$("#assets_slider_input").html(stringConversion(parseInt(numberConversion($("#assets_slider_input").html()))));
				var personaldets = new Array();
				personaldets['any_assets'] = parseInt(numberConversion($("#assets_slider_input").html()));
				updatePersonalDetails(personaldets);
				getFinalResult();
		});
		$("#assets_slider_input").html(stringConversion(parseInt(numberConversion($("#assets_slider_input").html()))));
		
		
		
		
		// Related to table of suggestions
		
		$("#permanent_value").change(function() {
			
			var total_amount = numberConversion($('#insurance_need_suggested').html());
			
			var total_amt =  total_amount;
			//var total_amt = (jQuery("input[name=user_selection]:checked").closest('tr').children('td.amount').text());
			var perm_val = numberConversion($('#permanent_value').val());
			var term_val = numberConversion($('#term_slider_value').html());
			
			var rem_amt = parseInt(total_amt) - parseInt(perm_val);
			if (!rem_amt < perm_val) {
				var amount = parseInt(total_amt)- parseInt(term_val) - parseInt(perm_val) ;
				wholeslider(amount,total_amt);
				var perm_percent = roundNumber((parseInt(perm_val)/parseInt(total_amount))*100);
				$('#permanent_percentage').html(perm_percent);
				
				var duration_t = $('#permanent_duration_slider_value').html();
				$('#permanent_month_premiuem').html(stringConversion(monthPremiuem(perm_val,'p',parseInt(duration_t))));
				$('#permanent_year_premiuem').html(stringConversion(yearPremiuem(perm_val,'p',parseInt(duration_t))));
				monthtotal();
				yeartotal();
				calculatePercentage();
			
			}else{
				$('#permanent_value').val(stringConversion(rem_amt));
				var perm_percent = roundNumber((parseInt(rem_amt)/parseInt(total_amount))*100);
				$('#permanent_percentage').html(perm_percent);
				
				var duration_t = $('#permanent_duration_slider_value').html();
				$('#permanent_month_premiuem').html(stringConversion(monthPremiuem(rem_amt,'p',parseInt(duration_t))));
				$('#permanent_year_premiuem').html(stringConversion(yearPremiuem(rem_amt,'p',parseInt(duration_t))));
				monthtotal();
				yeartotal();
				calculatePercentage();
					
			}
					
			
		});
		
});


/**************Functions************************************************/
function getFinalResult(){
	var ageChecked = numberConversion($('#age_slider_input').html());
	var incomeval = numberConversion($('#income_slider_input').html());
	
	var incomeamt = 0;
	if (ageChecked>0 && incomeval > 0) {
		//incomeamt = incomeval * (60 - ageChecked) * 0.75 * 1.33;
		incomeamt = incomeval * (10) * 0.75 * 1.33;
	}
	
	var housingChecked = jQuery("input[name=housing_situation]:checked").val();
	var owe_amount = 0;
	if (housingChecked==1) {
		owe_amount = $('#owe_amount').val();
		if (owe_amount=='') {
			owe_amount = 0;
		}
		owe_amount = parseInt(owe_amount);
	}
	
	//var childrenChecked = jQuery("input[name=have_children]:checked").val();
	var pay_college = jQuery("input[name=pay_college]:checked").val();
	var childamt = 0;
	if (pay_college==1) {
		var children_count = jQuery("#no_children").val();
		childamt = children_count *125000;
	}
	
	var loanval = numberConversion($('#loans_slider_input').html());
	var assetval = numberConversion($('#assets_slider_input').html());
	//alert(parseInt(numberConversion(loanval)));
	var finalVal = parseFloat(incomeamt) + parseInt(childamt) + parseInt(owe_amount) + parseInt((loanval)) - parseInt((assetval));
	
	if (finalVal<=0) {
		finalVal = 0;
		$('#suggested_amt').html(stringConversion(finalVal));
		var suggested_amt = 0;
	}else{
		var suggested_amt = Math.round(finalVal);
		$('#suggested_amt').html(stringConversion(suggested_amt));
	
	}
	if (suggested_amt>0) {
		totalCalculations(suggested_amt,0,0,10,10);
		$('#update_div').hide();
	}else{
		$('#update_div').show();
	}
	var personaldets = new Array();
	personaldets['suggested_amt'] = suggested_amt;
	updatePersonalDetails(personaldets);
	
}
		
		
function totalCalculations(total_amount,term_amount,perm_amount,term_dur,perm_dur) {
    var term_amount_max = (term_amount!=0)?term_amount:total_amount;
	var perm_amount_max = (perm_amount!=0)?perm_amount:(total_amount -  term_amount_max);
	
	termslider(total_amount,term_amount_max);
	permanentValue(perm_amount_max,total_amount)
	termdurationslider(term_dur);
	//permanentdurationslider(perm_dur)
	
	var term_m_prem = monthPremiuem(term_amount_max,'t',term_dur);
	var perm_m_prem = monthPremiuem(perm_amount_max,'p',perm_dur);
	//alert(term_dur);
	var term_y_prem = yearPremiuem(term_amount_max,'t',term_dur);
	var perm_y_prem = yearPremiuem(perm_amount_max,'p',perm_dur);
	//alert(term_dur);
	$('#term_month_premiuem').html(stringConversion(term_m_prem));
	$('#term_year_premiuem').html(stringConversion(term_y_prem));
	$('#permanent_month_premiuem').html(stringConversion(perm_m_prem));
	$('#permanent_year_premiuem').html(stringConversion(perm_y_prem));
	monthtotal();
	yeartotal();
	
	var personaldets = new Array();
	
	personaldets['term_amount'] = term_amount_max;
	personaldets['term_percent'] = (term_amount_max/total_amount)*100;
	personaldets['term_month_premiuem'] = term_m_prem;
	personaldets['term_year_premiuem'] = term_y_prem;
	personaldets['term_duration'] = term_dur;
	
	personaldets['permanent_amount'] = perm_amount_max;
	personaldets['permanent_percent'] = (perm_amount_max/total_amount)*100;
	personaldets['permanent_month_premiuem'] = perm_m_prem;
	personaldets['permanent_year_premiuem'] = perm_y_prem;
	personaldets['permanent_duration'] = perm_dur;
	
	updatePersonalDetails(personaldets);
	
}

function termslider(total_amount,maxvalue) {
		//alert(maxvalue);
	$('#term_slider_value').html(stringConversion(maxvalue));
	$('#term_percentage').html(roundNumber((parseInt(maxvalue)/parseInt(total_amount))*100));
	
	var duration = $('#term_duration_slider_value').html();
	$('#term_month_premiuem').html(stringConversion(monthPremiuem(maxvalue,'t',parseInt(duration))));
	$('#term_year_premiuem').html(stringConversion(yearPremiuem(maxvalue,'t',parseInt(duration))));
	monthtotal();
	yeartotal();
	//calculatePercentage();
	
	$("#term_slider").slider({
		range: "min",
		value: maxvalue,
		step: 100000,
		min: 0,
		max: total_amount,
		slide: function (event, ui) {
			$('#term_slider_value').html(stringConversion(ui.value));
			var term_percent = roundNumber((parseInt(ui.value)/parseInt(total_amount))*100);
			$('#term_percentage').html(term_percent);
			var amount = parseInt(total_amount) - parseInt(ui.value);
			//wholeslider(amount,total_amount);
			permanentValue(amount,total_amount);
			
			var duration_t = $('#term_duration_slider_value').html();
			$('#term_month_premiuem').html(stringConversion(monthPremiuem(ui.value,'t',parseInt(duration_t))));
			$('#term_year_premiuem').html(stringConversion(yearPremiuem(ui.value,'t',parseInt(duration_t))));
			monthtotal();
			yeartotal();
			//calculatePercentage();
			var personaldets = new Array();
			personaldets['term_amount'] = parseInt(ui.value);
			personaldets['term_percent'] = term_percent;
			personaldets['term_month_premiuem'] = monthPremiuem(ui.value,'t',parseInt(duration_t));
			personaldets['term_year_premiuem'] = yearPremiuem(ui.value,'t',parseInt(duration_t));
			personaldets['term_duration'] = duration_t;
							
			updatePersonalDetails(personaldets);
				
		}
	});
	//testfunction();
}

function permanentValue(maxvalue,total_amount){
			
	$('#permanent_value').val(stringConversion(maxvalue));
	$('#permanent_percentage').html(roundNumber((parseInt(maxvalue)/parseInt(total_amount))*100));
	
	var duration_t = $('#permanent_duration_slider_value').html();
	$('#permanent_month_premiuem').html(stringConversion(monthPremiuem(maxvalue,'p',parseInt(duration_t))));
	$('#permanent_year_premiuem').html(stringConversion(yearPremiuem(maxvalue,'p',parseInt(duration_t))));
	monthtotal();
	yeartotal();
	//calculatePercentage();
	var personaldets = new Array();
	
	personaldets['permanent_amount'] = maxvalue;
	personaldets['permanent_percent'] = roundNumber((parseInt(maxvalue)/parseInt(total_amount))*100);
	personaldets['permanent_month_premiuem'] = monthPremiuem(maxvalue,'p',parseInt(duration_t));
	personaldets['permanent_year_premiuem'] = yearPremiuem(maxvalue,'p',parseInt(duration_t));
	personaldets['permanent_duration'] = duration_t;
	
	updatePersonalDetails(personaldets);
}




function termdurationslider(slideval) {
	var termslideval = $('#term_duration_slider_value').html();
	if (termslideval) {
		slideval = termslideval;
	}else{
		slideval = slideval;
	}
	
	$('#term_duration_slider_value').html(slideval);
	$("#term_duration_slider").slider({
		range: "min",
		value: slideval,
		step: 1,
		min: 0,
		max: 30,
		slide: function (event, ui) {
			$('#term_duration_slider_value').html(ui.value);
			
			var termval = parseInt(numberConversion($('#term_slider_value').html()));
			$('#term_month_premiuem').html(stringConversion(monthPremiuem(termval,'t',parseInt(ui.value))));
			$('#term_year_premiuem').html(stringConversion(yearPremiuem(termval,'t',parseInt(ui.value))));
			monthtotal();
			yeartotal();
			//calculatePercentage();
			
			var personaldets = new Array();
	
				personaldets['term_month_premiuem'] = monthPremiuem(termval,'t',parseInt(ui.value));
				personaldets['term_year_premiuem'] = yearPremiuem(termval,'t',parseInt(ui.value));
				personaldets['term_duration'] = ui.value;
				
				updatePersonalDetails(personaldets);
				
		}
	});
	
}
function permanentdurationslider(slideval) {
	var permslideval = $('#permanent_duration_slider_value').html();
	if (permslideval) {
		slideval = permslideval;
	}else{
		slideval = slideval;
	}
	
	$('#permanent_duration_slider_value').html(slideval);
	$("#permanent_duration_slider").slider({
		range: "min",
		value: slideval,
		step: 1,
		min: 0,
		max: 30,
		slide: function (event, ui) {
			$('#permanent_duration_slider_value').html(ui.value);
			
			var permval = parseInt(numberConversion($('#permanent_value').val()));
			
			$('#permanent_month_premiuem').html(stringConversion(monthPremiuem(permval,'p',parseInt(ui.value))));
			$('#permanent_year_premiuem').html(stringConversion(yearPremiuem(permval,'p',parseInt(ui.value))));
			monthtotal();
			yeartotal();
			//calculatePercentage();
			
			var personaldets = new Array();
		     
		    personaldets['permanent_month_premiuem'] = monthPremiuem(permval,'p',parseInt(ui.value));
			personaldets['permanent_year_premiuem'] = yearPremiuem(permval,'p',parseInt(ui.value));
			personaldets['permanent_duration'] = ui.value;
				
				updatePersonalDetails(personaldets);
	
		}
	});
	
}

function monthtotal() {
	
	var monthtotal =  parseFloat(numberConversion($('#term_month_premiuem').html()))+parseFloat(numberConversion($('#permanent_month_premiuem').html()));
	$('#total_month_premiuem').html(stringConversion(roundNumber(monthtotal)));
	
	var personaldets = new Array();
	
	personaldets['month_total'] = monthtotal;
   
	updatePersonalDetails(personaldets);
}

function yeartotal() {
	//var yeartotal =  parseFloat(numberConversion($('#term_year_premiuem').html()))+parseFloat(numberConversion($('#whole_year_premiuem').html()))+parseFloat(numberConversion($('#permanent_year_premiuem').html()));
	var yeartotal =  parseFloat(numberConversion($('#term_year_premiuem').html()))+parseFloat(numberConversion($('#permanent_year_premiuem').html()));
	$('#total_year_premiuem').html(stringConversion(roundNumber(yeartotal)));
	
	var personaldets = new Array();
	
	 personaldets['year_total'] = yeartotal;
	
	updatePersonalDetails(personaldets);
}

function calculatePercentage(){
	var tot_sal = $('#total_salary').val();
	var tot_year = parseFloat(numberConversion($('#total_year_premiuem').html()));
	var percentage = (roundNumber(tot_year/tot_sal))*100;
	$('.easy-pie-chart').attr('data-percent',percentage);
	$('.percent').html(percentage);
	pieChart();
}

function monthPremiuem(amnt,i_type,years){
	if (i_type=='t') {
		var premamt = amnt*(0.000125/20)*years;	
	}else if(i_type=='w'){
		var premamt = amnt*(0.0025/20)*years;	
	}else if (i_type=='p') {
		var premamt = amnt*(0.0025/20)*years*1.21;	
	}
	return roundNumber(premamt);
}

function yearPremiuem(amnt,i_type,years){
	if (i_type=='t') {
		var premamt = amnt*(0.0012/20)*years;	
	}else if(i_type=='w'){
		var premamt = amnt*(0.02/20)*years;	
	}else if (i_type=='p') {
		var premamt = amnt*(0.02/20)*years*1.21;	
	}
	return roundNumber(premamt);
}
		
function stringConversion(givennum){
	return givennum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function numberConversion(givennum){
	return givennum.replace(/[^\d\.\-\ ]/g, '')
}

function roundNumber(num) {
	return num.toString().indexOf(".") != -1 ? num.toFixed(2) : num;
}