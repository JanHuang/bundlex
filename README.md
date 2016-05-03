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

如果执行失败，可以使用命令: `composer run-script post-update-cmd` 进行部署。

目录与文件创建保持与框架 FastD 一致。方便部署，整合与扩展。

具体会创建如下目录和文件:

```
app/application.php
bin/console
public/.htaccess
public/dev.php
public/prod.php
.gitignore
```

## Testing

```
phpunit
```

## License MIT
