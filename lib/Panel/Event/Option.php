<?php
/**
 * Sub Panel sample demonstration for atk4-wp interface
 * Event Option setting
 *
 * Available as a sub menu of the Event panel.
 *
 * Display two atk Tabs: one using a form for setting up the event type (category) default value in CRUD, the other one
 * using the Wp_WpUpload field for uploading content as a WordPress Media
 *
 * The Event default tab use an atk Model (Model_WpOptions) in order to save WordPress default option value.
 *
 * Author: Alain Belair
 */

namespace atk4wp\Panel\Event;


class Option extends \Wp_WpPanel
{

	public function init()
	{
		parent::init();

		$this->add('H4')->set('Event Option');

		$tabs = $this->add('Tabs');
		//Event option tabsetup
		$this->setupEventOptions($tabs);
		//Upload tab setup
		$this->setupUpload($tabs);
	}

	public function setupEventOptions($tabs)
	{
		$optionModel = $this->add('Model_WpOptions');
		$options = get_option('atk4wp-event-options', null);

		$eventOptions = $tabs->addTab(_('Event Options'))->addClass('atk-padding-small');

		$f = $eventOptions->add('Form_WpStacked', 'o-form');

		$default = $f->addField('dropdown', 'event_default')->setValueList(['weekly' => _('Weekly'), 'monthly' => _('Monthly'), 'annually' => _('Annually')]);

		//add WP colorpicker field.
		$color = $f->addField('WpColorPicker', 'color')->set('#ffffff');

		//set form field with their saved value.
		if (isset($options)) {
			$default->set($options['event-default']);
			$color->set($options['event-color']);
		}

		$f->addSubmit(_('Save Option'));

		if ($f->isSubmitted()) {
			$options['event-default'] = $f->get('event_default');
			$options['event-color']   = $f->get('color');
			$optionModel->saveOptionValue('atk4wp-event-options', $options);
			$this->js()->univ()->successMessage(_('Options are saved!'))->execute();
		}
	}

	public function setupUpload($tabs)
	{
		$upload = $tabs->addTab(_('Image upload'));
		//Image upload tab
		$fu = $upload->add('Form_WpStacked')->addClass('atk-padding-small');
		$uploadField = $fu->addField('Form_Field_WpUpload', 'file')->setCaption('');
		$uploadField->addProgressBar('#dd9933')->setAcceptType(['image/*'])->addStyleClass('style-input');
		$uploadField->validateField([$this, 'validateFile']);
		$uploadField->setInputMessage( _('Upload image file to Media'));

		$fu->onSubmit([$this, 'fileSubmit']);
	}

	public function fileSubmit($f)
	{
		//call Wordpress media uploader.
		$id = media_handle_upload( 0, 0 );
		if( is_wp_error( $id )){
			throw $this->exception( $id->get_error_message());
		}
		$this->js()->univ()->successMessage(_('File updload successfully'))->execute();
	}

	public function validateFile($field)
	{
		//Check if $_FILES is set and contains proper file type.
	}
}