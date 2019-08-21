<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $brand shop\entities\Shop\Brand */
/* @var $model shop\forms\manage\Shop\BrandForm */

$this->title = Yii::t('app', 'Update {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $brand->name, 'url' => ['view', 'id' => $brand->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>