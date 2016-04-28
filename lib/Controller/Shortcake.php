<?php
/**
 * Created by abelair.
 * Date: 2016-04-28
 * Time: 10:00 AM
 */

namespace atk4wp\Controller;


class Shortcake extends \AbstractController
{
	public $isInstall = false;

	public function init()
	{
		parent::init();

		if (function_exists('shortcode_ui_register_for_shortcode')) {
			$this->setupShortcake();
			$this->isInstall = true;
		}
	}

	public function setupShortcake()
	{
		foreach ($this->app->shortcodeCtrl->getShortcodes() as $key => $shortcode) {
			if (isset($shortcode['shortcake'])) {
				shortcode_ui_register_for_shortcode($key, $shortcode['shortcake']);
			}
		}
	}
}