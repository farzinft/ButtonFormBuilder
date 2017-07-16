# ButtonFormBuilder

A simple laravel package for generate html  [post, delete] form buttons.


# Usage:
```php
// Add Facade
'aliases' => [
    .
    .
    
   'BtnForm' => Farzin\BtnFormBuilder\BtnForm::class
];
```

# Examples:
```php
Post Method
BtnForm::post([
    'text' => 'Button Text!',
    'action' => FormActionUrl, //Form Action Url
    'fa' => 'check', //fontawesome icon
    'class' => 'btn btn-info btn-xs', 
    'onclick' => "return confirm('sure?')"
    .
    .
    //You Can Add Any Attribute For Button
 ]);
 
 //Delete Method
 BtnForm::delete([
    'text' => 'Button Text!',
    'action' => FormActionUrl, //Form Action Url
    'fa' => 'check', //fontawesome icon
    'class' => 'btn btn-info btn-xs', 
 ]);
```


