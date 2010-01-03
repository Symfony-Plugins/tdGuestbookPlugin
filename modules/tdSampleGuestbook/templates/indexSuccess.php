<h1>Księga gości</h1>

<a href="<?php echo url_for('guestbook/new') ?>">Wpisz się do księgi gości</a>

<div id="guestbook">
  <?php foreach ($pager->getResults() as $i => $entry): ?>
    <div class="entry">

      <span class="author"><?php echo $entry->getAuthor() ?></span>

      <?php if($entry->getEmail()): ?>
      <span class="email">
          <a href="mailto:<?php echo $entry->getEmail() ?>"><?php echo $entry->getEmail() ?></a>
      </span>
      <?php endif; ?>

      <?php if($entry->getHttp()): ?>
      <span class="http">
          <a href="<?php echo $entry->getHttp() ?>"><?php echo $entry->getHttp() ?></a>
      </span>
      <?php endif; ?>

      <span class="text"><?php echo $entry->getText() ?></span>

      <span class="created"><?php echo $entry->getCreatedAt() ?></span>

    </div>
  <?php endforeach; ?>
</div>

<?php if ($pager->haveToPaginate()): ?>
  <div id="pagination">

    <a href="?page=1">
      <img src="/sf/sf_admin/images/first.png" alt="Pierwsza strona" title="Pierwsza strona" />
    </a>

    <a href="?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/sf/sf_admin/images/previous.png" alt="Poprzednia strona" title="Poprzednia strona" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <a class="active"><?php echo $page ?></a>
      <?php else: ?>
        <a href="?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="?page=<?php echo $pager->getNextPage() ?>">
      <img src="/sf/sf_admin/images/next.png" alt="Następna strona" title="Następna strona" />
    </a>

    <a href="?page=<?php echo $pager->getLastPage() ?>">
      <img src="/sf/sf_admin/images/last.png" alt="Ostatnia strona" title="Ostatnia strona" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination">
  <strong><?php echo count($pager) ?></strong> wpisów w księdze
  <?php if ($pager->haveToPaginate()): ?>
    , strona <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

<a href="<?php echo url_for('guestbook/new') ?>">Wpisz się do księgi gości</a>
