<!-- レイアウト -->
<!DOCTYPE html>
<html>
<head>
  <?=$this->Html->charset() ?>
  <?=$this->Html->css('simple') ?> 
  <title><?=$this->fetch('title') ?></title>
</head>
<body>
    <header class="head row">
        <h5>headerです</h5>
    </header>
    <div class="content row">
        <?=$this->fetch('content') ?>
    </div>
    <footer class="foot row">
        <h5>footerです</h5>
    </footer>
</body>
</html>