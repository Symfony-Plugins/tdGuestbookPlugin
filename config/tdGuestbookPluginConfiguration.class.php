<?php
/**
 * tdGuestbookPluginConfiguration.class
 */

/**
 * tdGuestbookPluginConfiguration
 *
 * @package   tdGuestbookPlugin
 * @author    Tomasz Ducin <tomasz.ducin@gmail.com>
 */

class tdGuestbookPluginConfiguration extends sfPluginConfiguration
{
  /**
   * Initialize
   */
  public function initialize()
  {
    // number of guestbook entries shown on each page
    sfConfig::set('td_guestbook_entries_per_page', 15);

    // video short description sign count
    sfConfig::set('td_guestbook_short_text_sign_count', 200);
  }
}