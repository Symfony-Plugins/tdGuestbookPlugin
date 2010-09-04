<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($td_guestbook, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($td_guestbook, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php include_partial('ajax_main_active', array('td_guestbook' => $td_guestbook)) ?>
  </ul>
</td>
