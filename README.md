#  CakePHP IdeHelper Plugin

[![Build Status](https://api.travis-ci.org/dereuromark/cakephp-ide-helper.png?branch=master)](https://travis-ci.org/dereuromark/cakephp-ide-helper)
[![Coverage Status](https://img.shields.io/codecov/c/github/dereuromark/cakephp-ide-helper/master.svg)](https://codecov.io/github/dereuromark/cakephp-ide-helper?branch=master)
[![Latest Stable Version](https://poser.pugx.org/dereuromark/cakephp-ide-helper/v/stable.svg)](https://packagist.org/packages/dereuromark/cakephp-ide-helper)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/dereuromark/cakephp-ide-helper/license.png)](https://packagist.org/packages/dereuromark/cakephp-ide-helper)
[![Total Downloads](https://poser.pugx.org/dereuromark/cakephp-ide-helper/d/total.png)](https://packagist.org/packages/dereuromark/cakephp-ide-helper)

IdeHelper plugin for CakePHP applications.

> Boost your productivity. Avoid mistakes.

**This branch is for CakePHP 3.x**

## Features

The main idea is to improve IDE compatibility and use annotations to make the IDE understand the
"magic" of CakePHP, so you can click through the classes and object chains as well as see obvious issues and mistakes.
The IDE will usually mark problematic code yellow (missing, wrong method etc).

So for now:
- Add annotations to existing classes (e.g. when upgrading an application) just like baking would to new code.
- Can run multiple times without adding the annotations again.

## Install
Install it as `require-dev` dependency:
```
composer require --dev dereuromark/cakephp-ide-helper:dev-master
```

## Setup
Enable the plugin in your `config/bootstrap_cli.php` or call
```
bin/cake plugin load IdeHelper --cli
```

Note: As require-dev dependency this should only be loaded for local development (with some check).

### Using the annotation shell
Running it on your app:
```
bin/cake annotations [type] -v
```
Use `-v` for verbose and detailed output.

Running it on a loaded plugin:
```
bin/cake annotations [type] -p FooBar
```

You can use `-d` (`--dry-run`) to simulate the output without actually modifying the files.

See the **[Docs](/docs)** for details.
