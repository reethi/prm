<?php
// array to parameters
function array_to_attributes ($array) {
	$params = ' ';
	foreach ($array as $key => $value) {
		$params .= $key.'="'.$value.'" ';
	}
	return $params;
}

function image_tag($file, $params = array()) {
	$html_params = array_to_attributes($params);
	$image_tag = "<img src='".IMAGES_PATH.$file."' ".$html_params." />";
	return $image_tag;
}

function upload_image_tag($file, $params = array()) {
	$html_params = array_to_attributes($params);
	if ($file) {
		// var_dump($file);
		$image_tag = "<img src='/uploads/".$file."' ".$html_params." />";
		return $image_tag;
	} else {
		if ($params['large'] == true) {
			return placehold(550, 280, array_merge(array('text' => 'No Image'), $params));
		} else if ($params['medium'] == true) {
			return placehold(350, 175, array_merge(array('text' => 'No Image'), $params));
		} else {
			return placehold(50, 50, array_merge(array('text' => 'No Image'), $params));
		}
	}
}

function link_to($text, $url, $params = array()) {
	$link = '<a href="'.$url.'" '.array_to_attributes($params).'>'.$text.'</a>';
	return $link;
}

function redirect_to ($uri = '/') {
	header("Location: {$uri}");
	exit();
}

function humanize($str) {
	$str = trim(strtolower($str));
	$str = preg_replace('/[^a-z0-9\s+]/', ' ', $str);
	$str = preg_replace('/\s+/', ' ', $str);
	$str = explode(' ', $str);
	$str = array_map('ucwords', $str);
	return implode(' ', $str);
}

function required_validation($inputs = array()) {
	$instance = &get_instance();
	foreach ($inputs as $name) {
		$instance->form_validation->set_rules($name, humanize($name), 'required');
	}
}

function input_params($inputs = array(), $method = 'post') {
	$return_inputs;
	$instance = &get_instance();
	foreach ($inputs as $name) {
		$return_inputs[$name] = $instance->input->$method($name);
	}
	return $return_inputs;
}

function current_user() {
	$instance = &get_instance();
	return $instance->user->current_user();
}

function is_admin() {
	$instance = &get_instance();
	$admin = $instance->session->userdata('admin');
	if ($admin) {
		return true;
	} else {
		return false;
	}
}

function is_agent() {
	$instance = &get_instance();
	$agent = $instance->session->userdata('agentid');
	if ($agent) {
		return true;
	} else {
		return false;
	}
}

function current_agent() {
	$instance = &get_instance();
	return $instance->agent->current_agent();
}

function user_signed_in() {
	$instance = &get_instance();
	$uid = $instance->session->userdata('uid');

	if ($uid) {
		return true;
	} else {
		return false;
	}
}

function placehold($width, $height, $params = array()){
	$html_params = array_to_attributes($params);
	if ($params['text'] != null) {
		$text = urlencode($text);
		if ($params['color']) {
			$color = '/' . $params['color'];
		}
		if ($params['background']) {
			$background = '/' . $params['background'];
		}
		return "<img src='http://placehold.it/{$width}x{$height}{$background}{$color}&text={$params['text']}' {$html_params} />";
	} else {
		return "<img src='http://placehold.it/{$width}x{$height}{$background}{$color}' {$html_params} />";
	}
}

function escape_data($data) 
{
	if (ini_get('magic_quotes_gpc')) 
	{
		$data = stripslashes($data);
	}
	return mysql_real_escape_string(trim($data));
}



// application specific helper methods

// function is_admin() {
// 	$user = current_user();
// 	if ($user->is_admin == 1) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }

function redirect_if_not_admin() {
	if (is_admin() != true) {
		if (is_agent()) {
			redirect_to('/agent?access=denied');
		} else if (user_signed_in()) {
			redirect_to('/home?access=denied');
		} else {
			redirect_to('/admin_sessions/signin?required=signin');
		}
	}
}

function redirect_if_not_agent() {
	if (is_agent() != true) {
		if (user_signed_in()) {
			redirect_to('/home?access=denied');
		} else {
			redirect_to('/accounts/signin?required=signin');
		}
	}
}

function full_name($user) {
	return ucfirst($user->first_name." ".$user->last_name);
}

function truncate($str, $length) {
	$actual_str = $str;
	$str_length = strlen($str);
	if ($str_length >= $length) {
		return '<span title="'.$str.'">'.substr($str, 0, $length)."...".'</span>';
	} else {
		return '<span title="'.$str.'">'.$str.'</span>';
	}
}

// validation errors
function set_validation_errors() {
	$instance = &get_instance();
	if (validation_errors()) {
		$instance->session->set_userdata('validation_errors', $instance->form_validation->error_array());
	}
}

function get_validation_errors() {
	$instance = &get_instance();
	$validation_errors = $instance->session->userdata('validation_errors');
	if ($validation_errors) {
		$message = implode('</br>', array_values($validation_errors));
		$instance->session->unset_userdata('validation_errors');
		return alert('Validation Errors!<br/>', $message, 'error');
	}
}

function getPostedTime($timestamp){
	$current = date('Y-m-d H:i:s');
	$difference = abs(strtotime($current) - strtotime($timestamp)); // that's it!

	return $difference;
}


//function to convert date from dd-mm-yyyy to yyyy-mm-dd (or) yyyy-mm-dd to dd-mm-yyyy
function convertDateFormat($date)
	{
		if($date!="")
		{
		$datearray = isset($date)?explode("-",$date):'';
		$converteddate=$datearray[2]."-".$datearray[1]."-".$datearray[0];
		}
		else
		{
		$converteddate="";
		}
		return $converteddate;
	}
	
	
	function replace_quote_characters($text)
			{
                  $find[] = '“';  // left side double smart quote
				  $find[] = '”';  // right side double smart quote
				  $find[] = '‘';  // left side single smart quote
				  $find[] = '’';  // right side single smart quote
				  $find[] = '…';  // elipsis
				  $find[] = '—';  // em dash
				  $find[] = '–';  // en dash

				  $replace[] = '"';
				  $replace[] = '"';
				  $replace[] = "'";
				  $replace[] = "'";
				  $replace[] = "...";
				  $replace[] = "-";
				  $replace[] = "-";

				  $text = str_replace($find, $replace, $text);
								      return $text;
								
		} 	

	 function getIPaddress()
		{
			  $ipaddress = '';
				/*if ($_SERVER['HTTP_CLIENT_IP'])
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				else if($_SERVER['HTTP_X_FORWARDED_FOR'])
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if($_SERVER['HTTP_X_FORWARDED'])
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				else if($_SERVER['HTTP_FORWARDED_FOR'])
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				else if($_SERVER['HTTP_FORWARDED'])
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				else if($_SERVER['REMOTE_ADDR'])
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				else
					$ipaddress = 'UNKNOWN';*/
			 
				return $ipaddress;
		}

    function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
		
?>