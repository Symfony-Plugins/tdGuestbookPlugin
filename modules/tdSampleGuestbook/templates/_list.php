<table>
  <?php foreach ($entries as $i => $entry): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td>
        <?php echo $entry->getAuthor() ?>
      </td>
      <td>
        <?php echo $entry->getEmail() ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>