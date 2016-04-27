<?php
/**
 * Metabox sample demonstration for atk4-wp interface
 *
 * This meta box is attached to "Post" type in WordPress and simply display the last Event entry in db.
 *
 * Author: Alain Belair
 */

namespace atk4wp\MetaBox;


class PostInfo extends \Wp_WpMetaBox
{
	public function init()
	{
		parent::init();

		//get last event enter
		$event = $this->add('atk4wp\Model\Event')->setOrder('id', 'desc')->tryLoadAny()->get('name');

		$v = $this->add('View');
		$v->add('P')->set(isset($event) ? $event : 'There is no event yet to display!');

	}
}