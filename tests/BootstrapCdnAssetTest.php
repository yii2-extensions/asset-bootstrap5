<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii2\Asset\BootstrapCdnAsset;
use Yii2\Asset\Tests\Support\TestSupport;
use yii\web\AssetBundle;
use yii\web\View;

final class BootstrapCdnAssetTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    public function testRegister(): void
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
}
