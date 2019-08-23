<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modification shop\entities\Shop\Product\Modification */
/* @var $model shop\forms\manage\Shop\Product\ModificationForm */

$this->title = Yii::t('app', 'Update {name}', [
    'name' => $modification->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modification->name, 'url' => ['view', 'id' => $modification->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="modification-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>