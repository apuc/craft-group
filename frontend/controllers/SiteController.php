<?php
namespace frontend\controllers;

use backend\modules\contacts\models\Contacts;
use backend\modules\portfolio\models\Portfolio;
use common\models\BlogSlider;
use common\models\KeyValue;
use common\models\Main;
use frontend\models\SendForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['url', 'lastmod']);
                    $model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to($model->url, true),
                        'lastmod' => strtotime($model->lastmod),
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8
                    ];
                }
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
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
        $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->orderBy(['date' => SORT_DESC])->asArray()->all();
        $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
        $portfolio = Portfolio::find()->where(['options' => 1])->asArray()->limit(7)->all();
        $title = KeyValue::getValue('main_page_meta_title');
        $key = KeyValue::getValue('main_page_meta_key');
        $desc = KeyValue::getValue('main_page_meta_desc');
        $domain_verify = KeyValue::getValue('main_page_meta_p:domain_verify');
        $main = Main::find()->all();
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $desc,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $key,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'p:domain_verify',
            'content' => $domain_verify,
        ]);
        Yii::$app->opengraph->title = KeyValue::getValue('main_og_title');
        Yii::$app->opengraph->description = KeyValue::getValue('main_og_description');
        Yii::$app->opengraph->image = KeyValue::getValue('main_og_image');
        Yii::$app->opengraph->url = KeyValue::getValue('main_og_url');
        Yii::$app->opengraph->siteName = KeyValue::getValue('main_og_site_name');
        Yii::$app->opengraph->type = KeyValue::getValue('main_og_type');


        $this->view->params['contacts'] = Contacts::find()->asArray()->all();

        return $this->render('index', ['blog' => $blog, 'portfolio' => $portfolio,
            'title' => $title, 'main' => $main, 'b_cur' => $b_cur]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
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

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /*Отправка письма*/
    public function actionSendForm()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $model = new SendForm();
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $message = 'Имя: ' . $model->name . '<br>';

                $message .= 'Телефон: ' . $model->phone . '<br>';
                $message .= 'E-mail: ' . $model->email . '<br>';
                if ($model->skype) {
                    $message .= 'Skype: ' . $model->skype . '<br>';
                }

                if ($model->message) {
                    $message .= 'Сообщение: ' . $model->message . '<br>';
                }

//                $mail = Yii::$app->mailer->compose()
//                    ->setFrom(['canya.panfilov.95@yandex.ru' => 'Письмо с сайта web-artcraft.com'])
//                    ->setTo('canya.panfilov.95@gmail.com')
//                    ->setSubject($model->subject)
////                    ->setTextBody($message)
//                    ->setHtmlBody('<b>' . $message . '</b>')
//                    ->send();
//                var_dump($mail);
            }
        }


//        return SendForm::sendMail();
    }

    public function beforeAction($action)
    {
        if ($this->action->id == 'send-form') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);

    }

    public function actionError()
    {
        $this->layout = 'error';
        return $this->render('error');
    }

}
