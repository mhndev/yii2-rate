<?php
namespace mhndev\yii2Rate\Controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class RateController
 * @package mhndev\yii2Media\Controllers
 */
class RateController extends Controller
{

    /**
     * @var bool
     */
    public $enableCsrfValidation = false;


    /**
     * init
     */
    public function init()
    {
        parent::init();

        Yii::$app->response->format = Response::FORMAT_JSON;
    }


    /**
     * @return array
     */
    public function behaviors()
    {
        $configPath = $this->module->getBasePath() . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'behaviors.php';
        $config = include $configPath;

        return $config[self::class];
    }

    /**
     * @return array
     */
    public function verbs()
    {
        return [
            'rate' => ['POST'],
            'undo-rate' => ['DELETE'],
        ];
    }

    public function actionRate()
    {

    }

    public function actionUndoRate()
    {

    }

}
