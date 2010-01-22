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

    $this->manageValidators();
  }

  protected function removeFields()
  {
    unset($this['created_at'], $this['updated_at']);
  }

  protected function manageValidators()
  {
    $this->setValidator('author',
      new sfValidatorString(array(), array('required' => 'Musisz podać autora.')));

    $this->setValidator('text',
      new sfValidatorString(array(), array('required' => 'Musisz podać treść.')));
  }
}
