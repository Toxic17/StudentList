<main>
<?php if(empty($content['studentResults'])): ?>
    <h2 class="mt-3">Записей не найденно</h2>
<?php else: ?>
<div class="container mt-2">
<?php if($content['status'] == "active"): ?>
    <div class="alert alert-success container mt-4" role="alert">
      Запись добавлена
    </div>
<?php endif ?>
<?php if(!empty($content['search'])): ?>
<h2 class="mb-3">Результаты поиска <?= $content['search'] ?>:</h2>
<?php else: ?>
<h2 class="mb-3">Результаты студентов:</h2>
<?php endif ?>
<table class="table">
      <thead>
        <tr>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=user_name&by=".$content['orderType']."&search=".$content['search'] ?>">Имя</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=surname&by=".$content['orderType']."&search=".$content['search'] ?>">Фамилия</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=gender&by=".$content['orderType']."&search=".$content['search'] ?>">Пол</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=number_group&by=".$content['orderType']."&search=".$content['search'] ?>">Номер группы</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=email&by=".$content['orderType']."&search=".$content['search'] ?>">Email</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=points&by=".$content['orderType']."&search=".$content['search'] ?>">Количество баллов</a><nav>▲</nav></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=birthday&by=".$content['orderType']."&search=".$content['search'] ?>">Дата рождения</a></th>
          <th scope="col"><a href="http://site1.com/?pag=<?=$content['pagAcive']."&order=city&by=".$content['orderType']."&search=".$content['search'] ?>">Город</a></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($content['studentResults'] as $oneRow): ?>
            <tr>
                  <td><?= htmlspecialchars($oneRow['user_name']) ?></td>
                  <td><?= htmlspecialchars($oneRow['surname']) ?></td>
                  <td><?= htmlspecialchars($oneRow['gender']) ?></td>
                  <td><?= htmlspecialchars($oneRow['number_group']) ?></td>
                  <td><?= htmlspecialchars($oneRow['email']) ?></td>
                  <td><?= htmlspecialchars($oneRow['points']) ?></td>
                  <td><?= htmlspecialchars($oneRow['birthday']) ?></td>
                  <td><?= htmlspecialchars($oneRow['city']) ?></td>
           </tr>

        <?php endforeach ?>
    </tbody>
</table>
<?php if($content['LinksPagination'] > 1): ?>
    <div class='text-center mb-5 pag'>
        <a href="http://site1.com/?pag=<?= ($content['pagAcive']-1)."&order=".$content['orderBy']."&by=".$content['orderType']."&search=".$content['search'] ?>" class="btn btn-success prev"> Prev </a>
            <?php for($i = 1; $i <= $content['LinksPagination']; $i++): ?>
                <a href="http://site1.com/?pag=<?= $i."&order=".$content['orderBy']."&by=".$content['orderType']."&search=".$content['search'] ?>" class="btn btn-success pagLinks"> <?= $i ?> </a>
            <?php endfor ?>
        <a href="/?pag=<?= ($content['pagAcive']+1)."&order=".$content['orderBy']."&by=".$content['orderType']."&search=".$content['search'] ?>" class="btn btn-success next"> Next </a>
    </div>
<?php endif?>
</div>
<?php endif ?>
<script src="/scripts/jsScript.js"></script>
</main>
