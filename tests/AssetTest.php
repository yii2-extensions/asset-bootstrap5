<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii;
use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\BootstrapPluginAsset;
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

    public function testBootstrapAssetSourcesPublish(): void
    {
        $view = new View();
        $bundle = BootstrapAsset::register($view);

        $this->assertDirectoryExists($bundle->basePath);
        $this->sourcesPublishVerifyFiles('js', $bundle);
    }

    public function testBootstrapAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapAsset::register($view);

        $this->assertCount(1, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/support/main.php');

        $this->assertMatchesRegularExpression('/bootstrap.css/', $result);
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

    public function testBootstrapPluginAssetSourcesPublish(): void
    {
        $view = new View();
        $bundle = BootstrapPluginAsset::register($view);

        $this->assertDirectoryExists($bundle->basePath);
        $this->sourcesPublishVerifyFiles('js', $bundle);
    }

    public function testBootstrapPluginAssetRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootstrapPluginAsset::register($view);

        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);

        $result = $view->renderFile(__DIR__ . '/support/main.php');

        $this->assertMatchesRegularExpression('/bootstrap.css/', $result);
        $this->assertMatchesRegularExpression('/bootstrap.bundle.js/', $result);
    }

    private function sourcesPublishVerifyFiles(string $type, object $bundle): void
    {
        foreach ($bundle->$type as $filename) {
            $publishedFile = $bundle->basePath . DIRECTORY_SEPARATOR . $filename;
            $sourceFile = $bundle->sourcePath . DIRECTORY_SEPARATOR . $filename;
            $this->assertFileExists($publishedFile);
            $this->assertFileEquals($publishedFile, $sourceFile);
        }

        $this->assertDirectoryExists($bundle->basePath);
    }
}
