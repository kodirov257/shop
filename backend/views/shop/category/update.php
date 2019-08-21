<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category shop\entities\Shop\Category */
/* @var $model shop\forms\manage\Shop\CategoryForm */

$this->title = Yii::t('app', 'Update {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['view', 'id' => $category->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>