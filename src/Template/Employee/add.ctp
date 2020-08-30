<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- 従業員登録 -->
  <?=$this->Html->charset() ?>
  <?= $this->Html->css('simple.css') ?>
</head>
<body>
  <?=$this->element('header',$header) ?>
  <?=$this->Form->create(null, [
      'type'=>'post',
      'url' => [ 
        'controller'=>'Employee',
        'action'=>'regist'
      ]
    ])
  ?>
  <div><?=$this->Form->input('Employee.name', array('label' => '名前')) ?></div>
  <div><?=$this->Form->input('Employee.position', array('options' => $list, 'label' => '役職名',  'empty' => 'なし')); ?></div>
  <div><?=$this->Form->submit('登録') ?></div>
  <?=$this->Form->end() ?>
</body>
  <?=$this->element('footer',$footer) ?>
</html>