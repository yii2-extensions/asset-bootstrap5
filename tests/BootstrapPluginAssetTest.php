<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii;
use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\BootstrapPluginAsset;
use Yii2\Asset\Tests\Support\TestSupport;
use yii\web\AssetBundle;
use yii\web\View;

use function runkit_constant_redefine;

final class BootstrapPluginAssetTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    public function testRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.bundle.js', $result);

        $this->assertSame(['bootstrap.bundle.js'], Yii::$app->assetManager->bundles[BootstrapPluginAsset::class]->js);
        $this->assertFileExists(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.js');
        $this->assertFileExists(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.js.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.min.js');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.min.js.map');
    }

    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.bundle.min.js', $result);

        $this->assertSame(['bootstrap.bundle.min.js'], Yii::$app->assetManager->bundles[BootstrapPluginAsset::class]->js);
        $this->assertFileExists(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.min.js');
        $this->assertFileExists(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.min.js.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.js');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/16b8de20/bootstrap.bundle.js.map');

        @runkit_constant_redefine('YII_ENV', 'dev');
    }
}
