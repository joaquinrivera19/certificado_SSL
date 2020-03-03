# A class to validate SSL certificates

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/ssl-certificate.svg?style=flat-square)](https://packagist.org/packages/spatie/ssl-certificate)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/spatie/ssl-certificate/run-tests?label=tests)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/ssl-certificate.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/ssl-certificate)
[![StyleCI](https://styleci.io/repos/64165510/shield)](https://styleci.io/repos/64165510)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/ssl-certificate.svg?style=flat-square)](https://packagist.org/packages/spatie/ssl-certificate)

The class provided by this package makes it incredibly easy to query the properties on an ssl certificate. Here's an example:

```php
use Spatie\SslCertificate\SslCertificate;

$certificate = SslCertificate::createForHostName('spatie.be');

$certificate->getIssuer(); // returns "Let's Encrypt Authority X3"
$certificate->isValid(); // returns true if the certificate is currently valid
$certificate->expirationDate(); // returns an instance of Carbon
$certificate->expirationDate()->diffInDays(); // returns an int
$certificate->getSignatureAlgorithm(); // returns a string
```

Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## Installation

You can install the package via composer:

```bash
composer require spatie/ssl-certificate
```

## Credits

[https://github.com/spatie/ssl-certificate](https://github.com/spatie/ssl-certificate).
