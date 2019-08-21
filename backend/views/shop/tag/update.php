<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $tag shop\entities\Shop\Tag */
/* @var $model shop\forms\manage\Shop\TagForm */

$this->title = Yii::t('app', 'Update {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tag->name, 'url' => ['view', 'id' => $tag->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>