<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
echo $this->Html->alert(h($message),[
		'class' => h($class)
	]) 
?>
