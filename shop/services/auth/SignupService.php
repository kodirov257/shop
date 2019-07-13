<?php


namespace shop\services\auth;


use common\entities\User;
use frontend\forms\SignupForm;
use Yii;

class SignupService
{
    public function signup(SignupForm $form)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::signup($form->username, $form->email, $form->password);

        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

//        $this->sendEmail($user);

        return $user;

    }

    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

}