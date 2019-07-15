<?php

namespace shop\tests\unit\forms;

use common\fixtures\UserFixture;
use shop\forms\ResetPasswordForm;

class ResetPasswordFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    public function testCorrectToken()
    {
        $form = new ResetPasswordForm();
        $form->password = 'new-password';
        expect_that($form->validate());
    }

}
