<?php

use yii\bootstrap\Html;
use yii\grid\GridView;

?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p><?
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'label'  => 'Название',
                    'attribute' => 'label',
                    'format' => 'raw',
                    'value'  => function ($data) {
                        return Html::label($data['label']);
                    }
                ],
                [
                    'label'  => 'Ссылка',
                    'format' => 'raw',
                    'value'  => function ($data) {
                        return Html::a(
                            'Перейти',
                            $data['url'],
                            [
                                'target' => '_blank'
                            ]
                        );
                    }
                ],
            ],
        ]);

        ?></p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
