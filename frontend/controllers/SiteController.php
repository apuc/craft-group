<?php
namespace frontend\controllers;

use backend\modules\contacts\models\Contacts;
//use backend\modules\portfolio\models\Portfolio;
use common\models\BlogSlider;
use common\models\KeyValue;
use common\models\Main;
use common\models\Portfolio;
use frontend\models\SendForm;
use frontend\models\SendCallBack;
use Yii;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

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
		$portfolio = Yii::$app->cache->getOrSet("portfolio", function () {
			return Portfolio::find()->where(['options' => 1])->limit(7)->all();
		});
		$title = KeyValue::getValue('main_page_meta_title');
		$key = KeyValue::getValue('main_page_meta_key');
		$desc = KeyValue::getValue('main_page_meta_desc');
		$domain_verify = KeyValue::getValue('main_page_meta_p:domain_verify');
		$main = Yii::$app->cache->getOrSet("main", function () {
			return Main::find()->all();
		});
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
		\Yii::$app->view->registerMetaTag([
			'name' => 'google-site-verification',
			'content' => '5ddh80ZkvC_F2CIrFbnIYYlbGnKAG-bk7njGOxY9Qa0',
		]);

		$this->setOpengraph();


		$this->view->params['contacts'] = Yii::$app->cache->getOrSet("contacts_cache", function () {
			return Contacts::find()->asArray()->limit(7)->all();
		});

		return $this->render('index', ['portfolio' => $portfolio,
			'title' => $title, 'main' => $main]);
	}

	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        } else {
//            return $this->render('contact', [
//                'model' => $model,
//            ]);
//        }
//    }

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
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
//    public function actionRequestPasswordReset()
//    {
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            } else {
//                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
//            }
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
//    }

	/**
	 * Resets password.
	 *
	 * @param string $token
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
//    public function actionResetPassword($token)
//    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
//    }

	/*Отправка письма*/
	public function actionSendForm()
	{
		if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
			$model = new SendForm();
			$post = Yii::$app->request->post();
			$model->load($post);

			$model->files = UploadedFile::getInstances($model, 'files');
			$model->file = UploadedFile::getInstance($model, 'file');
			if ($model->validate()) {

				$model->save($post);

				$model->setRadioListForm();
				$message = 'Имя: ' . $model->name . '<br>';

				$message .= 'Телефон: ' . $model->phone . '<br>';
				$message .= 'E-mail: ' . $model->email . '<br>';

				if ($model->skype) {
					$message .= 'Skype: ' . $model->skype . '<br>';
				}

				if (!empty($model->radioListForm)) {
					$message .= "Заказаны следующие услуги: " . implode(", ", $model->radioListForm) . "<br>";
				}

				if ($model->message) {
					$message .= 'Сообщение: ' . $model->message . '<br>';
				}

				$model->thankMessage .= Html::a(
					'Следите за нами с социальных сетях ВК ',
					'https://vk.com/web_craft_group'
				);

				$mail = Yii::$app->mailer->compose()
					->setFrom([Yii::$app->params['supportEmail'] => 'Письмо с сайта web-artcraft.com'])
					->setTo([
						Yii::$app->params['adminEmail'],
					])
					->setSubject($model->subject)
//                    ->setTextBody($message)
					->setHtmlBody('<b>' . $message . '</b>')
					->send();

				$mail2 = Yii::$app->mailer->compose()
					->setFrom([Yii::$app->params['supportEmail'] => 'Письмо с сайта web-artcraft.com'])
					->setTo([
						$model->email
					])
//                    ->setSubject($model->subject)
//                    ->setTextBody($message)
					->setHtmlBody('<b>' . $model->thankMessage . '</b>')
					->send();

				$mail3 = Yii::$app->mailer->compose()
				                          ->setFrom([Yii::$app->params['supportEmail'] => 'Письмо с сайта web-artcraft.com'])
				                          ->setTo(
					                          'shlykovn@mail.ru'
				                          )
//                    ->setSubject($model->subject)
//                    ->setTextBody($message)
                                          ->setHtmlBody('<b>' . $model->thankMessage . '</b>')
				                          ->send();
				var_dump($mail3);
			}
		}
//        return SendForm::sendMail();
	}

	/*Отправка обратного звонка*/
	public function actionCallBack()
	{
		if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {

			$model = new SendCallBack();
			$post = Yii::$app->request->post();

			$model->load($post);

			if ($model->validate()) {

				$model->save($post);

				$message = 'Телефон: ' . $model->phone . '<br>';

				$model->thankMessage .= Html::a(
					'Следите за нами с социальных сетях ВК ',
					'https://vk.com/web_craft_group'
				);
				$model->sendMail($message, $model->subject);
				$result = [
					'result' => 'success',
					'message' => 'Ваша заявка отправлена!'
				];
			} else {
				$result = [
					'result' => 'error',
					'message' => 'Возникла ошибка при отправке. Не верно введен телефон!'
				];
			}
			// возвращаем результат
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

			return $result;
		}
	}

	public function actionValidate()
	{
		if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
			$model = new SendForm();
			$post = Yii::$app->request->post();
			$model->load($post);
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
	}

	public function actionUploadFile()
	{
		if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
			$model = new SendForm();
			$post = Yii::$app->request->post();
			$model->load($post);

			$model->files = UploadedFile::getInstances($model, 'files');
			var_dump($model->files);
			die;
		}
	}

//	public function beforeAction($action)
//	{
//		if ($this->action->id == 'send-form') {
//			$this->enableCsrfValidation = false;
//		}
//
//		return parent::beforeAction($action);
//
//	}

	public function actionError()
	{
		$this->layout = 'error';
		return $this->render('error');
	}

	private function setOpengraph()
	{
		$title = Yii::$app->cache->getOrSet("og_title", function () {
			return KeyValue::getValue('main_og_title');
		});
		$description = Yii::$app->cache->getOrSet("og_desc", function () {
			return KeyValue::getValue('main_og_description');
		});
		$image = Yii::$app->cache->getOrSet("og_img", function () {
			return KeyValue::getValue('main_og_image');
		});
		$url = Yii::$app->cache->getOrSet("og_url", function () {
			return KeyValue::getValue('main_og_url');
		});
		$siteName = Yii::$app->cache->getOrSet("og_site_name", function () {
			return KeyValue::getValue('main_og_site_name');
		});
		$type = Yii::$app->cache->getOrSet("og_type", function () {
			return KeyValue::getValue('main_og_type');
		});

		Yii::$app->og->registerTags($title, $description, $image, $url, $siteName, $type);
	}

}
