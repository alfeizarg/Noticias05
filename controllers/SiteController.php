<?php

namespace app\controllers;

use app\models\Noticia;
use app\models\Seccion;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
     * @return string
     */
    public function actionIndex()
    {
        // necesito recuperar todas las
        // noticias de la base de datos
        $consulta = Noticia::find(); // consulta sin ejecutar (activeQuery)

        //$datos = $consulta->all();  // array modelos de noticias
        //$datos = $consulta->asArray()->all(); // array de noticias

        // noticias de portada
        $datos = $consulta
            ->where(["portada" => 1]) // seleccionar
            //->where("portada=1") // seleccionar
            ->all(); // ejecutar

        return $this->render('index', [
            "datos" => $datos
        ]);
    }


    public function actionViewnoticia($idNoticia)
    {
        $consulta = Noticia::find()->where([
            "idNoticia" => $idNoticia
        ]); // select * from noticia where idNoticia=1

        $dato = $consulta->one();

        return $this->render("verNoticia", [
            "dato" => $dato
        ]);
    }


    public function actionSecciones()
    {

        $secciones = Seccion::find()->all(); //select * from seccion

        //mando a la vista secciones todas las secciones de la base de datos    
        return $this->render('secciones', [
            "secciones" => $secciones
        ]);

        return $this->render('secciones', compact("secciones"));
    }





    //listas las noticias con el id
    public function actionSeccion($id)
    {
        $noticias = Noticia::find()
            ->where(["seccion" => $id])
            ->all();
        return $this->render('index', [
            "datos" => $noticias
        ]);

        return $this->render('datos', compact("noticias"));
    }
}