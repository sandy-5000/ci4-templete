<div class="d-flex justify-content-center" style="height: 100vh;">
    <div class="d-flex flex-column justify-content-center">
        <h1 class="display-5 m-1 text-center">Products Page</h1>
        <?php if (isset($product_id)) : ?>
            <h2 class="display-6 m-1 text-center">Product ID: <?= $product_id ?></h2>
        <?php else : ?>
            <h2 class="display-6 m-1 text-center">Product Home</h2>
        <?php endif; ?>
    </div>
</div>