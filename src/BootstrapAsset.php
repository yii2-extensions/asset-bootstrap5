<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

use function defined;

/**
 * Twitter Bootstrap5 CSS bundle.
 */
final class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@npm/bootstrap/dist/css';

    public function __construct()
    {
        parent::__construct();

        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $cssFiles = $environment === 'prod' ? 'bootstrap.min.css' : 'bootstrap.css';

        $this->css = [$cssFiles];
        $this->publishOptions['only'] = [$cssFiles, "$cssFiles.map"];
    }
}
