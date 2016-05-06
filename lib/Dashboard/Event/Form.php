<?php
/**
 * Dashboard widget sample demonstration for atk4-wp interface
 *
 * This dashboard form set the number of event to display.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Dashboard\Event;


class Form extends \Form_WpDashboard
{
	public function init()
	{
		parent::init();

		$optionModel = $this->add('Model_WpOptions');
		$options = $optionModel->getOptionValue('atk4wp-event-options', null);

		$this->addField('number', 'count')
			->setCaption('How many event to display (1 to 8)')
			->set($options['event-dash-count'])
			->validateField(function($f){
				if (trim($f->get()) < 1) {
					$f->set(1);
				} else if (trim($f->get()) > 8) {
					$f->set(8);
				}
			});

		if ($this->isSubmitted()) {
			$options['event-dash-count'] = $this->get('count');
			$optionModel->saveOptionValue('atk4wp-event-options', $options);
		}

	}
}