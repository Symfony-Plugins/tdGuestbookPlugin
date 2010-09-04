<span id="entry_is_active_action_<?php echo $td_guestbook->getId() ?>">
  <?php if ($td_guestbook->getActive()): ?>
    <?php include_partial('td_guestbook/ajax_deactivate', array('td_guestbook' => $td_guestbook)) ?>
  <?php else: ?>
    <?php include_partial('td_guestbook/ajax_activate', array('td_guestbook' => $td_guestbook)) ?>
  <?php endif; ?>
</span>