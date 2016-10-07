<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AskReplies */

$this->title = 'Update Ask Replies: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ask Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ask-replies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
