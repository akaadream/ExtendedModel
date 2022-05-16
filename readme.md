## Laravel ExtendedModel

<a href="https://packagist.org/packages/akaadream/extendedmodel"><img src="https://img.shields.io/badge/Packagist-v1.0.0-blue" alt="Latest stable version"></a>


Laravel ExtendedModel is a package to upgrade the possibilities of the default Eloquent Model.
ExtendedModel provide a new method called `createOrUpdateWith` which is using request inputs to hydrate a model instance.

No more big array of model properties' initialization !

### Installation

You can install the package using composer:
```
composer require akaadream/extendedmodel
```

### Usage

You should replace the default command `php artisan make:model` with `php artisan make:extendedmodel` to quickly create an extended model.
For example, `php artisan make:extendedmodel MyModel` will give you this class:
```php
use \Akaadream\ExtendedModel\ExtendedModel;

class MyModel extends ExtendedModel
{
    //
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

Take in consideration that all the requested inputs have to follow the exact same name of the model properties. So if your model have a property `name`, the method will try to find `$request->input('name')` to assign its value.

You can also put an array of options at the third parameter of the method if you want to attribute a specific value for any of the model property.
For example, if you have to upload a file, and then, you want to put on your model the filename inside an image property, you can do:
```php
public function store (Request $request)
{
    $filename = "extendedmodelimage.png";
    // ... image upload

    MyModel::createOrUdateWith(new MyModel, $request, ['image' => $filename]);
}
```
