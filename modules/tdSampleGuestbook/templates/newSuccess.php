<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<h1>Nowy wpis do Księgi Gości</h1>

<ul id="guestbook">
<li>
<form action="<?php echo url_for('tdSampleGuestbook/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@td_sample_guestbook') ?>">Anuluj</a>
          <input type="submit" value="Wpisz się do księgi gości" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['author']->renderLabel('Autor') ?></th>
        <td>
          <?php echo $form['author']->renderError() ?>
          <?php echo $form['author'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel('E-mail') ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['http']->renderLabel('Strona WWW') ?></th>
        <td>
          <?php echo $form['http']->renderError() ?>
          <?php echo $form['http'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['text']->renderLabel('Treść') ?></th>
        <td>
          <?php echo $form['text']->renderError() ?>
          <?php echo $form['text'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
</li>
</ul>
