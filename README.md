<p align="center">
    <a href="https://github.com/yii2-extensions/asset-bootstrap5" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" height="100px;">
    </a>
    <h1 align="center">Asset bundle for Twitter Bootstrap 5.</h1>
    <br>
</p>

<p align="center">
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5" alt="php-version">
    </a>
    <a href="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/compatibility.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/compatibility.yml/badge.svg" alt="PHPUnit">
    </a>    
    <a href="https://codecov.io/gh/yii2-extensions/asset-bootstrap5" target="_blank">
        <img src="https://codecov.io/gh/yii2-extensions/asset-bootstrap5/branch/main/graph/badge.svg?token=MF0XUGVLYC" alt="Codecov">
    </a>
    <a href="https://dashboard.stryker-mutator.io/reports/github.com/yii2-extensions/asset-bootstrap5/main" target="_blank">
        <img src="https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii2-extensions%2Fasset-bootstrap5%2Fmain" alt="Infection">
    </a>                  
</p>

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
composer require --prefer-dist yii2-extensions/asset-bootstrap5:"^0.1"
```

or add

```
"yii2-extensions/asset-bootstrap5":"^0.1"
```

to the require section of your `composer.json` file. 

## Basic usage

```php
<?php

declare(strict_types=1);

use Yii2\Asset\BootstrapAsset;

BootstrapAsset::register($this);
```

```php
<?php

declare(strict_types=1);

use Yii2\Asset\BootstrapPluginAsset;

BootstrapPluginAsset::register($this);
```

## CDN usage

```php
<?php

declare(strict_types=1);

use Yii2\Asset\BootstrapCdnAsset;

BootstrapCdnAsset::register($this);
```

```php
<?php

declare(strict_types=1);

use Yii2\Asset\BootstrapPluginCdnAsset;

BootstrapPluginCdnAsset::register($this);
```

## Testing

[Check the documentation testing](/docs/testing.md) to learn about testing.

## Quality code
  
[![static-analysis](https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/static.yml/badge.svg)](https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/static.yml)
[![phpstan-level](https://img.shields.io/badge/PHPStan%20level-7-blue)](https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/static.yml)
[![style-ci](https://github.styleci.io/repos/719651888/shield?branch=main)](https://github.styleci.io/repos/719651888?branch=main)

## Support versions Yii2

[![Yii20](https://img.shields.io/badge/Yii2%20version-2.0-blue)](https://github.com/yiisoft/yii2/tree/2.0.49.3)
[![Yii22](https://img.shields.io/badge/Yii2%20version-2.2-blue)](https://github.com/yiisoft/yii2/tree/2.2)

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)

## License

The MIT License. Please see [License File](LICENSE.md) for more information.
