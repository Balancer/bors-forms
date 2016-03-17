<?php

namespace B2\Form;

class Range extends \bors_forms_element
{
	function html()
	{
		$form   = $this->form();
		$params = $this->params();

        $html = [];

        if($label = $this->label())
        {
            $label = preg_replace('!^(.+?) // (.+)$!', "$1<br/><small>$2</small>", $label);

            $html[] = "<tr><th class=\"{$this->form()->templater()->form_table_left_th_css()}\">{$label}</th><td{$td_colspan}>";
        }

		$format = defval($params, 'format', '%s — %s');

		$html[] = sprintf($format,
			$form->element_html('input', ['name' => $params['name1'], 'size' => defval($params, 'size', 4)]),
			$form->element_html('input', ['name' => $params['name2'], 'size' => defval($params, 'size', 4)])
		);

		return join("\n", $html);
	}
}
