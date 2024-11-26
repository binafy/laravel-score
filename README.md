# Laravel Score

<img src="https://banners.beyondco.de/Laravel%20Score.png?theme=dark&packageManager=composer+require&packageName=binafy%2Flaravel-score&pattern=overlappingHexagons&style=style_2&description=Give+score+to+all+things&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="laravel-score">

[![PHP Version Require](https://img.shields.io/packagist/dependency-v/binafy/laravel-score/php)](https://packagist.org/packages/binafy/laravel-score)
[![Latest Stable Version](https://img.shields.io/packagist/v/binafy/laravel-score.svg?style=flat-square)](https://packagist.org/packages/binafy/laravel-score)
[![Total Downloads](https://img.shields.io/packagist/dt/binafy/laravel-score.svg?style=flat-square)](https://packagist.org/packages/binafy/laravel-score)
[![License](https://img.shields.io/packagist/l/binafy/laravel-score)](https://packagist.org/packages/binafy/laravel-score)
[![Passed Tests](https://github.com/binafy/laravel-score/actions/workflows/tests.yml/badge.svg)](https://github.com/binafy/laravel-score/actions/workflows/tests.yml)

## Introduction

A comprehensive Laravel package to implement scoring systems effortlessly. Whether you're building leaderboards, calculating performance metrics, or managing gamification features, Laravel Score provides an intuitive API to define, calculate, and manage scores seamlessly. Perfect for applications requiring dynamic and flexible scoring mechanisms.

## Key Features:

- Simple integration with Eloquent models.
- Support for customizable scoring rules.
- Designed for performance and scalability.
- Extensible and developer-friendly.

## Installation

You can install the package with Composer.

```shell
composer require binafy/laravel-score
```

## Publish

If you want to publish a config file you can use this command:

```shell
php artisan vendor:publish --tag="laravel-score-config"
```

If you want to publish the migrations you can use this command:

```shell
php artisan vendor:publish --tag="laravel-score-migrations"
```

For convenience, you can use this command to publish config, migration, and ... files:

```shell
php artisan vendor:publish --provider="Binafy\LaravelScore\Providers\LaravelScoreServiceProvider"
```

After publishing, run the `php artisan migrate` command.

