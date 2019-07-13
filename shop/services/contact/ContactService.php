<?php


namespace shop\services\contact;


use frontend\forms\ContactForm;
use Yii;

class ContactService
{
    private $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function sendEmail(ContactForm $form)
    {
        $sent = Yii::$app->mailer->compose()
            ->setTo($this->adminEmail)
            ->setReplyTo([$form->email => $form->name])
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

}