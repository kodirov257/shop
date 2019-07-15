<?php
namespace shop\forms;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use shop\entities\User;

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
