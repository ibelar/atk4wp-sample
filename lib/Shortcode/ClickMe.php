<?php
/**
 * Shortcode sample demonstration for atk4-wp interface
 *
 * Type in like this in a WordPress page: [atk4wp-clickme max_count=3]
 * You can place any number of shortcode within a page in WP.
 *
 * This shortcode may take one argument: max_count which represent the number of time the button can be click.
 * Default max is 2.
 *
 * When max is reach, it will display a message to user.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Shortcode;


class ClickMe extends \Wp_WpShortcode
{
	public function init()
	{
		parent::init();
		if( isset ($this->args[ 'max_count' ]) ){
			$this->memorize( 'max', $this->args[ 'max_count' ]);
		} else if( ! $this->recall('max', null) ){
			//add a default max count
			$this->memorize( 'max', 2);
		}
		$max = $this->recall('max');

		$v = $this->add('View')->addClass('atk-box atk-push');
		$v->add('P')->set('Click Me Shortcode');
		$b = $v->add('Button')->addClass('atk-push');
		$num =  $_GET['number'];

		if ($num < $max){
			$label = sprintf( 'Click %d/%d', $num, $max );
			$b->js('click', $b->js()->reload([ 'number' => $num + 1 ]));
		} else {
			$label =  sprintf( 'Stop %d/%d', $max, $max );
			$b->js('click', $b->js()->univ()->atkWpMessage($this->name, 'danger', 'Didn\'t I tell you to stop!'));
		}
		$b->setLabel($label);
	}
}