<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\Product\\ModificationForm */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modification-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
