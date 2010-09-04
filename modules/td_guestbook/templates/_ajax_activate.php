<?php use_helper('I18N') ?>
<li class="sf_admin_action_activate" id="ajax_activate_<?php echo $td_guestbook->getId() ?>">
<?php use_helper('jQuery'); ?>
  <?php echo jq_link_to_remote(__('Activate', array(), 'sf_admin'), array(
    'update'   => 'entry_is_active_action_'.$td_guestbook->getId(),
    'url'      => '@ajax_guestbook_entry_activate?id='.$td_guestbook->getId(),
    'script' => true,
    'complete' => jq_remote_function( array(
      'update' => 'entry_is_active_column_'.$td_guestbook->getId(),
      'url'    => 'graphics/tick',
      'script' => true
    )),
  )) ?>
</li>
