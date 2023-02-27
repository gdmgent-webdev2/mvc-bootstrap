<nav>
    <ul style="display: flex; list-style: none;">
        <!-- iterate over categories -->
        <?php foreach($categories as $category): ?>
            <li>
                <!-- link to category -->
                <a href="/<?= $category->slug ?>">
                    <?= $category->title ?>
                </a> 
                &nbsp;&nbsp;
            </li>
        <?php endforeach; ?>
    </ul>
</nav>