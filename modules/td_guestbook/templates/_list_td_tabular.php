<td class="sf_admin_boolean sf_admin_list_td_active" id="entry_is_active_column_<?php echo $td_guestbook->getId() ?>">
  <?php echo get_partial('td_guestbook/list_field_boolean', array('value' => $td_guestbook->getActive())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_author">
  <?php echo $td_guestbook->getAuthor() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_text">
  <?php echo $td_guestbook->getText() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($td_guestbook->getUpdatedAt()) ? format_date($td_guestbook->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($td_guestbook->getCreatedAt()) ? format_date($td_guestbook->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
