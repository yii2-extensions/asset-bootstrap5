<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests\Support;

use PHPForge\Support\Assert;
use Yii;
use yii\di\Container;
use yii\web\Application;

/**
 * This is the base class for all yii framework unit tests.
 */
trait TestSupport
{
    protected function destroyApplication()
    {
        Yii::$app = null;
        Yii::$container = new Container();
    }

    protected function mockWebApplication(): void
    {
        new Application(
            [
                'id' => 'testapp',
                'aliases' => [
                    '@app' => dirname(__DIR__, 2),
                    '@bower' => '@vendor/bower-asset',
                    '@npm' => '@vendor/npm-asset',
                    '@public' => '@app/public',
                    '@vendor' => '@app/vendor',
                    '@web' => __DIR__ . '/Support/runtime',
                ],
                'basePath' => dirname(__DIR__, 2),
                'vendorPath' => dirname(__DIR__, 2) . '/vendor',
                'components' => [
                    'assetManager' => [
                        'basePath' => __DIR__ . '/runtime',
                    ],
                    'request' => [
                        'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                        'scriptFile' => __DIR__ . '/index.php',
                        'scriptUrl' => '/index.php',
                    ],
                ],
            ],
        );

        Yii::$app->assetManager->hashCallback = static function (string $path) {
            return match (str_contains($path, 'css')) {
                true => '55145ba9',
                default => '16b8de20',
            };
        };
    }

    protected function setup(): void
    {
        parent::setUp();
        $this->mockWebApplication();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->destroyApplication();
        Assert::removeFilesFromDirectory(__DIR__ . '/runtime');
    }
}
