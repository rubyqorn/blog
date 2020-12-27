<?php require_once 'parts/header.php' ?>

<div class="container mb-4" id="preview">
    <div class="row justify-content-center">

        <div class="col-lg-8 border-bottom pb-3">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <img src="img/avatar.jpeg" alt="" class="rounded avatar">
                </div>

                <div class="col-lg-6 justify-content-end d-flex">
                    <a href="/about/index" class="text-muted mr-2">
                        <small>
                            Anton Hideger
                        </small>
                    </a>
                    <a href="https://github.com/rubyqorn" class="text-dark mr-2">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://t.me/rubyqorn" class="text-info mr-2">
                        <i class="fab fa-telegram"></i>
                    </a>
                    <a href="https://vk.com/rubyqorn" class="text-primary mr-2">
                        <i class="fab fa-vk"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mt-4">
            <p class="text-dark font-weight-bold h4">
                Блог
            </p>
        </div>

        <?php foreach($posts as $post): ?>

            <div class="col-lg-8 border mt-4 rounded p-4">
                <a href="/post/index?id=<?php echo $post['id'] ?>" class="h5 text-dark"><?php echo $post['title'] ?></a>
                <p class="text-muted">
                    <small>
                        <?php echo $post['preview_text']; ?>
                    </small>
                </p>
                <div class="d-flex justify-content-end">
                    <span class="text-muted font-weight-bold">
                        <small>
                            <?php echo date('d M Y', strtotime($post['created_at'])) ?>
                        </small>
                    </span>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php require_once 'parts/footer.php' ?>
