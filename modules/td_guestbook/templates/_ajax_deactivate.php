<?php use_helper('I18N') ?>
<li class="sf_admin_action_deactivate" id="ajax_deactivate_<?php echo $td_guestbook->getId() ?>">
<?php use_helper('jQuery'); ?>
  <?php echo jq_link_to_remote(__('Deactivate', array(), 'sf_admin'), array(
    'update'   => 'entry_is_active_action_'.$td_guestbook->getId(),
    'url'      => '@ajax_guestbook_entry_deactivate?id='.$td_guestbook->getId(),
    'script' => true,
    'complete' => jq_remote_function( array(
      'update' => 'entry_is_active_column_'.$td_guestbook->getId(),
      'url'    => 'graphics/empty',
      'script' => true
    )),
  )) ?>
</li>
