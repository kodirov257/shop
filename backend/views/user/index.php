<?php

use kartik\date\DatePicker;
use shop\entities\User\User;
use shop\helpers\UserHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'created_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date_from',
                    'attribute2' => 'date_to',
                    'type' => DatePicker::TYPE_RANGE,
                    'separator' => '-',
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),
                'format' => 'datetime',
            ],
            [
                'attribute' => 'username',
                'value' => function (User $model) {
                    return Html::a(Html::encode($model->username), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'email:email',
            [
                'attribute' => 'status',
                'filter' => UserHelper::statusList(),
                'value' => function (User $model) {
                    return UserHelper::statusLabel($model->status);
                },
                'format' => 'raw',
            ],

            ['class' => ActionColumn::class],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
