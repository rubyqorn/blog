<?php require_once 'parts/header.php' ?>

<div class="container" id="post">
    <div class="row justify-content-center">

        <?php foreach($post as $item):  ?>

            <div class="col-lg-8 border-bottom">
                <p class="text-dark font-weight-bold h4">
                    <?php echo $item['title'] ?>
                </p>

                <div class="d-flex">
                    <div class="col p-0">
                        <p class="text-muted">
                            <small class="font-weight-bold">Автор: </small>
                            <small><?php echo $item['username'] ?></small>
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-muted text-right">
                            <small class="font-weight-bold"><?php echo date('d M Y', strtotime($item['created_at'])) ?></small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 text-justify mt-4 mb-4">
                <?php echo $item['body'] ?>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php require_once 'parts/footer.php' ?>