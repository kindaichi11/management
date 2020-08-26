<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- 従業員登録 -->
  <?=$this->Html->charset() ?>
  <?= $this->Html->css('simple.css') ?>
</head>
<body>
<?=$this->element('header',$header) ?>
  <?=$this->Form->create(null,
    ['type'=>'post',
    'url'=>['controller'=>'Employee',
    'action'=>'regist']])
  ?>
  <div>名前</div>
  <div><?=$this->Form->text('Employee.name') ?></div>
  <div>役職</div>
  <?=$this->Form->select('Employee.position', $options = array(1=>'工場長',2=>'製造リーダー',3=>'なし'), $attributes = array()) ?>
  <div><?=$this->Form->submit('登録') ?></div>
  <?=$this->Form->end() ?>
</body>
  <?=$this->element('footer',$footer) ?>
</html>