<?php
namespace shop\forms\auth;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use shop\entities\User\User;

class ResetPasswordForm extends Model
{
    public $password;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
}
