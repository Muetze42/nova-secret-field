[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

# Nova Secret Field

This package provides a custom secret field that can be toggled to see its value.

![index](https://raw.githubusercontent.com/Muetze42/asset-repo/main/nova-secret-field/images/index.png "index")  
![detail](https://raw.githubusercontent.com/Muetze42/asset-repo/main/nova-secret-field/images/details.png "detail")  
![edit](https://raw.githubusercontent.com/Muetze42/asset-repo/main/nova-secret-field/images/edit.png "edit")

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

#### Translate/Message text
Default:
```json
{
    "Copied": "Kopiert",
    "Copying failed": "Kopieren fehlgeschlagen"
}
```

Change messages
```php
SecretField::make(__('Token'), 'token')
    ->copiedMsg(__('Copied'))
    ->failedMsg(__('Copying failed')),
```

### Misc
For Nova 3:  
[nalingia/nova-secret-field](https://github.com/nalingia/nova-secret-field)
