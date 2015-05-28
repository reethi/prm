<?php

function modal_form_tf($field, $params = array()) {
	$label = ucwords(humanize($field));
	$placeholder = ($params['placeholder']) ? $params['placeholder'] : $label;
	$html_params = array_to_attributes($params);
	$content = 
	"<div class='input-prepend control-group' id='{$field}_container'>";
	$content .= 
		"<label for='{$field}'>{$label}</label>";
	$content .= 
		"<input type='text' placeholder='{$placeholder}' name='{$field}' id='{$field}' {$html_params}/>";
	$content .= 
	"</div>";

	return $content;
}

function modal_form_password($field, $params = array()) {
	$label = ucwords(humanize($field));
	$html_params = array_to_attributes($params);
	$content = 
	"<div class='input-prepend control-group' id='{$field}_container'>";
	$content .= 
		"<label for='{$field}'>{$label}</label>";
	$content .= 
		"<input type='password' placeholder='{$label}' name='{$field}' id='{$field}' {$html_params}/>";
	$content .= 
	"</div>";

	return $content;
}

function modal_form_select($field, $collection, $params = array()) {

	$label = ucwords(humanize($field));
	$html_params = array_to_attributes($params);
	$content = 
	"<div class='input-prepend control-group' id='{$field}_container'>";
	$content .= 
		"<label for='{$field}'>{$label}</label>";
	$content .= 
		"<select name='{$field}' id='{$field}' {$html_params}>";
	if ($params['prompt']) {
		$content .= "<option value=''>{$params['prompt']}</option>";
	}
	foreach ($collection as $option) {
		if($params['selected'] && $option[0] == $params['selected']){
			$content .= "<option value='{$option[0]}' selected='true'>{$option[1]}</option>";
		}else{
			$content .= "<option value='{$option[0]}'>{$option[1]}</option>";
		}
	}
	$content .= 
		"</select>";
	$content .= 
	"</div>";

	return $content;
}


function side_bar_link($text, $href, $class) {

	$link = 
	"<li class=".$class.">";
		$link .= 
		"<a href='".$href."'>";
			$link .= $text;
			$link .= "<i class='icon-chevron-right'></i>";
		$link .= 
		"</a>";
	$link .= 
	"</li>";
	return $link;
}


function alert($head, $message, $level = 'success') {
	// takes values block, error, success, info
	$alert = '<div class="alert alert-'.$level.'">';
		$alert .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		$alert .= '<strong>'.$head.'</strong> ';
		$alert .= $message;
	$alert .= '</div>';
	return $alert;
}

function display_info($key, $value) {
	?>
	<div>
		<h4>
			<?= $key ?>
		</h4>
		<p><?= $value ?></p>
	</div>
	<?php
}

function hint($text) {
	return "<h5><span class='label label-info'>Hint:</span> ".$text."</h5>";
}

function progress_bar($id, $status = null) {
	if (!$status) {
		$status = 'success';
	}
	
	return "" .
	'<div class="progress progress-' . $status . ' progress-striped">' .
		'<div class="bar" id="' .$id . '" style="width: 40%;"></div>' .
	'</div>';
}
?>