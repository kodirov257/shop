<?php


namespace common\bootstrap;


use shop\services\auth\PasswordResetService;
use shop\services\contact\ContactService;
use Yii;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->setSingleton(PasswordResetService::class);

        $container->setSingleton(ContactService::class, [], [
            $app->params['adminEmail']
        ]);
    }
}