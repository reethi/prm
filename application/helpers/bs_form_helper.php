<?php
function bs_form_field ($field, $params = array()) {

	$as = $params['as'] ? $params['as'] : 'text';
	$label = $params['label'] ? $params['label'] : humanize($field);
	$params['placeholder'] = $params['placeholder'] ? $params['placeholder'] : humanize($field);

	$value;

	if ($as == 'textarea') {
		if ($params['value'])
		{
			$value = $params['value'];
			unset($params['value']);
		}
	}

	if ($params['id']) {
		$id = $params['id'];
	} else {
		$id = $field;
	}

	// converting array to html attributes
	$html_params = array_to_attributes($params);

	// input for hidden field
	if ($as == 'hidden') {
		$input = '<input type="'.$as.'" id="'.$id.'" name="'.$field.'" '.$html_params.'>';
	} else {
		$input = '
			<div class="control-group">
				<label class="control-label" for="'.$field.'">'.$label.'</label>
				<div class="controls">';

				if ($as == 'select') {
					// collection is in this form: array('value' => 'Display', 'value2' => 'Display 2')
					$input .= '<select name="'.$field.'" id="'.$id.'" '.$html_params.'>';
					$collection = $params['collection'];

					if (!empty($params['prompt'])) {
						$input .= '<option value="">'.$params['prompt'].'</option>';
					}

					foreach ($collection as $key => $value) {
						$default_value = $params['value'];
						if ($default_value == $key) {
							$input .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
						} else {
							$input .= '<option value="'.$key.'">'.$value.'</option>';
						}
					}

					$input .= '</select>';
				}

				if ($as == 'text' || $as == 'password' || $as == 'file') {
					$input .= '<input type="'.$as.'" id="'.$id.'" name="'.$field.'" '.$html_params.'>';
				}

				if ($as == 'textarea') {
					$input .= '<textarea id="'.$id.'" name="'.$field.'" '.$html_params.'>'.$value.'</textarea>';
				}

		$input .= 
				'</div>
			</div>
			';
	}

	return $input;

}





?>