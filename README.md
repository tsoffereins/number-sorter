# Number sorter
With this library you can finally sort your list of numbers the way you always wanted: alphabetically.

## Installation
You can install the NumberSorter through [composer](https://packagist.org/packages/tsoffereins/number-sorter):
```bash
composer require tsoffereins/number-sorter
```

This library requires **PHP 5.6 or higher** in order to work. 

## Usage
Sorting a list of number alphabetically is easy as 1 3 2:
```php
$sorter = new \NumberSorter\NumberSorter();

$input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$output = $sorter->sort($input);

var_dump($output); // [8, 5, 4, 9, 1, 7, 6, 10, 3, 2]
```

### Numeric list
The input list must be an array of only numeric values. This includes any value that would make `is_numeric()` 
return true. See [php.net](https://www.php.net/manual/en/function.is-numeric.php) for more on that.

If you pass a non numeric value a `TypeError` will be thrown.

### Language
By default numbers are sorted alphabetically in English, but if you'd like to sort in another language you can pass it
to the constructor:
```php
$sorter = new \NumberSorter\NumberSorter('nl');

$input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$output = $sorter->sort($input);

var_dump($output); // [8, 3, 1, 9, 10, 2, 4, 5, 6, 7]
``` 

The NumberSorter library relies on the package `kwn/number-to-words` for translating numbers into words. Take a look at 
their documentation for the [available locales](https://github.com/kwn/number-to-words#available-locale).

### Immutability
Passing an array by reference and sorting its contents, like PHP's `sort()` function does, might have been OK in the 
nineties, but proper code should limit side effects. Therefore, the NumberSorter does not alter the input array but
returns a new array with the same numbers sorted alphabetically.

## Support
Are you kidding me?!
