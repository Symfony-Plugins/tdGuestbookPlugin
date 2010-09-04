<?php

require_once dirname(__FILE__).'/../lib/td_guestbookGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/td_guestbookGeneratorHelper.class.php';

/**
 * td_guestbook actions.
 *
 * @package    tdGuestbookPlugin
 * @subpackage backend
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class td_guestbookActions extends autoTd_guestbookActions
{
    /**
     * Activates selected guestbook entries.
     *
     * @param sfWebRequest $request
     */
    public function executeBatchActivate(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        $query = Doctrine::getTable('tdGuestbook')->getSelectedEntriesQuery($ids);

        foreach ($query->execute() as $entry)
        {
          $entry->activate(true);
        }

        $this->getUser()->setFlash('notice', 'The selected guestbook entries have been activated successfully.');

        $this->redirect('@td_guestbook');
    }

    /**
     * Deactivates selected guestbook entries.
     *
     * @param sfWebRequest $request
     */
    public function executeBatchDeactivate(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        $query = Doctrine::getTable('tdGuestbook')->getSelectedEntriesQuery($ids);

        foreach ($query->execute() as $entry)
        {
          $entry->deactivate(true);
        }

        $this->getUser()->setFlash('notice', 'The selected guestbook entries have been deactivated successfully.');

        $this->redirect('@td_guestbook');
    }

  /**
   * Activates a guestbook entry from admin generator list using AJAX.
   *
   * @param sfWebRequest $request
   * @return Partial - generated partial enabling guestbook entry deactivating (switch).
   */
  public function executeActivate(sfWebRequest $request)
  {
    $entry = Doctrine::getTable('tdGuestbook')->findOneById($request->getParameter('id'));
    $entry->activate();
    return $this->renderPartial('td_guestbook/ajax_deactivate', array('td_guestbook' => $entry));
  }

  /**
   * Deactivates a guestbook entry from admin generator list using AJAX.
   *
   * @param sfWebRequest $request
   * @return Partial - generated partial enabling guestbook entry activating (switch).
   */
  public function executeDeactivate(sfWebRequest $request)
  {
    $entry = Doctrine::getTable('tdGuestbook')->findOneById($request->getParameter('id'));
    $entry->deactivate();
    return $this->renderPartial('td_guestbook/ajax_activate', array('td_guestbook' => $entry));
  }
}
