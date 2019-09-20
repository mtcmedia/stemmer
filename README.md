# String Stemmer

Adaptation of https://github.com/wamania/php-stemmer stemmer algorithm.
This package extends the original by adding sentence parsing functionality.



## Installation
Require via composer 
```bash
composer require mtcmedia/stemmer
```

## Usage

```php
use Mtc\Stemmer\Stemmer;

// Default language is set as english
$stem = Stemmer::multiStem('This is my sentence');

$stem = Stemmer::multiStem("c'est ma phrase', 'french");
```

## Contributing
Please see [Contributing](CONTRIBUTING.md) for details.
