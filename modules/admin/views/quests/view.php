<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Quests */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Quests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quests-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Вопросы</div>
        <?php if (empty($asks)): ?>
            <div class="panel-body">
                <p>Активных анкет не найдено</p>
            </div>
        <?php else: ?>
            <!-- List group -->
            <ul class="list-group">
                <?php foreach ($asks as $key => $ask): ?>
                    <li class="list-group-item">
                        <?php echo Html::encode($ask->label); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

</div>
