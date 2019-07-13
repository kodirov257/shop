<?php


namespace shop\services\auth;


use common\entities\User;
use frontend\forms\ResetPasswordForm;
use Yii;
use yii\base\InvalidArgumentException;

class PasswordResetService
{
    private $supportEmail;

    public function __construct($supportEmail)
    {
        $this->supportEmail = $supportEmail;
    }

    public function request($form): void
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $form->email,
        ]);

        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->requestPasswordReset();

        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        $sent =  Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom($this->supportEmail)
            ->setTo($form->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function validateToken($token): void
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Password reset token cannot be blank.');
        }
        if (!User::findByPasswordResetToken($token)) {
            throw new InvalidArgumentException('Wrong password reset token.');
        }
    }

    public function reset($token, ResetPasswordForm $form): void
    {
        $user = User::findByPasswordResetToken($token);

        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->resetPassword($form->password);
        $user->removePasswordResetToken();

        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }
}