<?php
/**
 * Dashboard Widget Configuration
 *
 * $config['dashboard']['id']  => [ $options ]  (array)(Required) An array containining the dashboard options. $options explain below.
 * 		Id must be unique within your namespace.
 *		Ex: $config['dashboard']['ds1'] => [$ds1_options];
 *			$config['dashboard']['ds2'] => [$ds2_options];
 *
 *	Array $options :
 *  'uses'            => (string)(Required) The dashboard display class to use. The class must extends  Wp_WpDashboard.
 *						 					Ex: 'uses' =>  __NAMESPACE__ . '\Dashboard\Event\Display'
 *
 *  'title'           => (string)(Required) A string holding the title of the dashboard as it appear in the dashboard page.
 *  'form'			  => [$form] (array)(Optional) An array that hold the widget form option. $form array explain below.

 *---------------------------
 *
 *	Array $form:
 *    'uses'         => (string)(Required) A string that hold the class name use for displaying the widget form.
 *  *                                     The form class must extends Form_WpDashboard
 *                                        Ex: 'form' => ['uses' => __NAMESPACE__ . '\Dashboard\Event\Form'],
 *---------------------------
 *
 *
 */
namespace atk4wp;

$config['dashboard']['dash-event'] = [
	'uses'         =>  __NAMESPACE__ . '\Dashboard\Event\Display',
	'form'          =>  ['uses' => __NAMESPACE__ . '\Dashboard\Event\Form'],
	'title'         => _('Atk4wp Event'),
];