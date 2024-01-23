<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii;
use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\Tests\Support\TestSupport;
use yii\web\AssetBundle;
use yii\web\View;

use function runkit_constant_redefine;

final class BootstrapAssetTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    public function testRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.css', $result);
        $this->assertSame(['bootstrap.css'], Yii::$app->assetManager->bundles[BootstrapAsset::class]->css);
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/bootstrap.css');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/bootstrap.css.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/bootstrap.min.css');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/bootstrap.min.css.map');
    }

    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.min.css', $result);

        $this->assertSame(['bootstrap.min.css'], Yii::$app->assetManager->bundles[BootstrapAsset::class]->css);
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/bootstrap.min.css');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/bootstrap.min.css.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/bootstrap.css');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/bootstrap.css.map');

        @runkit_constant_redefine('YII_ENV', 'dev');
    }
}
