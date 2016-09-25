<?php
namespace mhndev\yii2Rate;

use mhndev\rate\Interfaces\iRateableEntity;
use yii\base\BootstrapInterface;
use yii\base\Module as BaseModule;
use yii\console\Application as ConsoleApplication;

/**
 * Class Module
 * @package mhndev\yii2Media
 */
class Module extends BaseModule implements BootstrapInterface
{

    public $db = 'db';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mhndev\yii2Rate\Controllers';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $config = include \Yii::getAlias('@app/config/').DIRECTORY_SEPARATOR.'rate.php';

        foreach ($config['items'] as $item){
            if(!in_array(iRateableEntity::class, class_implements($item['class']) )){
                throw new \Exception($item['class'].' should implement '. iRateableEntity::class.' interface');
            }

            $item['class']::setRateValue((new $item['rate_values']['class'])->setPossibleValues($item['rate_values']['values']));
            $item['class']::setPossibleRateTypes($item['rate_types']);
        }

    }

    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        if ($app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'mhndev\yii2Rate\Commands';
        }
    }
}
