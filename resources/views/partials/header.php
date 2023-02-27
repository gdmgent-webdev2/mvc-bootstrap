<nav>
    <ul style="display: flex; list-style: none;">
        <!-- iterate over categories -->
        <?php foreach($categories as $category): ?>
            <li>
                <!-- link to category -->
                <a 
                    href="/<?= $category->slug ?>"
                    <?php if($category->slug === $categorySlug): ?>
                        style="font-weight: bold;"
                    <?php endif; ?>
                >
                    <?= $category->title ?>
                </a> 
                &nbsp;&nbsp;
            </li>
        <?php endforeach; ?>
    </ul>
</nav>