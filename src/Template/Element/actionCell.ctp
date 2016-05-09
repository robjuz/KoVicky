<?= $this->Html->link($this->Html->icon('eye-open'), [
                        'controller' => $controller, 
                        'action' => 'view', 
                        $item->id
                    ],[
                        'escape' => false
                    ]) ?>
                    <?= $this->Html->link($this->Html->icon('edit'), [
                        'controller' => $controller, 
                        'action' => 'edit', 
                        $item->id
                    ], [
                    'escape' => false
                    ]) ?>
                    <?= $this->Form->postLink($this->Html->icon('trash'), [
                        'controller' => $controller, 
                        'action' => 'delete', 
                        $item->id
                    ], [
                    'confirm' => __('Are you sure you want to delete # {0}?', $item->id),
                    'escape' => false
                    ]) ?>