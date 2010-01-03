<?php

/**
 * PlugintdGuestbookTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    tdGuestbookPluginTable
 * @subpackage model
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class PlugintdGuestbookTable extends Doctrine_Table
{
  /**
   * Returns DQL query retrieving all active guestbook entries.
   *
   * @return Doctrine_Query
   */
  static public function getActiveEntriesQuery()
  {
    return Doctrine_Query::create()
             ->from('tdGuestbook e')
             ->where('e.active = "1"');
  }

  /**
   * Returns DQL query retrieving guestbook entries selected by ids.
   *
   * @param Array $ids - Identifiers of selected links.
   * @return Doctrine_Query
   */
  static public function getSelectedEntriesQuery($ids)
  {
    return Doctrine_Query::create()
             ->from('tdGuestbook e')
             ->whereIn('e.id', $ids);
  }
}