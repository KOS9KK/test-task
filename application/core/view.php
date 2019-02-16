<?php

class View
{

	function generate($content_view, $template_view, $data = array() ) {

		include 'application/views/' . $template_view;

	}
}
