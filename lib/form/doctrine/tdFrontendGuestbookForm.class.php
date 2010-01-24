<?php

/**
 * tdFrontendGuestbook form.
 *
 * @package    tdGuestbookPlugin
 * @subpackage form
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tdFrontendGuestbookForm extends PlugintdGuestbookForm
{
  public function setup()
  {
    parent::setup();

    $this->manageCaptcha();
  }

  protected function manageCaptcha()
  {
    $this->setWidget('captcha', new sfWidgetFormInput(array(), array('size' => '30')));

    $this->widgetSchema->setLabel('captcha', 'Wpisz kod z obrazka');

    $this->setValidator('captcha', new sfValidatorSfCryptoCaptcha(
      array('required' => true, 'trim' => true),
      array('wrong_captcha' => 'Kod który wpisałeś jest niepoprawny.',
            'required' => 'Musisz wpisać kod z obrazka poniżej.')));

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
