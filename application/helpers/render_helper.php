<?php

// used to render the views within the specified layout
if (!function_exists('render_with_layout')) {

	function render_with_layout ($view, $params = array(), $layout = 'application')
	{
		$instance = &get_instance();
		$content = $instance->load->view($view, $params, true);
		// loading content within layout
		$instance->load->view('layouts/' . $layout, array('content' => $content));
	}

}

// renders partial files
if (!function_exists('render_partial')) {

	function render_partial ($partial, $params = array(), $return = false)
	{
		// convert $partial to actual view file
		if (!empty($partial)) {

			// exploding and rewriting last part
			$partial_parts = explode('/', $partial);
			$last_part = count($partial_parts) - 1;
			$partial_parts[$last_part] = '_' . $partial_parts[$last_part];
			$view = implode('/', $partial_parts);

			$instance = &get_instance();
			if ($return) {
				$content = $instance->load->view($view, true, $params);
				return $content;
			} else {
				$instance->load->view($view, $params);
				return;
			}
		}
		return 'Invalid View!';
	}

}

// renders json response
if (!function_exists('render_json')) {
	function render_json ($output = null)
	{
		$instance = &get_instance();
		$instance->output->set_header('Content-Type: application/json', TRUE);
		if (!empty($output)) {
			$output = (is_array($output)) ? json_encode($output) : (string) $output;
		}
		$instance->output->set_output($output);
	}
}