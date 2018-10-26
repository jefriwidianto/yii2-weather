<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * @return string
     */
    public function actionIndex()
    {
        $string = "https://www.metaweather.com/api/location/1047378/";
        $data = json_decode(file_get_contents($string),true);

        $country =  "<h4 class='w3-xxxlarge w3-animate-zoom'><b>".$data['title']."</h4></b>";
        $get_time = $data['time'];
        $time = date('h:i A', strtotime($get_time));

        return $this->render('index', ['country' => $country, 'time' => $time, 'data' => $data,]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $city = $model->q;
            $get_string = "https://www.metaweather.com/api/location/search/?query=".$city;
            $get_data = json_decode(file_get_contents($get_string),true);
            if (!empty($get_data)) {
                
                $string = "https://www.metaweather.com/api/location/".json_encode($get_data[0]['woeid'])."/";
                $data = json_decode(file_get_contents($string),true);
                $country =  "<h4 class='w3-xxxlarge w3-animate-zoom'><b>".$data['title']."</h4></b>";
                $get_time = $data['time'];
                $time = date('h:i A', strtotime($get_time));

                return $this->render('index', ['model' => $model, 'country' => $country, 'time' => $time, 'data' => $data,]);

            }else{
                Yii::$app->getSession()->setFlash('error','Data Tidak Tersedia!');

                return $this->render('contact', ['model' => $model,]);
            }
            
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
