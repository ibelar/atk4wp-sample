<?php
/**
 * Metabox sample demonstration for atk4-wp interface
 *
 * This metabox is attached to "Post" type in WordPress
 *
 * It will save meta data: first, last and gender to post_meta in WordPress.
 * The saving and restoring of meta data is handle by the parent class Wp_WpMetaBox
 *
 * atk4-wp use special atk form class adapt for WordPress meta box. You can add a form using
 * the addForm() function. This function will return a form where you can add your field as usual.
 *
 *
 * Author: Alain Belair
 */

namespace atk4wp\MetaBox;


class PostExtra extends \Wp_WpMetaBox
{
	public function init()
	{
		parent::init();

		$this->add('H5')->set('Add extra informaton to this post');

		$f =  $this->addForm();
		$f->addField('line', 'first');
		$f->addField('line', 'last');
		$f->addField('dropdown', 'gender')->setCaption('Genre')->setValuelist( [ 0=>'Mr', 1=>'Mme', 2=>'Mll'])->set(1);

		$b = $this->add('Button')->setLabel('Info');
		$b->js('click', $this->js()->univ()->atkWpMessage($this->name, 'success', 'Use this post "Publish\Update" button to save this extra information'));
	}

}