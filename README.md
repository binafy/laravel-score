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

## Usage

First of all, you need to use two traits:

```php
use Binafy\LaravelScore\Traits\InteractWithScore;
use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use InteractWithScore;
}
```

And your model that want to give score to it:

```php
use Binafy\LaravelScore\Traits\Scoreable;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use Scoreable;
}
```

### Add Score

For giving a score to scoreable, you can use `addScore()` method:

```php
$user->addScore(
    Model $scoreable,
    int $score = 1,
    int|null $userId = null
);
```

### Add Negative Score

If you want to add negative score to scoreable, you can use `addNegativeScore()` method:

```php
$user->addNegativeScore(
    Model $scoreable,
    int|null $userId = null
);
```

<a name="contributors"></a>
## Contributors

Thanks to all the people who contributed. [Contributors](https://github.com/binafy/laravel-score/graphs/contributors).

<a href="https://github.com/binafy/laravel-score/graphs/contributors"><img src="https://opencollective.com/laravel-score/contributors.svg?width=890&button=false" /></a>

<a name="security"></a>
## Security

If you discover any security-related issues, please email `binafy23@gmail.com` instead of using the issue tracker.

<a name="chanelog"></a>
## Changelog

The changelog can be found in the `CHANGELOG.md` file of the GitHub repository. It lists the changes, bug fixes, and improvements made to each version of the Laravel User Monitoring package.

<a name="license"></a>
## License

The MIT License (MIT). Please see [License File](https://github.com/binafy/laravel-score/blob/1.x/LICENSE) for more information.

<a name="start-history"></a>
## Star History

[![Star History Chart](https://api.star-history.com/svg?repos=binafy/laravel-score&type=Date)](https://star-history.com/#binafy/laravel-score&Date)

<a name="donate"></a>
## Donate

If this package is helpful for you, you can buy a coffee for me :) ❤️

- Iranian Gateway: https://daramet.com/milwad_khosravi
- Paypal Gateway: SOON
- MetaMask Address: `0xf208a562c5a93DEf8450b656c3dbc1d0a53BDE58`
