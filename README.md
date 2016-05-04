# FastD Bundle-X

![Building](https://api.travis-ci.org/JanHuang/bundlex.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/fastd/bundlex/v/stable)](https://packagist.org/packages/fastd/bundlex) [![Total Downloads](https://poser.pugx.org/fastd/bundlex/downloads)](https://packagist.org/packages/fastd/bundlex) [![Latest Unstable Version](https://poser.pugx.org/fastd/bundlex/v/unstable)](https://packagist.org/packages/fastd/bundlex) [![License](https://poser.pugx.org/fastd/bundlex/license)](https://packagist.org/packages/fastd/bundlex)

FastD Bundle 模块开发，独立包开发，将 bundle 独立部署，独立运行，可以进行最小模块拆分和管理模块。

## 要求

* PHP 7+

## Composer

```json
{
    "fastd/bundlex": "2.0.x-dev"
}
```

## 使用

FastD 模块开发添加依赖: `fastd/bundlex`，更新和安装完成后，`composer` 会执行对应脚本，创建最基础的模块项目环境。

创建一个仓库，构建 `composer.json`.

```json
{
    "require": {
        "php": ">=7.0",
        "fastd/bundlex": "~2.0"
    },
    "autoload": {
        "psr-4": {
            "": "src"
        }
    },
    "autoload-dev": {
        "files": [
            "app/application.php"
        ]
    },
    "config": {
        "bin-dir": "bin"
    }
}
```

建议在开发环境中添加 `autoload-dev`，`config` 选项，`autoload-dev` 针对在开发环境中的自动加载项，仅对于生成出来的文件，最终提交 `src` 源码及相关 `composer` 配置即可。而 `autoload` 配置选项即是项目开发 `src` 的自动加载路径。

`config` 选项主要配置初始化脚本位置，初始化脚本会存放到此目录，不配置则没有。

### 模块初始化

```
php bin/bundle init
```

初始化 `bundle` 结构，继续执行:

```
php bin/console bundle:generate BundleName
```

创建 `bundle` 组织代码。

然后就可以按照框架本身的开发进行开发项目。开发出来的项目，既可以独立部署运行，也可以随意依赖整合到 `FastD` 框架中。

也可以根据上述步骤，创建自己的非项目包，`BundleX` 仅提供一个可运行的部署环境。

## Testing

```
phpunit
```

## License MIT


