<?php
/**
 *
 * Shortcode sample demonstration for atk4-wp interface
 *
 * Will replace the shortcode with a form in a WordPress page.
 * Use: [atk4wp-form]
 *
 * First and Last are mandatory field. When form is submit without them, will display an error below proper field.
 * Use a jquery datepicker.
 * On Save, will simply display a success message to user.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Shortcode;


class Form extends \Wp_WpShortcode
{
	public function init() {
		parent::init();
		$v = $this->add('View')->addClass('atk-box atk-push');
		$f = $v->add('Form_WpStacked', 'f');
		$f->addField('line', 'first')->validateField([$f, 'validateMandatory']);
		$f->addField('line', 'last')->validateField([$f, 'validateMandatory']);

		$f->addField('datepicker', 'date')->validateField([$f, 'validateMandatory']);

		$f->addSubmit('Save');

		if($f->isSubmitted()){
			$js[] = $this->js()->univ()->atkWpMessage($this->name, 'success', 'Your data is safe with us!');
			$this->js(null, $js)->execute();
		}
	}
}