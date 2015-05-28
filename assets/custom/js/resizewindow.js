$(document).ready(function(){
	var width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;
    if(width <= 976){
    	$("#jumbotron_header").css("margin-top", "70px");
    }else{
    	$("#jumbotron_header").css("margin-top", "0px");
    }          
	$(window).resize(function() {
		width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;
        if(width <= 976){
        	$("#jumbotron_header").css("margin-top", "70px");
        }else{
        	$("#jumbotron_header").css("margin-top", "0px");
        }
	});

    $("#login_button").click(function(){
        var email = $("#login_email").val();
        var password = $("#login_password").val();

        $.ajax({
            type : "POST",
            url : "/accounts/login",
            data : {email : email, password : password}
        }).done(function(msg){
            if(msg == 0){
                $("#error_msg").text("Invalid Username/Password");
            }else{
                window.location.href = '/admin_sessions/index?signin=success';
            }
        });
    });


});