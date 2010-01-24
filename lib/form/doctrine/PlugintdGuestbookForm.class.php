<?php

/**
 * PlugintdGuestbook form.
 *
 * @package    tdGuestbookPlugin
 * @subpackage form
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PlugintdGuestbookForm extends BasetdGuestbookForm
{
  public function setup()
  {
    parent::setup();

    $this->removeFields();

    $this->manageWidgets();

    $this->manageValidators();

//    $this->manageCaptcha();
  }

  protected function removeFields()
  {
    unset($this['created_at'], $this['updated_at']);
  }

  protected function manageWidgets()
  {
    $this->setWidget('author', new sfWidgetFormInputText(array(), array('size' => '30')));
    $this->setWidget('email', new sfWidgetFormInputText(array(), array('size' => '30')));
    $this->setWidget('http', new sfWidgetFormInputText(array(), array('size' => '30')));
    $this->setWidget('text', new sfWidgetFormTextarea(array(), array('cols' => '80', 'rows' => '8')));
  }

  protected function manageValidators()
  {
    $this->setValidator('author',
      new sfValidatorString(array(), array('required' => 'Musisz podać autora.')));

    $this->setValidator('text',
      new sfValidatorString(array(), array('required' => 'Musisz podać treść.')));

    $this->setValidator('email',
      new sfValidatorEmail(array('required' => false), array('invalid' => 'Wpisz poprawny adres E-mail.')));
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
