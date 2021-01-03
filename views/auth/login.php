<?php require_once dirname(__DIR__). '/parts/header.php' ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <span class="text-dark font-weight-bold h5">Войти в админ панель</span>
                    </div>
                    <div class="card-body">
                        <form action="/login/login" method="post">
                            <div class="form-group">
                                <label for="username" class="control-label col-xs-2 font-weight-bold text-dark">
                                    Никнейм
                                </label>
                                <input type="text" name="username" class="form-control" placeholder="john_doe">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-xs-2 font-weight-bold text-dark">
                                    Пароль
                                </label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-dark btn-sm" type="submit">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once dirname(__DIR__). '/parts/footer.php' ?>