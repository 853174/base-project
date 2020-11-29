<nav class="navbar navbar-expand-sm navbar-dark">
  <a class="navbar-brand" href="<?= $page_config["navbar"]["home"] ?>">
    <?= $page_config["navbar"]["title"] ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php foreach($page_config["navbar"]["links"] as $link): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=$link[1]?>"><?=$link[0]?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
