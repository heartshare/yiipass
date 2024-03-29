<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\yiipass\controllers\PasswordController;

/* @var $this yii\web\View */
/* @var $model app\models\Password */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Passwords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// Make password visible.
$model->password = PasswordController::decrypt($model->password);
?>
<div class="password-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'group',
            'username',
            'password',
            'comment:ntext',
            'url:url',
            'creation',
            'lastaccess',
            'lastmod',
            'expire',
        ],
    ]) ?>

</div>
