<?php
namespace frontend\controllers;

use shop\services\auth\AuthService;
use shop\services\auth\PasswordResetService;
use shop\services\manage\ContactService;
use shop\services\auth\SignupService;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use shop\forms\LoginForm;
use shop\forms\PasswordResetRequestForm;
use shop\forms\ResetPasswordForm;
use shop\forms\SignupForm;
use shop\forms\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    private $authService;
    private $signupService;
    private $passwordResetService;
    private $contactService;

    public function __construct($id, $module,
                                AuthService $authService,
                                SignupService $signupService,
                                PasswordResetService $passwordResetService,
                                ContactService $contactService,
                                $config = [])
    {
        $this->authService = $authService;
        $this->signupService = $signupService;
        $this->passwordResetService = $passwordResetService;
        $this->contactService = $contactService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
