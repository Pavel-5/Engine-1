<?php

function render($page, $params)
{
	return renderTemplate(LAYOUTS_DIR . $params['layout'], [
		'content' => renderTemplate($page, $params),
		'menu' => renderTemplate("menu", $params)
	]);
}

function renderTemplate($page, $params = [])
{
	/*foreach ($params as $key => $value) {
        $$key = $value;
    }*/
	extract($params);
	ob_start();
	include TEMPLATES_DIR . $page . ".php";
	return ob_get_clean();
}
