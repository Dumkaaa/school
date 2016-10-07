<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AskReplies */

$this->title = 'Create Ask Replies';
$this->params['breadcrumbs'][] = ['label' => 'Ask Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ask-replies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
