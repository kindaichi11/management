<!DOCTYPE html>
<html lang="ja">
<head>
  <?=$this->Html->charset() ?>
  <?= $this->Html->css('simple.css') ?>
</head>
<body>
  <?=$this->element('header',$header) ?>
  <?=$this->Form->create(null,
    ['type'=>'post',
    'url'=>['controller'=>'Employee',
      'action'=>'index']]) ?>
  <p>名前検索</p>
  <div><?=$this->Form->text('Employee.name') ?></div>
  <div><?=$this->Form->submit('検索') ?></div>
  <?=$this->Form->end() ?>
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