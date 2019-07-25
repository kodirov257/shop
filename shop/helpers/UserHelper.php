<?php


namespace shop\helpers;


use shop\entities\User\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UserHelper
{
    public static function statusList(): array
    {
        return [
            User::STATUS_DELETED => 'Deleted',
            User::STATUS_INACTIVE => 'Inactive',
            User::STATUS_ACTIVE => 'Active',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case User::STATUS_DELETED:
                $class = 'label label-warning';
                break;
            case User::STATUS_INACTIVE:
                $class = 'label label-default';
                break;
            case User::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class
        ]);
    }
}