<!DOCTYPE html>
<html lang="ja">
<head>
  <?=$this->Html->charset() ?>
  <?=$this->Html->css('simple') ?> 
</head>
<body>
  <?=$this->element('nav')?>
  <?=$this->element('header',$header) ?>
  <table>
    <tr>
      <th>社員番号</th><th>名前</th><th>役職</th>
    </tr>
    <?php foreach ($employee as $obj): ?>
      <tr>
        <td><?= ($obj->id) ?></td>
        <td><?= ($obj->name) ?></td>
        <td><?= ($obj->position_name->position_name) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?=$this->element('footer',$footer) ?>
</body>
</html>