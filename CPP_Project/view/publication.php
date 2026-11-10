<h1>Liste des publications</h1>
<?php foreach ($publications as $publica) : ?>
<p>Titre(<?= $publica['id'] ?>) :  <?= $publica['title'] ?></p>
<ul>
  <li>slug: <?= $publica['slug'] ?> </li>
  <li>publicdate: <?= $publica['publicdate'] ?> </li>
  <li>siteurl: <?= $publica['siteurl'] ?> </li>
</ul>
<br>
<?php endfor; ?>
