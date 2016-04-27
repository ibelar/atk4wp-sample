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
		$this->add('atk4wp\View\CRUD', 'scr');
	}
}