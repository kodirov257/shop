<?php

use shop\entities\Shop\Product\Product;
use shop\helpers\PriceHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'value' => function (Product $model) {
                            return $model->mainPhoto ? Html::img($model->mainPhoto->getThumbFileUrl('file', 'admin')) : null;
                        },
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 100px'],
                    ],
                    'id',
                    [
                        'attribute' => 'name',
                        'value' => function (Product $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'category_id',
                        'filter' => $searchModel->categoriesList(),
                        'value' => 'category.name',
                    ],
                    [
                        'attribute' => 'price_new',
                        'value' => function (Product $model) {
                            return PriceHelper::format($model->price_new);
                        },
                    ],
                ],
            ]); ?>
        </div>

    <?php Pjax::end(); ?>

</div>
