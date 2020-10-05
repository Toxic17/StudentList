<main class="container">
    <?php if(!empty($content['activeUserDates'])): ?>
        <?php if($content['change'] == true): ?>

            <?php if(!empty($_SESSION['status'])): ?>
            <div class="container w-50 my-3">
                <div class="alert alert-success m-auto" role="alert">
                    Запись обновлена.
                </div>
            </div>
            <?php endif ?>
            <h2 class="text-center">Форма изменения данных</h2>
            <form action="/register?change=true" method="post" class="w-50 m-auto">
                Имя
                <input type="text" class="form-control" name="user_name" value="<?= $content['activeUserDates']['user_name'] ?>">
                <?php if(isset($content['errors']['name'])): ?>
                    <p class="text-danger"><?= $content['errors']['name'] ?></p>
                <?php endif ?>
                Фамилия
                <input type="text" class="form-control" name="surname" value="<?= $content['activeUserDates']['surname'] ?>">
                <?php if(isset($content['errors']['user_surname'])): ?>
                    <p class="text-danger"><?= $content['errors']['user_surname'] ?></p>
                <?php endif ?>
                Пол <br>
                <select name="gender" class="form-control">
                    <option value="муж" <?php if($content['activeUserDates']['gender'] == "муж"): ?> selected <?php endif ?>  >муж</option>
                    <option value="жен" <?php if($content['activeUserDates']['gender'] == "жен"): ?> selected <?php endif ?> >жен</option>
                </select>
                Номер группы
                <input type="text" class="form-control" name="number_group" value="<?= $content['activeUserDates']['number_group'] ?>">
                <?php if(isset($content['errors']['number_group'])): ?>
                    <p class="text-danger"><?= $content['errors']['number_group'] ?></p>
                <?php endif ?>
                Email
                <input type="email" class="form-control" name="email" value="<?= $content['activeUserDates']['email'] ?>">
                <?php if(isset($content['errors']['email'])): ?>
                    <p class="text-danger"><?= $content['errors']['email'] ?></p>
                <?php endif ?>
                Количество баллов
                <input type="number" class="form-control" name="points" value="<?= $content['activeUserDates']['points'] ?>">
                <?php if(isset($content['errors']['points'])): ?>
                    <p class="text-danger"><?= $content['errors']['points'] ?></p>
                <?php endif ?>
                День рождения
                <input type="date" class="form-control" name="birthday" value="<?= $content['activeUserDates']['birthday'] ?>">
                <?php if(isset($content['errors']['birthday'])): ?>
                    <p class="text-danger"><?= $content['errors']['birthday'] ?></p>
                <?php endif ?>
                Город <br>
                <select name="city" class="form-control">
                    <option value="местый" <?php if($content['activeUserDates']['city'] == "местый"): ?> selected <?php endif ?> >местный</option>
                    <option value="иногородний" <?php if($content['activeUserDates']['city'] == "иногородний"): ?> selected <?php endif ?> >иногородний</option>
                </select>
                <input type="text" value="<?= $content['csrf'] ?>" style="display: none" name="csrf">
                <input type="submit" class="btn btn-outline-success my-3 form-control" value="Изменить">
            </form>
        <?php else: ?>
        <div class="container mt-5">
            <div class="card w-50 m-auto">
                <div class="card-header">
                    <h2 class="text-center">Ваши данные</h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Имя: <?= htmlspecialchars($content['activeUserDates']['user_name']) ?> </li>
                    <li class="list-group-item">Фамилия: <?= htmlspecialchars($content['activeUserDates']['surname']) ?> </li>
                    <li class="list-group-item">Пол: <?= htmlspecialchars($content['activeUserDates']['gender']) ?> </li>
                    <li class="list-group-item">Номер группы: <?= htmlspecialchars($content['activeUserDates']['number_group']) ?> </li>
                    <li class="list-group-item">email: <?= htmlspecialchars($content['activeUserDates']['email']) ?> </li>
                    <li class="list-group-item">Количество баллов: <?= htmlspecialchars($content['activeUserDates']['points']) ?> </li>
                    <li class="list-group-item">День рождение: <?= htmlspecialchars($content['activeUserDates']['birthday']) ?> </li>
                    <li class="list-group-item">Город: <?= htmlspecialchars($content['activeUserDates']['city']) ?> </li>
                    <a href="/register?change=true" class="btn btn-primary">Изменить</a
                </ul>
            </div>
        </div>
        <?php endif ?>
    <?php else: ?>
    <h2 class="text-center">Форма регистрации</h2>
    <form action="/register" method="post" class="w-50 m-auto">
        Имя
        <input type="text" class="form-control" name="user_name" value="<?= $content['userDates']['user_name'] ?>">
        <?php if(isset($content['errors']['name'])): ?>
            <p class="text-danger"><?= $content['errors']['name'] ?></p>
        <?php endif ?>
        Фамилия
        <input type="text" class="form-control" name="surname" value="<?= $content['userDates']['surname'] ?>">
        <?php if(isset($content['errors']['user_surname'])): ?>
            <p class="text-danger"><?= $content['errors']['user_surname'] ?></p>
        <?php endif ?>
        Пол <br>
        <select name="gender" class="form-control">
            <option value="муж" <?php if($content['userDates']['gender'] == "муж"): ?> selected <?php endif ?>  >муж</option>
            <option value="жен" <?php if($content['userDates']['gender'] == "жен"): ?> selected <?php endif ?> >жен</option>
        </select>
        Номер группы
        <input type="text" class="form-control" name="number_group" value="<?= $content['userDates']['number_group'] ?>">
        <?php if(isset($content['errors']['number_group'])): ?>
            <p class="text-danger"><?= $content['errors']['number_group'] ?></p>
        <?php endif ?>
        Email
        <input type="email" class="form-control" name="email" value="<?= $content['userDates']['email'] ?>">
        <?php if(isset($content['errors']['email'])): ?>
            <p class="text-danger"><?= $content['errors']['email'] ?></p>
        <?php endif ?>
        Количество баллов
        <input type="number" class="form-control" name="points" value="<?= $content['userDates']['points'] ?>">
        <?php if(isset($content['errors']['points'])): ?>
            <p class="text-danger"><?= $content['errors']['points'] ?></p>
        <?php endif ?>
        День рождения
        <input type="date" class="form-control" name="birthday" value="<?= $content['userDates']['birthday'] ?>">
        <?php if(isset($content['errors']['birthday'])): ?>
            <p class="text-danger"><?= $content['errors']['birthday'] ?></p>
        <?php endif ?>
        Город <br>
        <select name="city" class="form-control">
            <option value="местый" <?php if($content['userDates']['city'] == "местый"): ?> selected <?php endif ?> >местный</option>
            <option value="иногородний" <?php if($content['userDates']['city'] == "иногородний"): ?> selected <?php endif ?> >иногородний</option>
        </select>
        <input type="text" value="<?= $content['csrf'] ?>" style="display: none" name="csrf">
        <input type="submit" class="btn btn-outline-success my-3 form-control" value="Сохранить">
    </form>
    <?php endif ?>
</main>