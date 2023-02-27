<?php include('partials/header.php'); ?>

<h1>Wishlist</h1>
<hr>

<section class="add-game">
    <h2>Add game</h2>
    <form id="add-game" class="add-game__form" method="post" action="/store">
        <div class="add-game__form-row">
            <!-- save current url in hidden field -->
            <input type="hidden" name="redirect" value="/<?= $categorySlug ?? '' ?>">

            <div class="add-game__form-control"> <label for="title">Title</label> 
            <input type="text" name="title"
                    autocomplete="off">
            </div>
            <div class="add-game__form-control add-game__form-control--sm">
                <label for="price">Price</label> 
                <input type="number" name="price" autocomplete="off"> </div>
        </div>
        <div class="add-game__form-row">
            <div class="add-game__form-control"> 
                <label for="description">Description</label> <textarea
                    name="description" autocomplete="off"></textarea> 
                </div>
        </div>
    </form> <button form="add-game" type="submit">Add to wishlist</button>
</section>

<hr>
<ul>
    <?php foreach($games as $game): ?>
    <li><?= $game->title; ?> <em>(<?= $game->category->title; ?>)</em> </li>
    <?php endforeach; ?>
</ul>
<?php include('partials/footer.php'); ?>