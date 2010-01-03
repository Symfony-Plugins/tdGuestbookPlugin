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

    unset( $this['created_at'], $this['updated_at'] );

    $this->setValidator('author',
      new sfValidatorString(array(), array('required' => 'Musisz podać autora wpisu.')));

    $this->setValidator('text',
      new sfValidatorString(array(), array('required' => 'Musisz podać treść wpisu.')));

    $this->setValidator('email',
      new sfValidatorEmail(array('required' => false), array('invalid' => 'Musisz podać poprawny adres E-mail')));
  }
}
