<?php
/**
 * Model Sample demonstration for atk4-wp interface
 *
 * For this demonstration, the main Plugin class generated proper table name for WordPress during app init.
 *          ex: $this->dbTables['event']  = "{$wpdb->prefix}atkwp_event";
 *
 * We can then call  $this->app->getDbTableName ('event') in order to return proper table name
 * prior to initialize our model.
 *
 * Table is construct within WordPress db via the activatePlugin() function.
 *
 * This model is use to demonstrate CRUD view within Panel\Event.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Model;


class Event extends \Model_Table
{
	public function init()
	{
		$this->table = $this->app->getDbTableName ('event');
		parent::init();

		//load WordPress option for our plugin
		$options = get_option('atk4wp-event-options', null);

		$this->addField('name')->caption(_('Name'))->mandatory(_('You must have an event name'));

		$this->addField('description')->caption(_('Description'));

		$cat = $this->addField('category')
		     ->setValueList( ['weekly' => _('Weekly'), 'monthly' => _('Monthly'), 'annually' => _('Annually') ])
		     ->display(array('grid'=>'text'))
			 ->caption('Type');
		if( isset($options)){
			$cat->defaultValue( $options['event-default']);
		}

		$this->addField('date')
		     ->type('date')
		     ->caption(_('Date'));
	}
}