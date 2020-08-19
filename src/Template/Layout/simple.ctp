<!-- レイアウト -->
<!DOCTYPE html>
<html>
<head>
  <?=$this->Html->charset() ?>
  <title><?=$this->fetch('title') ?></title>
　<?=$this->Html->css('simple') ?> -->
</head>
<body>
    <header class="head row">
        <?=$this->fetch('title') ?>
    </header>
    <div class="content row">
        <?=$this->fetch('content') ?>
    </div>
    <footer class="foot row">
        <h5>footerです</h5>
    </footer>
</body>
</html>