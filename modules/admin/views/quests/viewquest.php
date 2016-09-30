<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quests-index">
    <h1><?= Html::encode($model->title) ?></h1>

    <p><?= Html::encode($model->description) ?></p>

    <?php $form = ActiveForm::begin([
        'id'          => 'quest-form',
        'options'     => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template'     => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?php foreach ($asks as $key => $ask): ?>
        <?= $form->field($ask, "[$key]label")->textInput() ?>
    <?php endforeach; ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-1">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <div class="col-lg-offset-1 col-lg-1">
                <?= Html::a('Добавить вопрос', ['ask/create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
