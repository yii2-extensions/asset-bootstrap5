<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii;
use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\BootstrapCdnAsset;
use Yii2\Asset\BootstrapPluginAsset;
use Yii2\Asset\BootstrapPluginCdnAsset;
use Yii2\Asset\PopperAsset;
use Yii2\Asset\PopperCdnAsset;
use yii\web\AssetBundle;
use yii\web\View;

final class AssetTest extends TestCase
{
    public function testBootstrapAssetSimpleDependency(): void
    {
        $view = Yii::$app->getView();

        $this->assertEmpty($view->assetBundles);

        BootstrapAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapAsset::class, $view->assetBundles);
    }

    public function testBootstrapAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.css', $result);
    }

    public function testBootstrapCdnAssetSimpleDependency(): void
    {
        $view = Yii::$app->getView();

        $this->assertEmpty($view->assetBundles);

        BootstrapCdnAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapCdnAsset::class, $view->assetBundles);
    }

    public function testBootstrapCdnAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapCdnAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapCdnAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString(
            <<<HTML
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN">
            HTML,
            $result
        );
    }

    public function testBootstrapPluginAssetSimpleDependency(): void
    {
        $view = Yii::$app->getView();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapPluginAsset::class, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);
    }

    public function testBootstrapPluginAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString('bootstrap.css', $result);
        $this->assertStringContainsString('bootstrap.bundle.js', $result);
    }

    public function testBootstrapPluginCdnAssetSimpleDependency(): void
    {
        $view = Yii::$app->getView();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginCdnAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapCdnAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(BootstrapPluginCdnAsset::class, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapCdnAsset::class]);
    }

    public function testBootstrapPluginCdnAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginCdnAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginCdnAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapCdnAsset::class]);

        $result = $view->renderFile(__DIR__ . '/Support/main.php');

        $this->assertStringContainsString(
            <<<HTML
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN">
            HTML,
            $result,
        );
        $this->assertStringContainsString(
            <<<HTML
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"></script>
            HTML,
            $result,
        );
    }
}
