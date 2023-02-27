<?php include('partials/header.php'); ?>

<h1>Wishlist</h1>

<ul>
<?php foreach($games as $game): ?>
    <li><?php echo $game->title; ?></li>
<?php endforeach; ?>
</ul>
<?php include('partials/footer.php'); ?>