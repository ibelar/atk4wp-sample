<?php
/**
 * Widget sample demonstration for atk4-wp interface
 *
 * atk4-wp widgets are not children of an Agile Toolkit view class but rather children of a WordPress widget class, as required by WP.
 * Therefore, atk views are injected within the atk4-wp widget class during initialisation.
 *
 * This widget field are setup within the configuration file: title and count.
 * On the admin widget page, it will display the default form and proper field.
 *
 * This widget will display the last event entry limit by the instance count to the front side.
 *
 * Author: Alain Belair
 *
 */

namespace atk4wp\Widget;


class Event extends \Wp_WpWidget
{
	public function init()
	{
		parent::init();
		//inject the atk view
		$this->addWidgetDisplay('View', 'event-display');
		$this->onDisplay([$this, 'beforeDisplayWidget']);
	}


	/**
	 * On display return the atkView set for this widget
	 * @param $atkView
	 * @param $instance
	 */
	public function beforeDisplayWidget($atkView, $instance)
	{
		if (isset($instance['title']) && !empty($instance['title'])) {
			$this->setWidgetDisplayTitle($instance['title']);
		}
		$events = $atkView->add('atk4wp\Model\Event')->setLimit($instance['count'])->setOrder('id', 'desc');
		foreach ($events as $key => $event) {
			$atkView->add('P')->set($event->get('name'));
		}
	}
}