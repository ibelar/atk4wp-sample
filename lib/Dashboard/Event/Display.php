<?php

/**
 * Dashboard widget sample demonstration for atk4-wp interface
 *
 * This dashboard display a certain number of events by date.
 * The number of event is set in $control_callback of this widget.
 *
 * Author: Alain Belair
 */
namespace atk4wp\Dashboard\Event;

class Display extends \Wp_WpDashboard
{
	public function init()
	{
		parent::init();

		$count = $this->add('Model_WpOptions')->getOptionValue('atk4wp-event-options', null)['event-dash-count'];

		$this->add('View')->set(sprintf(_('Showing the last %d events:'), $count))->addClass('atk-push-small');
		$v = $this->add('View')->addClass('atk-box-small');

		$events = $this->add('atk4wp\Model\Event')->setLimit($count)->setOrder('id', 'desc');
		foreach ($events as $key => $event) {
			$v->add('View')->set(sprintf(_('- %s on %s'), $event->get('name'), $event->get('date')));
		}
	}
}