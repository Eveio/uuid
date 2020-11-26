# eve/uuid

![banner](./assets/banner.png)

> A simple wrapper for the great [ramsey/uuid](https://github.com/ramsey/uuid) package.

## Installation

Require the package with Composer:

```bash
compose require eve/uuid
```

## Usage

For the sake of simplicity and internal usage, eve's `Uuid` class only deals with `Ramsey\Uuid` v4 _as strings_. Any more advanced usage will have to be done directly with `Ramsey\Uuid`.

```php
use Eve\Uuid\Uuid;

// Generate an UUID string
$uuid = Uuid::generate();

// The package also comes with a handy global function
$uuid = uuid();

// Freeze the next generated value, useful for testing
$frozenValue = Uuid::freeze();
assert(Uuid::generate() === $frozenValue); // true

// You can also supply a custom value for freezing
Uuid::freeze('dummy');
assert(Uuid::generate() === 'dummy'); // true

// "Reset" UUID generation to normal. This can for example be put in PHPUnit's `tearDown` method. 
Uuid::unfreeze(); 
```

## License

MIT, of course.
