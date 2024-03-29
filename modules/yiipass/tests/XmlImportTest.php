<?php

use app\modules\yiipass\controllers\ImportXmlController;
use app\modules\yiipass\controllers\PasswordController;
use \yii\di\ServiceLocator;

use app\modules\yiipass\models\Password;

class XmlImportTest extends \PHPUnit_Framework_TestCase {

    public function setUp(){
        require_once(__DIR__ . '/yii_boot_phpunit.inc.php');
    }

    public function testImport(){
        /* @var $xml \app\modules\yiipass\services\SimpleKeePassXmlService */
        $xml = Yii::$app->getModule('yiipass')->get('xml');

        $arr__passwords = Password::find()
                                        ->asArray()
                                        ->orderBy('group')
                                        ->each();

        $xml_result = $xml->createKeePassValidXml($arr__passwords);
        $debug = 'foo';
    }

}
