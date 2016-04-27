<?php
/**
 * Created by abelair.
 * Date: 2016-04-25
 * Time: 12:46 PM
 */

namespace atk4wp\View;


class CRUD extends \CRUD
{
	public function init()
	{
		$this->form_class = 'Form_WpStacked';
		$this->frame_options = ['width' => '500px'];
		parent::init();

		$m =  $this->add('atk4wp\Model\Event');
		$this->setModel($m);

		if ($this->isEditing()) {
			$name  = $this->form->getElement('name');
			$name->validateField([$this->form, 'validateMandatory']);
		}
	}
}