<?php include('partials/header.php'); ?>

<h1>Wishlist</h1>

<ul>
<?php foreach($games as $game): ?>
    <li><?= $game->title; ?> <em>(<?= $game->category->title; ?>)</em> </li>
<?php endforeach; ?>
</ul>
<?php include('partials/footer.php'); ?>