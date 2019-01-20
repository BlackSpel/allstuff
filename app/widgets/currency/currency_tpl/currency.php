<a class="dropdown-toggle" data-toggle="dropdown">Currency: <?= $this->currency['code'] ?><span class="caret"></span></a>
<ul class="dropdown-menu">
<?php foreach ($this->currencies as $k => $v) : ?>
  <?php if($k != $this->currency['code']) : ?>
    <li><a href="/currency/change?curr=<?= $k; ?>"><?= $k; ?></a></li>
  <?php endif ?>
<?php endforeach; ?>
</ul>
