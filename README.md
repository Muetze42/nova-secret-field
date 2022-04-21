# Nova Secret Field

This package provides a custom secret field that can be toggled to see its value.

## Install
````composer require norman-huth/nova-secret-field````

## Usage
```php
use NormanHuth\SecretField\SecretField;

class Client extends Resource
{
    // ...
    public function fields(NovaRequest $request): array
    {
        return [
            SecretField::make(__('Token'), 'token'),
        ];
    }
```

### Options
Same as a text field and disable „copy to clipboard“ method:
```php
SecretField::make(__('Token'), 'token')->disableClipboard(),
```

### Misc
For Nova 3:  
[nalingia/nova-secret-field](https://github.com/nalingia/nova-secret-field)
