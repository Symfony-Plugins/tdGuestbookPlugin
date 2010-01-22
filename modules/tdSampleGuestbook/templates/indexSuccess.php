<?php use_helper('I18N', 'Date') ?>

<h1>Księga gości</h1>

<div class="special">
  <a href="<?php echo url_for('@td_sample_guestbook_add') ?>">Wpisz się do księgi gości</a>
</div>

<?php if($results = $pager->getResults(Doctrine_Core::HYDRATE_ARRAY)): ?>
<ul id="guestbook">
  <?php foreach ($results as $key => $entry): ?>
    <li>
      <div class="author">
        <span class="value"><?php echo $entry['author'] ?></span>
      </div>
      <?php if($entry['email']): ?>
      <div class="email">
        <span class="title"><?php echo __('E-mail', array(), 'td') ?>: </span>
        <span class="value"><a href="mailto:<?php echo $entry['email'] ?>"><?php echo $entry['email'] ?></a></span>
      </div>
      <?php endif; ?>
      <?php if($entry['http']): ?>
      <div class="http">
        <span class="title"><?php echo __('WWW', array(), 'td') ?>: </span>
        <span class="value"><a href="<?php echo $entry['http'] ?>"><?php echo $entry['http'] ?></a></span>
      </div>
      <?php endif; ?>
      <div class="text">
        <span class="value"><?php echo $entry['text'] ?></span>
      </div>
      <div class="created_at">
        <span class="value"><?php echo (false !== strtotime($entry['created_at']) ? format_date($entry['created_at'], "f") : '&nbsp;') ?></span>
      </div>
    </li>
  <?php endforeach; ?>
</ul>

<div class="special">
  <a href="<?php echo url_for('@td_sample_guestbook_add') ?>">Wpisz się do księgi gości</a>
</div>

<ul id="guestbook_footer">
    <li>
      <?php if ($pager->haveToPaginate()): ?>
      <div class="pagination">

        <a href="?page=1">
          <img src="/tdCorePlugin/images/pagination/first.png" alt="Pierwsza strona" title="Pierwsza strona" />
        </a>
        <a href="?page=<?php echo $pager->getPreviousPage() ?>">
          <img src="/tdCorePlugin/images/pagination/previous.png" alt="Poprzednia strona" title="Poprzednia strona" />
        </a>
        <?php foreach ($pager->getLinks() as $page): ?>
          <?php if ($page == $pager->getPage()): ?>
            <a class="active"><?php echo $page ?></a>
          <?php else: ?>
            <a href="?page=<?php echo $page ?>"><?php echo $page ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
        <a href="?page=<?php echo $pager->getNextPage() ?>">
          <img src="/tdCorePlugin/images/pagination/next.png" alt="Następna strona" title="Następna strona" />
        </a>
        <a href="?page=<?php echo $pager->getLastPage() ?>">
          <img src="/tdCorePlugin/images/pagination/last.png" alt="Ostatnia strona" title="Ostatnia strona" />
        </a>
      </div>
      <?php endif; ?>
    </li>
    <li>
      <div class="stats">
        <strong><?php echo count($pager) ?></strong>
        wpisów w księdze<?php if ($pager->haveToPaginate()): ?>,
          strona <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
        <?php endif; ?>
      </div>
    </li>
</ul>
<?php endif; ?>
