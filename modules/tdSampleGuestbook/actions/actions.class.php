<?php

/**
 * tdSampleGuestbook actions.
 *
 * @package    tdGuestbookPlugin
 * @subpackage frontend
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tdSampleGuestbookActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
//    $this->category = $this->getRoute()->getObject();

    $this->pager = new sfDoctrinePager(
      'Guestbook',
      sfConfig::get('td_guestbook_entries_per_page')
    );
    $this->pager->setQuery($this->guestbooks = Doctrine::getTable('tdGuestbook')->createQuery('a'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GuestbookForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GuestbookForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $guestbook = $form->save();

      $this->redirect('guestbook/edit?id='.$guestbook->getId());
    }
  }
}
