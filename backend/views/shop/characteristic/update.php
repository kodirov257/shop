<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $characteristic shop\entities\Shop\Characteristic */
/* @var $model shop\forms\manage\Shop\CharacteristicForm */

$this->title = Yii::t('app', 'Update {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Characteristics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $characteristic->name, 'url' => ['view', 'id' => $characteristic->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="characteristic-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>