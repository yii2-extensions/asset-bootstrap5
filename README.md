<p align="center">
    <a href="https://github.com/yii2-extensions/asset-bootstrap5" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" height="100px;">
    </a>
    <h1 align="center">Asset for Twitter Bootstrap5.</h1>
    <br>
</p>

<p align="center">
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5" alt="php-version">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/2.2" target="_blank">
        <img src="https://img.shields.io/badge/Yii2%20version-2.2-blue" alt="yii2-version">
    </a>
    <a href="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://codecov.io/gh/yii2-extensions/asset-bootstrap5" target="_blank">
        <img src="https://codecov.io/gh/yii2-extensions/asset-bootstrap5/branch/main/graph/badge.svg?token=MF0XUGVLYC" alt="Codecov">
    </a>
    <a href="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/gii/actions/workflows/static.yml/badge.svg" alt="PHPStan">
    </a>
    <a href="https://github.com/yii2-extensions/asset-bootstrap5/actions/workflows/static.yml" target="_blank">
        <img src="https://img.shields.io/badge/PHPStan%20level-5-blue" alt="PHPStan level">
    </a>
    <a href="https://github.styleci.io/repos/719651888?branch=main" target="_blank">
        <img src="https://github.styleci.io/repos/719651888/shield?branch=main" alt="Code style">
    </a>               
</p>

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
composer require --dev --prefer-dist yii2-extensions/asset-bootstrap5
```

or add

```
"yii2-extensions/asset-bootstrap5": "dev-main"
```

to the require-dev section of your `composer.json` file. 

## Usage

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

## Testing

[Check the documentation testing](/docs/testing.md) to learn about testing.

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)

## License

The MIT License. Please see [License File](LICENSE.md) for more information.
