<?php
/**
 * Panel sample demonstration for atk4-wp interface
 *
 * This is the main panel Event within the admin dashboard.
 *
 * CRUD view with our event model.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Panel;


class Event extends \Wp_WpPanel
{
	public function init()
	{
		parent::init();

		$m =  $this->add('atk4wp\Model\Event');
		$crud = $this->add('CRUD', ['name' => 'scr',
		                                 'form_class' => 'Form_WpStacked',
		                                 'frame_options' => [ 'width' => '500px']
		]);

		$crud->setModel($m);
	}
}