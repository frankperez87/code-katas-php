# Code Katas in PHP 
This repository stores various code katas that I have worked on using PHPSpec with a TDD aproach. 

### KarateChop Code Kata
```php
<?php

require 'vendor/autoload.php';

// Array Must be Sorted
$integers_to_search = [1, 2, 3, 5, 7, 9, 11, 12, 13];

$chop = new Kata\KarateChop\Chop;

try {
    $index = $chop->chop(5, $integers_to_search);
    echo 'Found Index at: ' . $index;
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

```