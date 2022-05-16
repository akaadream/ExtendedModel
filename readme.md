## Laravel ExtendedModel

Laravel ExtendedModel is a package to upgrade the possibilities of the default Eloquent Model.
ExtendedModel provide a new method called `createOrUpdateWith` which is using a request body to hydrate a model instance.

No more big array of model properties' initialization !

### Installation

You have to require this package using composer:
```
composer require akadream/extendedmodel
```

You will now need to add the service provider to the providers array of your `config/app.php`
```
Akadream\ExtendedModel\ExtendedModelProvider::class,
```

You can also replace the default command `php artisan make:model` with `php artisan make:extendedmodel` by copying the package configuration:
```
php artisan vendor:publish --provider="Akadream\ExtendedModel\ExtendedModelProvider"
```

### Usage

The usage of Laravel Extended Model is very simple. You just have to create a model extending the ExtendedModel class:
```php
use \Akaadream\ExtendedModel\ExtendedModel;

class MyModel extends ExtendedModel
{
    
}
```

You will now be able to use the `createOrUpdateWith` method inside your controllers:
```php
// ...

public function store (Request $request)
{
    MyModel::createOrupdateWith(new MyModel, $request);
}
```

You can also put an array of options if you want to attribute a specific value for any of the model property:
```
```
