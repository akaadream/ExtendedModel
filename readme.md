## Laravel ExtendedModel

Laravel ExtendedModel is a package to upgrade the possibilities of the default Eloquent Model.
ExtendedModel provide a new method called `createOrUpdateWith` which is using a request body to hydrate a model instance.

No more big array of model properties' initialization !

### Installation

You have to require this package using composer:
```
composer require akadream/extendedmodel
```

### Usage

You can replace the default command `php artisan make:model` with `php artisan make:extendedmodel` to create quickly an extended model.
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

Take in consideration that all the requested inputs have to follow the exact same name of the model property. So if your model have a property `name`, the method will try to find `$request->input('name')`.

You can also put an array of options at the third parameter of the method if you want to attribute a specific value for any of the model property.
For example, if you have to upload a file, and then, you want to put inside you model the filename inside an image property, you can do:
```php
public function store (Request $request)
{
    $filename = "extendedmodelimage.png";
    // ... image upload

    MyModel::createOrUdateWith(new MyModel, $request, ['image' => $filename]);
}
```
