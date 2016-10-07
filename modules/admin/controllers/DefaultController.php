<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $menu = [
            ['label' => 'Анкеты', 'url' => ['quests/index']],
            ['label' => 'Вопросы', 'url' => ['ask/index']],
            ['label' => 'Ответы', 'url' => ['ask_replies/index']],
            ['label' => 'Пользователи', 'url' => ['user/index']],
        ];

        $dataProvider = new ArrayDataProvider([
            'key'        => 'id',
            'allModels'  => $menu,
            'sort'       => [
                'attributes' => ['label', 'url'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Закрываем контроллер от неавторизованных юзеров
     */
    public function behaviors()
    {
        //получаем поведения, определенные в классе-родителе
        $return = parent::behaviors();
        //определяем свои поведения
        $behaviors = [
            //контролирует доступ к экшенам контроллера
            'access' => [
                //класс фильтра для доступа
                'class' => AccessControl::className(),
                //правила для доступа
                'rules' => [
                    [
                        'allow' => true,
                        //@ означает только авторизованных пользователей
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
        //сливаем два массива в один и возвращаем
        return array_merge($return, $behaviors);
    }
}
