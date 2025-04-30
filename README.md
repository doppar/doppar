<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/doppar/doppar/7138fb0e72cd55256769be6947df3ac48c300700/public/logo.png" width="400">
    </a>
</p>

<p align="center">
<a href="https://github.com/doppar/doppar/actions/workflows/tests.yml"><img src="https://github.com/doppar/doppar/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/doppar/framework"><img src="https://img.shields.io/packagist/dt/doppar/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/doppar/doppar"><img src="https://img.shields.io/packagist/v/doppar/doppar" alt="Latest Stable Version"></a>
<a href="https://github.com/doppar/framework/blob/main/LICENSE"><img src="https://img.shields.io/github/license/doppar/framework" alt="License"></a>
</p>

## About Doppar

Doppar is a PHP framework built to revolutionize the way developers create robust, scalable, and efficient web applications, specifically for developing small, feature-based PHP web applications.
- **Getting started**
  - [Installation](#section-1)
  - [Configuration](#section-2)
  - [Directory structure](#section-3)
  - [Frontend](#section-4)
  - [Starter kits](#section-5)
- **Architecture Concepts**
  - [Request Lifecycle](#section-7)
  - [Service Container](#section-8)
  - [Service Providers](#section-9)
  - [Facades](#section-41)
- **The Basics**
  - [Routing](#section-10)
    - [Route Parameter](#section-11)
    - [Optional Route Parameter](#section-12)
    - [Naming Route](#section-13)
- **Eloquent ORM**
  - [Model](#section-44)
    - [Model Properties](#section-45)
    - [Eloquent ORM Query](#section-46)
      - [Eloquent Relationships](#section-51)
        - [Transform Eloquent Collection](#section-52)
    - [Pagination](#section-47)
    - [Database Transactions](#section-53)
    - [Manual Join](#section-54)
- **Query Builder**
    - [Database Operations with DB Facade](#section-56)
- **Digging Deeper**
  - [Middleware](#section-14)
    - [Route Middleware](#section-15)
    - [Global Web Middleware](#section-16)
    - [Middleware Params](#section-17)
  - [CSRF Protectection](#section-18)
  - [Controllers](#section-19)
  - [Request](#section-20)
  - [Response](#section-21)
  - [Views](#section-22)
  - [Asset Bundling](#section-23)
  - [Session](#section-24)
  - [Cookie](#section-50)
  - [Validation](#section-25)
  - [Error Handling](#section-26)
    - [Error Log and Logging](#section-27)
  - [URL Generation](#section-48)
  - [Pool Console](#section-28)
  - [Encryption & Decryption](#section-30)
  - [Rate Limiter](#rate-limiter)
  - [Caching](#caching)
- **Database**
  - [Database Connection](#section-32)
  - [Migration](#section-33)
  - [Seeder](#section-34)
- **Authentication**
  - [Hashing](#section-35)
  - [Authentication](#section-36)
- **Mail**
  - [Configuration](#section-37)
  - [Sending Mail](#section-38)
    - [Sending Mail with Attachment](#section-39)
    - [Mail Sending with CC and BCC](#section-40)
- **File Uploads**
  - [File Storage](#section-42)
  - [Uploads](#section-43)
- **Helpers**
  - [Helpers](#section-49)
- **Localization**
  - [Localization](#section-55)
- **Package Development**
  - [Package Development](#section-57)
- **API Authentication**
  - [Doppar Flarion](#flarion)

<a name="section-1"></a>

## Installation
Before creating your first Doppar application, make sure that your local machine has PHP, Composer. If you don't have `PHP` and `Composer` installed on your local machine, the following commands will install PHP, Composer on macOS, Windows, or Linux:
#### macOS
```bach
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```
#### Windows PowerShell
```bach
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```
#### Linux
```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

After you have installed PHP, Composer, you're ready to create a new Doppar application.
#### Create an Application
```bash
composer create-project doppar/doppar example-app
```

Now run a command to generate application key that will use to encrypt and decrypt sensitive data.
```bash
php pool key:generate
```

This command will set `APP_KEY` in your `.env` file.

Now you are ready to start development server, run this command:
```bash
php pool start
```

Use `--post` as a params in command to run application in specific post like
```bash
php pool start --port=8081
```

Now your development server is ready.

<a name="section-2"></a>

## Configuration
All of the configuration files for the Doppar framework are located in the `config` directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.
> **⚠️ Warning:** If you create a new config file, Doppar do not know about it, to let it know to Doppar, need to run
> 
> ```bash
> php pool config:clear
> 
> ```
> 
> Proceed on now

If you run system, Doppar cached your newly created config file again. You can cache config file manyally by running this command
```php pool config:cache```

Doppar's config cache file located `storage/framework/cache/config.php` path


### Accessing Configuration Values
You may easily access your configuration values using the Config facade or global config function from anywhere in your application. The configuration values may be accessed using "`dot`" syntax, which includes the name of the file and option you wish to access. A default value may also be specified and will be returned if the configuration option does not exist:
```php
<?php

use Phaseolies\Support\Facades\Config;

$value = Config::get('app.name');

$value = config('app.name');

// Retrieve a default value if the configuration value does not exist...
$value = config('app.name', 'Doppar');
```

### Environment variable
Let's know about every variable
```
APP_NAME="Doppar"
APP_KEY=base64:+cVvutS1oVZxZUZeVGVS4evpiF6M7VaKAjEkiZi7lIM= // App Key that will use to generate encryption and decryption
APP_ENV=local
APP_DEBUG=true  // If false, system will do not show any error message to browser
APP_URL=http://localhost:8000
APP_LOCALE=en

APP_TIMEZOME=UTC
LOG_CHANNEL=stack  // for details see config/log.php
FILESYSTEM_DISK=local  // for details see config/filesystem.php

SESSION_DRIVER=file // for details see config/session.php
SESSION_LIFETIME=120
SESSION_PATH=/
SESSION_DOMAIN=

DB_CONNECTION=mysql // for details see config/database.php
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=doppar
DB_USERNAME=mahedi
DB_PASSWORD=123456

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

#### Accessing Environment Variable
To get the environment varibale data, you can use global `env()` method like
```php
env('APP_KEY', 'default value');
```

<a name="section-3"></a>

## Directory structure
```
└── 📁doppar-framework
    └── 📁app
        └── 📁Http
            └── 📁Controllers // Controllers directory
            └── Kernel.php  // Register Application global and route specific middleware
            └── 📁Middleware // Middleware located here
        └── 📁Models // Application model directory
        └── 📁Mail // Application mail directory
        └── 📁Providers // Application Service Provider
    └── 📁bootstrap // Bootstrap application dependency from here
    └── 📁config // Config files located here
    └── 📁database 
        └── 📁migrations // Database migration files
        └── 📁seeds  // Database seeder files
    └── 📁public // Public directory for assets
    └── 📁resources
        └── 📁views // All the views will be located here
    └── 📁routes // Application routes directory
    └── 📁storage
        └── 📁app
            └── 📁public // Public symlinked to /public/storage directory to storage/app/public directory
        └── 📁cache // All the views cache and config files cache located here
        └── 📁logs // System error log and user defined log will be printed here
        └── 📁sessions // file session driver will be cache here
    └── .env
    └── .env.example
    └── .gitignore
    └── composer.json
    └── composer.lock
    └── config.example
    └── config.php // Database seeder and migration command setup file
    └── pool // Pool command
    └── README.md
```

<a name="section-4"></a>

## Frontend
Doppar uses its own template engine blade. See some avaiable blade syntax.
#### Conditionals and Loops

### @if
Checks if a condition is true.
```blade
@if ($condition)
    // Code to execute if the condition is true
@endif
```
### @elseif
Checks an additional condition if the previous `@if` or `@elseif` condition is false.
#### Syntax:
```blade
@if ($condition1)
    // Code for condition1
@elseif ($condition2)
    // Code for condition2
@endif
```
### @else
Executes code if all previous `@if` and `@elseif` conditions are false.

#### Syntax:
```blade
@if ($condition)
    // Code for condition
@else
    // Code if condition is false
@endif
```
### @unless
Executes code if the condition is false.
#### Syntax:
@unless ($condition)
    // Code to execute if the condition is false
@endunless

### @isset
Checks if a variable is set and not null.

#### Syntax:
```blade
@isset ($variable)
    // Code to execute if the variable is set
@endisset
```

### @unset
Unsets a variable.

#### Syntax:
```blade
@unset ($variable)
```

### @for
Executes a loop for a specified number of iterations.

#### Syntax:
```blade
@for ($i = 0; $i < 10; $i++)
    // Code to execute in each iteration
@endfor
```
### @foreach
Iterates over an array or collection.

#### Syntax:
```blade
@foreach ($items as $item)
    // Code to execute for each item
@endforeach
```

### @forelse
Iterates over an array or collection, with a fallback if the array is empty.

#### Syntax:
```blade
@forelse ($items as $item)
    // Code to execute for each item
@empty
    // Code to execute if the array is empty
@endforelse
```

### @while
Executes a loop while a condition is true.

#### Syntax:
```blade
@while ($condition)
    // Code to execute while the condition is true
@endwhile
```

### @switch
Executes a switch-case block.

#### Syntax:
```blade
@switch ($variable)
    @case ($value1)
        // Code for value1
        @break

    @case ($value2)
        // Code for value2
        @break

    @default
        // Default code
@endswitch
```
### @break
Breaks out of a loop or switch-case block.

#### Syntax:
```blade
@break
```
Example
```blade
@foreach ($users as $user)
    @if ($user->isBanned)
        @break
    @endif
    <p>{{ $user->name }}</p>
@endforeach
```
### @continue
Skips the current iteration of a loop.

#### Syntax:
```blade
@continue
```
Example:
```blade
@foreach ($users as $user)
    @if ($user->isBanned)
        @continue
    @endif
    <p>{{ $user->name }}</p>
@endforeach
```
### @php
Executes raw PHP code.

#### Syntax:
```blade
@php
    // PHP code
@endphp
```

### @json
Encodes data as JSON.

#### Syntax:
```blade
@json ($data)
```
Example
```blade
<script>
    var users = @json($users);
</script>
```

### @csrf
Generates a CSRF token for forms.

#### Syntax:
```blade
@csrf
```
Example
```blade
<form method="POST">
    @csrf
    <button type="submit">Submit</button>
</form>
```
### @exit
Usage
```blade
@foreach ($users as $user)
    @if ($user->isAdmin())
        @exit
    @endif
@endforeach
```
### @empty
Usage
```blade
@empty ($users)
    //  User is empty
@endempty
```
## Section Directives
### @extends
```blade
@extends('layouts.app')
```
Extends a Blade layout.

### @include
```blade
@include('partials.header')
```
Includes another Blade view
### @yield
```blade
@yield('content')
```
Outputs the content of a section.

### @section
Example:
```blade
@section('content')
    <p>This is the content section</p>
@endsection
```
Defines a section to be yielded later

### @stop
```blade
@stop
```
Stops the current section output.

### @overwrite
```blade
@overwrite
```
Overwrites the current section content.

### Authentication Directives

### @auth
Checks if a user is authenticated.

#### Syntax:
```blade
@auth
    // Code to execute if the user is authenticated
@endauth
```
### @guest
Checks if a user is not authenticated (guest).

#### Syntax:
```blade
@guest
    // Code to execute if the user is not authenticated
@endguest
```
### Flash Message Directives
### @errors
Checks if there are any errors messages.

#### Syntax:
```blade
@errors
    // Code to execute if errors messages exist
@enderrors
```
Example
```blade
@errors
    <div class="alert alert-danger">
        <ul>
            @foreach (session()->get('errors') as $field => $messages)
                @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@enderrors
```

### @error
Checks if a specific error message exists in the flash messages.

#### Syntax:
```blade
@error('key')
    // Code to execute if the error message exists
@enderror
```
Example
```blade
@error('email')
    <p class="error">{{ $message }}</p>
@enderror
```

<a name="section-5"></a>

## Starter kits
To give you a head start building your new Doppar application, we are happy to offer application starter kits. These starter kits give you a head start on building your next Doppar application, and include the routes, controllers, and views you need to register and authenticate your application's users.
```html
layout/app.blade.php
<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        @section('style')
          // This for loading ondemand page css
        @show
    </head>
    <body>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
        @section('script')
          // This for loading ondemand page script
        @show
    </body>
</html>
```
Extented content file
```html
@extends('layouts.app')
@section('title') Home Page
@section('style')
 // Load css
@append
@section('content')
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Dashboard</h5>
        </div>
        <div class="card-body">
            <p class="fw-bold fs-5">
                Howdy
            </p>
        </div>
    </div>
@endsection
@section('script')
 // Load script
@append
```

<a name="section-7"></a>

## Request Lifecycle
Understanding how a tool operates makes using it much easier and more intuitive. This principle applies just as much to application development as it does to any other tool in the real world. When you comprehend the inner workings of your development tools, you gain confidence and efficiency in using them.

This document aims to provide a high-level overview of how the Doppar framework functions. By familiarizing yourself with its core concepts, you’ll reduce the sense of mystery surrounding it and feel more empowered when building applications. Don’t worry if some of the terminology seems unfamiliar at first—focus on grasping the big picture. As you continue exploring the documentation, your understanding will naturally deepen over time.
### Lifecycle Overview
#### First Steps
The entry point for all requests to a Doppar application is the `public/index.php` file. All requests are directed to this file by your web server (Apache / Nginx) configuration. The index.php file doesn't contain much code. Rather, it is a starting point for loading the rest of the framework.

The `index.php` file loads the Composer generated autoloader definition, and then retrieves an instance of the Doppar application from `bootstrap/app.php`. The first action taken by Doppar itself is to create an instance of the application service container.

### Second Steps
At this stage, Doppar initializes its core configuration and loads the service providers along with their registered methods. Once the core setup is complete, Doppar proceeds to load and execute the boot methods of the registered service providers, ensuring that all necessary services are properly initialized and ready for use.

### Thirds Steps
At this stage, Doppar generate global middleware stack. The method signature for the middleware's `__invoke()` method is quite simple: it receives a Request and Closer $next and send the Request and Response to the next Request. Feed it HTTP requests and it will return HTTP responses.

### Final Steps
Once the application has been fully bootstrapped and all service providers have been registered, the request is passed to the router for processing. The router is responsible for directing the request to the appropriate route or controller while also executing any route-specific middleware.

Middleware acts as a powerful filtering mechanism for incoming HTTP requests, allowing the application to inspect, modify, or restrict access before reaching the intended destination. For instance, Doppar includes authentication middleware that verifies whether a user is logged in. If the user is not authenticated, they are redirected to the login screen; otherwise, the request proceeds as expected.

After the designated route or controller method processes the request and generates a response, the response begins its journey back through the middleware stack. This allows the application to inspect or modify the outgoing response before it reaches the user.

Finally, as the response completes its trip through the middleware, the __invoke method returns the response object, which then calls the send method. The send method delivers the response content to the user's web browser, marking the completion of Doppar’s request lifecycle.

<a name="section-8"></a>

## Service Container
The Doppar Service Container is a robust and versatile tool designed to streamline dependency management and facilitate dependency injection within application. At its core, dependency injection is a sophisticated concept that simplifies how class dependencies are handled: instead of a class creating or managing its own dependencies, they are "injected" into the class—typically through the constructor or, in certain scenarios, via setter methods. This approach promotes cleaner, more modular, and testable code, making the Doppar framework an ideal choice for modern, scalable web development.

Let's look at a simple example:
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Request;
use App\Service\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(protected User $user) {}

    public function index(UserService $userService, Request $request)
    {
        $userServiceData = $userService->getUser();
        $users = $this->user->all();

        return view('welcome', compact('userServiceData','users'));
    }
}
```

In this example, the UserInterface from controller `index` method and User class from constructor will automatically injected in Doppar's request life cycle and will be automatically instantiated. 

### Create Instance Using Container
Doppar allows you to create object of a class using global `app()` function. If you want to create object that works like a singleton object, you can use the `app()` function
```php
$singletonObject = app(SMSService:class); // this is the object of SMSService class
$singletonObject->sendSms();
```
But if you call just `app()`, it will return the Application instance.

## Binding
### bind()
Binds a service to the container. You can bind a class name or a callable (closure) that returns an instance of the service.
```php
bind(string $abstract, callable|string $concrete, bool $singleton = false): void
```
Parameters:
1. `$abstract:` The service name or interface.
2. `$concrete:` The class name or a callable that returns an instance.
3. `$singleton:` Whether the binding should be a singleton (optional, default: false)

Example
```php
<?php

namespace App\Providers;

use Phaseolies\Providers\ServiceProvider;
use App\Service\ProductInterface;
use App\Service\ProductClass;

class AppServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    // You can choose any of the below declaration
    $this->app->bind(ProductInterface::class, fn() => new ProductClass );

    $this->app->bind(ProductInterface::class, ProductClass::class);
  }

  public function boot(): void
  {
    //
  }
}
```

## Singleton Bindings
### singleton()
Binds a service as a singleton. The container will always return the same instance when resolving the service.
Example
```php
$this->app->singleton(ProductInterface::class,fn() => new ProductClass);
```

## Conditional Bindings
#### when()
Conditionally binds a service based on a condition. If the condition is true, the binding is applied.

#### Syntax:
```php
when(callable|bool $condition): ?self
```
Example
```php
$this->app->when(fn() => rand(0, 1) === 1)?->singleton(ProductInterface::class,fn() => new ProductClass);
```

The Doppar Service Container simplifies dependency management by providing a clean and intuitive API for binding and resolving services. Whether you're working with regular bindings, singletons, or conditional logic, the container ensures your application remains modular, testable, and scalable.

<a name="section-9"></a>

## Service Providers
Service providers are the central place of all Doppar application bootstrapping. Your own application, as well as all of Doppar's core services, are bootstrapped via service providers.

But, what do we mean by "bootstrapped"? In general, we mean registering things, including registering service container bindings, configuration initialization, middleware, and even routes and all the facades. Service providers are the central place to configure your application.

Doppar uses service providers internally to bootstrap its core services, such as the mailer, cache, facades and others.

All user-defined service providers are registered in the `config/app.php` file. In the following documentation, you will learn how to write your own service providers and register them with your Doppar application.

### Creating Service Providers
Doppar provides `make:provider` pool command to create a new service provider.
```bash
php pool make:provider MyOwnServiceProvider
```

### The Register Method
As mentioned previously, within the register method, you should only bind things into the service container. You should never attempt to register other services. Otherwise, you may accidentally use a service that is provided by a service provider which has not loaded yet.

Let's take a look at a basic service provider. Within any of your service provider methods, you always have access to the $app property which provides access to the service container:
```php
<?php

namespace App\Providers;

use Phaseolies\Application;
use Phaseolies\Providers\ServiceProvider;

class MyOwnServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Connection::class, function (Application $app) {
            return new Connection('test');
        });
    }
}
```
### The Boot Method
This `boot` method is called after all other service providers have been registered, meaning you have access to all other services that have been registered by the framework:
```php
<?php

namespace App\Providers;

use Phaseolies\Providers\ServiceProvider;

class MyOwnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register services
    }
}
```
<a name="section-41"></a>

## Facades
Throughout the Doppar documentation, you will see examples of code that interacts with Doppar's features via "facades". Facades provide a "static" interface to classes that are available in the application's service container. Doppar ships with many facades which provide access to almost all of Doppar's features.

Doppar facades serve as "static proxies" to underlying classes in the service container, providing the benefit of a terse, expressive syntax while maintaining more testability and flexibility than traditional static methods. It's perfectly fine if you don't totally understand how facades work - just go with the flow and continue learning about Doppar.

All of Doppar's facades are defined in the `Phaseolies\Support\Facades` namespace. So, we can easily access a facade like so:
```php
use Phaseolies\Support\Facades\Config;
use Phaseolies\Support\Facades\Route;

Route::get('/config', function () {
    return Config::get('key');
});
```
Throughout the Doppar documentation, many of the examples will use facades to demonstrate various features of the framework.

To complement facades, Doppar offers a variety of global "helper functions" that make it even easier to interact with common Doppar features. Some of the common helper functions you may interact with are view, response, url, config, and more. Each helper function offered by Doppar.

For example, instead of using the `Phaseolies\Support\Facades\Response` facade to generate a JSON response, we may simply use the response function. Because helper functions are globally available, you do not need to import any classes in order to use them:
```php
use Phaseolies\Support\Facades\Response;

Route::get('/users', function () {
    return Response::json([
        // ...
    ]);
});

Route::get('/users', function () {
    return response()->json([
        // ...
    ]);
});
```

### When to Utilize Facades
Facades have many benefits. They provide a terse, memorable syntax that allows you to use Doppar's features without remembering long class names that must be injected or configured manually. Furthermore, because of their unique usage of PHP's dynamic methods, they are easy to test.

### Facades vs. Helper Functions
In addition to facades, Doppar includes a variety of "helper" functions which can perform common tasks like generating views, firing events, dispatching jobs, or sending HTTP responses. Many of these helper functions perform the same function as a corresponding facade. For example, this facade call and helper call are equivalent:
```php
return Phaseolies\Support\Facades\Response::view('profile');

return view('profile');
```
### How Facades Work
In a Doppar application, a facade is a class that provides access to an object from the container. The machinery that makes this work is in the Facade class. Doppar's facades, and any custom facades you create, will extend the base `Phaseolies\Support\Facades\BaseFacade` class.

The Facade base class makes use of the __callStatic() magic-method to defer calls from your facade to an object resolved from the container. In the example below, a call is made to the Doppar cache system. By glancing at this code, one might assume that the static get method is being called on the Cache class:
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Phaseolies\Support\Facades\Config;

class UserController extends Controller
{
    public function getAppName()
    {
        return Config::get('app.name');
    }
}
```
If we look at that `Phaseolies\Support\Facades\Config` class, you'll see that there is no static method get:
```php
<?php

namespace Phaseolies\Support\Facades;

use Phaseolies\Facade\BaseFacade;

class Config extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}
```

### Facade Class Reference
Below you will find every facade and its underlying class. This is a useful tool for quickly digging into the API documentation for a given facade root. The service container binding key is also included where applicable.
| Facade   | Class   |  Container Binding |
| -------- | ------- | -------- |
| Auth  | Phaseolies\Auth\Security\Auth    | auth |
| Abort  | Phaseolies\Http\Support\Abort   | abort |
| Config  | Phaseolies\Config\Config    | config |
| Crypt  | Phaseolies\Support\Encryption    | crypt |
| Hash  | Phaseolies\Auth\Security\Hash    | hash |
| Mail  | Phaseolies\Support\Mail\MailService    | mail |
| Redirect  | Phaseolies\Http\RedirectResponse    | redirect |
| Response  | Phaseolies\Http\Response    | response |
| Route  | Phaseolies\Support\Router    | route |
| Session  | Phaseolies\Support\Session    | session |
| URL  | Phaseolies\Support\UrlGenerator    | url |
| Storage  | Phaseolies\Support\Storage\StorageFileService    | storage |
| Log  | Phaseolies\Support\LoggerService    | log |
| Sanitize | Phaseolies\Support\Validation\Sanitizer    | sanitize |
| Cookie | Phaseolies\Support\CookieJar   | cookie |

<a name="section-10"></a>

## Routing
Doppar provides a comprehensive and flexible routing system that allows you to define how your application responds to various HTTP requests. All routes are initialized from the routes/web.php file, making it easy to manage and organize your application's endpoints.

### Supported HTTP Methods
Doppar supports the following HTTP methods for defining routes:

* `GET`: Used to retrieve data from the server.
* `POST`: Used to submit data to the server.
* `PUT`: Used to update existing data on the server.
* `PATCH`: Used to partially update existing data on the server.
* `DELETE`: Used to delete data on the server.
* `HEAD`: Similar to GET, but retrieves only the headers without the body.
* `OPTIONS`: Used to describe the communication options for the target resource.
* `ANY`: Matches any HTTP method for the specified route.

```php

<?php

use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'dashboard']);
Route::get('/about', [PageController::class, 'about']);
```

### Available Router Methods
The router allows you to register routes that respond to any HTTP verb:
```php
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
Route::any($uri, $callback);
Route::head($uri, $callback);
```

<a name="section-11"></a>

## Route Parameter
You can pass single or multiple parameter with route as like below
```php
<?php

use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/user/{id}', [ProfileController::class, 'index']);
```
Now accept this param in your controller like:
```php
<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index(int $id)
    {
        return $id;
    }
}
```
### Multiple Route Parameters
You can pass multiple parameter with route as like below
```php
<?php

use App\Http\Controllers\ProfileController;

Route::get('/user/{id}/{username}', [ProfileController::class, 'index']);
```
Now accept this multiple param in your controller like:
```php
<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index(int $id, string $username)
    {
        return $id;

        return $username;
    }
}
```

<a name="section-12"></a>

## Optional Route Parameter
Doppar accept optional parameter and for this, you have nothing to do.
> **⚠️ Warning:** By default, the Doppar controller callback takes parameters as optional. So, if you pass parameters in your route but do not accept them in the controller, it will not throw an error.
>
Example
```php
Route::get('/user/{id}/{username}', [ProfileController::class, 'index']);
```
if you visit `http://localhost:8000/user/1/mahedi-hasan`

```php
<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        return "welcome"; // Still works and you will get the response
    }
}
```

<a name="section-13"></a>

## Naming Route

Doppar support convenient naming route structure. To create a naming route, you can do

```php

use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user/{id}/{name}', [UserController::class, 'profile'])->name('profile');
```
Now use this naming route any where using route() global method.
```php
 <form action="{{ route('profile', ['id' => 2, 'name' => 'mahedy']) }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```
If there is single param in your route, just use
```php
Route::get('/user/{id}', [UserController::class, 'profile'])->name('profile');
```
Now call the route
```php
{{ route('profile', 2) }}
```

### Define PUT, PATCH, DELETE Request Route
If you want to define route as a PUT, PATCH or DELETE, need to follow some rules. Assume, we are going to send a PUT request to the server, then you have to use @method('PUT') blade directive inside your HTML form.
```html
<form method="POST">
    @csrf
    @method('PUT')    // For PUT Request
    @method('PATCH')  // For PATCH Request
    @method('DELETE') // For DELETE Request
    <button type="submit">Submit</button>
</form>
```

Now you are ready to define `PUT` route in `web.php` file
```php
Route::put('/update-profile', [ProfileController::class, 'updateProfile']);

// For DELETE and PATCH
Route::delete('/user/{id}', [ProfileController::class, 'delete']);
Route::patch('/update-profile', [ProfileController::class, 'updateProfile']);
```

### Route Group
`Route::group` is used to group multiple routes under a shared configuration like middleware, URL prefix, namespace, etc. This helps in organizing routes cleanly and applying common logic to them.

#### Syntax
```php
Route::group([
    'prefix' => 'your-prefix',
    'middleware' => ['middleware-name']
], function () {
    // Routes go here
});
```

#### Example
Look at the below example, we are using `prefix` and `middleware` as a group route. You can use either `prefix` or `middleware` or both. See the example
```php
Route::group([
    'prefix' => 'login',
    'middleware' => ['guest']
], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login'); // url will be example.com/login
    Route::post('/', [LoginController::class, 'login']); // url will be example.com/login
});
```
`'prefix' => 'login'` This means all routes inside this group will be prefixed with `/login` and `'middleware' => ['guest']` Applies the guest` middleware to both routes.

### Route Caching
Doppar supports route caching for improved performance in production environments. Route caching is controlled by the `APP_ROUTE_CACHE` environment variable: Set to `true` to enable route caching (recommended for production). Set to `false` to disable (default for development) Route cache files are stored in: `storage/framework/cache/`
#### Cache Routes
Generate a route cache file for faster route registration:
```bash
php pool route:cache // Note: This should be run after any route modifications.
```
#### Clear Route Cache
```bash
php pool route:clear // Use this when making route changes in production or if experiencing route-related issues.
```

<a name="section-44"></a>
## Eloquent ORM
### Introduction
Doppar features its own powerful data interaction tool, Eloquent, an object-relational mapper (ORM), which simplifies and enhances the way you work with your database. With ORM, every database table is linked to a dedicated "Data Model" that serves as your gateway to managing table data seamlessly. Beyond just fetching records, Doppar Data Mapper empowers you to effortlessly insert, update, and delete records, making database interactions intuitive and efficient. Whether you're building complex queries or handling simple data operations, ORM ensures a smooth and enjoyable experience, tailored to streamline your development workflow.

### Creating Model Classes
To get started, let's create an Eloquent model. Models typically live in the app\Models directory and extend the `Phaseolies\Database\Eloquent\Model` class. You may use the `make:model` Pool command to generate a new model:
```php
php pool make:model Invoice
```
This command will generate a new model inside App\Models directory. Models generated by the make:model command will be placed in the app/Models directory. Let's see a basic model class.
```php
<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class Invoice extends Model
{
    //
}
```

<a name="section-45"></a>
## Model Properties
Before diving into Doppar's data management capabilities, it’s important to familiarize yourself with some key model properties that shape how your data is handled. Doppar offers the flexibility to customize these properties to suit your specific needs. Key properties include `$pageSize`, which controls the number of records displayed per page; `$primaryKey`, which defines the unique identifier for your table; `$table`, which specifies the database table associated with the model; `$creatable`, which determines whether new records can be added; and `$unexposable`, which allows you to hide sensitive or irrelevant data from being exposed. With Doppar, you have full control to tweak these properties, ensuring your data interactions are both efficient and secure. Let's see the `User` model as for example.

```php
<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Page Size
     *
     * Defines the number of records to be displayed per page when paginating results.
     * This property is useful for controlling the size of data chunks returned by queries.
     *
     * @var int
     */
    protected $pageSize = 10;

    /**
     * Primary Key
     *
     * Specifies the column name that serves as the unique identifier for the table.
     * By default, this is set to 'id', but it can be customized if your table uses a different primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Table Name
     *
     * Specifies the database table associated with this model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Creatable Attributes
     *
     * Specifies which attributes can be mass-assigned when creating or updating records.
     * This helps prevent mass assignment vulnerabilities by explicitly defining safe fields.
     * Only the attributes listed here can be set in bulk operations.
     *
     * @var array
     */
    protected $creatable = ['name', 'username', 'email', 'password'];

    /**
     * Unexposable Attributes
     *
     * Specifies which attributes should be hidden when the model is converted to an array or JSON.
     * This is particularly useful for hiding sensitive information, such as passwords,
     * from being exposed in API responses or other outputs.
     *
     * @var array
     */
    protected $unexposable = ['password'];

    /**
     * Indicates whether the model should maintain timestamps (`created_at` and `updated_at` fields.).
     *
     * @var bool
     */
    protected $timeStamps = true;
}

```

<a name="section-46"></a>
## Query Using ORM
### Retrieving Models
Once you have created a model and its associated database table, you are ready to start retrieving data from your database. You can think of each Eloquent model as a powerful query builder allowing you to fluently query the database table associated with the model. The model's `all` method will retrieve all of the records from the model's associated database table:
```php
use App\Models\Invoice;

foreach (Invoice::all() as $invoice) {
    echo $invoice->invoice_id;
}

// You can also use Invoice::get() to get all the records
```

### Building Queries
The Eloquent all method will return all of the results in the model's table. However, since each Eloquent model serves as a query builder, you may add additional constraints to queries and then invoke the get method to retrieve the results:

```php
$flights = Invoice::query()
    ->where('active', '=', 1)
    ->orderBy('name')
    ->limit(10)
    ->get();
```

### Multiple Where Condition
You can write query with multiple where condition by chaining multiple where with the queries
```php
User::query()
    ->where('name', '=', 'Sincere Littel')
    ->where('username', '=', 'doppar')
    ->first();
```

You can also add `orWhere()` as like below
```php
User::query()
    ->where('name', '=', 'Sincere Littel')
    ->orWhere('username', '=', 'test')
    ->get();
```

### Fetch the First Records
To fetch the first records you can use `first` function as like below
```php
User::query()->first();
```

### GroupBy and OrderBy
You can also use `groupBy()` and `orderBy()` to handle your records like
```php
User::query()->orderBy('id', 'desc')->groupBy('name')->get();
```

### toSql()
You can get the sql query to see which query is running to fetch the records like
```php
User::query()->orderBy('id', 'desc')->groupBy('name')->toSql();
```

### Count The Result
To see how many records your table has, you can use `count` function as like
```php
User::count();
// or
User::query()->orderBy('id', 'desc')->groupBy('name')->count();
// or you can pass the column name which you need to count
User::query()->where('active', '=', true)->count('id');
```

### Newest and Oldest Records
To fetch the oldest and newest records, Doppar provides two function `newest` and `oldest`. 
```php
User::query()->newest()->get();

// You can explicitly define which field should be used to retrieve the latest records. By default, it uses the 'id' field.
User::query()->newest('name')->get()

User::query()->oldest()->get()

// You can explicitly define which field should be used to retrieve the latest records. By default, it uses the 'id' field.
User::query()->oldest('id')->get()
```

### select()
You may need to fetch only some specific columns not all the columns from a model. you can use select() method in this case like
```php
User::query()->select(['name','email'])->get();
```

### find() and exists()
If you need to retrieve data for a specific primary key, you can use the `find()` function. This method allows you to quickly fetch a single record by its unique identifier, making it a convenient and efficient way to access individual entries in your database.
```php
User::find(1)
```

To check whether a specific row exists in your database, you can use the `exists()` function. This method returns a boolean value (`true` or `false`) based on whether the specified condition matches any records. Here's an example:
```php
User::query()->where('id', '=', 1)->exists(); // Returns `true` if a matching row exists, otherwise `false`.
```

### Create Data
To create data, Doppar uses the `create` method. It retrieves the attributes defined in your model's `$creatable` property and inserts them into the database. For example:

```php
use App\Models\User;

User::create([
    'name' => 'Doppar'
]);
```

Or you also create data using object
```php
$user = new User;
$user->name = $request->name;
$user->Save();
```

### saveMany()
You may need to insert bacth insert in your model, in this case, you can use `saveMany()` method as like below
```php
User::saveMany([
    ['name' => 'John', 'email' => 'john@example.com', 'password' => bcrypt('password')],
    ['name' => 'Jane', 'email' => 'jane@example.com', 'password' => bcrypt('password')],
    ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => bcrypt('password')]
]);
```

If your dataset is large, you can optionally pass the chunk size as the second parameter like
```php
User::saveMany([
    ['name' => 'John', 'email' => 'john@example.com', 'password' => bcrypt('password')],
    ['name' => 'Jane', 'email' => 'jane@example.com', 'password' => bcrypt('password')],
    ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => bcrypt('password')]
], 100);
```

### Update Data
To update data, you can use `fill` function like
```php
$user = User::find(1);
$user->fill(['name' => 'Updated Name']);
$user->save();
```

Or you can use `update` function like
```php

User::query()
    ->where('id', '=', 1)
    ->update([
        'email' =>  'hi@doppar.com'
    ]);
```

### updateOrCreate()
The updateOrCreate() method is used to either update an existing record or create a new one if no matching record is found. It simplifies handling scenarios where you need to ensure a record exists with specific attributes while updating other fields.
```php
$user = User::updateOrCreate(
    ['email' => 'hi@doppar.com'], // attributes to match
    ['name' => 'Test User'] // values to update/create
);
```

### Delete Data
To delete data, doppar provides `delete` method
```php
User::find(1)->delete();
```

### whereIn()
The `whereIn()` method filters records where a column's value matches any value in the given array.
```php
return User::query()->whereIn('id', [1, 2, 4])->get();
```
This retrieves all users with id values of 1, 2, or 4.

### orWhereIn()
The `orWhereIn()` method filters records where a column's value optionally matches any value in the given array.
```php
return User::query()->orWhereIn('id', [1, 2, 4])->get();
```

### whereBetween()
The `whereBetween()` method allows you to filter records where a given column's value falls within a specified range. This is commonly used for date or numerical ranges.
```php
 return User::query()
    ->whereBetween('created_at', ['2025-02-29', '2025-04-29'])
    ->get();
```

### whereNotBetween()
The `whereNotBetween()` method allows you to filter records where a given column's value do not falls within a specified range. This is commonly used for date or numerical ranges.
```php
 return User::query()
    ->whereNotBetween('created_at', ['2025-02-29', '2025-04-29'])
    ->get();
```

### orWhereBetween()
You can use `orWhereBetween()` methods together to create complex conditional queries. This allows for more flexible filtering, including combining conditions with OR for specific ranges.
```php
return Post::query()
    ->where('status', ,'=', 'published') // Filter posts that are published
    ->orWhereBetween('views', [100, 500]) // Or filter posts where views are between 100 and 500
    ->get();
```

### orWhereNotBetween()
You can use `orWhereNotBetween()` methods together to create complex conditional queries. This allows for more flexible filtering, including combining conditions with OR for specific ranges.
```php
return Post::query()
    ->where('status', ,'=', 'published')
    ->orWhereNotBetween('views', [100, 500])
    ->get();
```

With request input example
```php
Post::query()
    ->if($request->has('date_range'), function($query) use ($request) {
        $query->whereBetween('created_at', [
            $request->input('date_range.start'),
            $request->input('date_range.end')
        ]);
    })
    ->get();
```

### whereNull()
The `whereNull()` method in Eloquent is used to filter records where a specific column contains a NULL value. In your example:
```php
return Post::query()
    ->whereNull('created_at')
    ->get();
```

### whereNotNull()
The `whereNotNull()` method in Eloquent is used to filter records where a specific column contains a value. In your example:
```php
Post::query()
    ->whereNotNull('published_at')
    ->get();
```

### orWhereNull()
The `orWhereNull()` method in Eloquent is used to add an OR condition to the query, checking if a column is NULL. In your example:
```php
Post::query()
    ->where('status', '=', 'draft')
    ->orWhereNull('reviewed_at') // you can also use orWhereNotNull()
    ->get();
```

### orWhereNotNull()
The `orWhereNotNull()` method in Eloquent is used to add an OR condition to the query, checking if a column is not NULL. In your example:
```php
Post::query()
    ->where('status', '=', 'draft')
    ->orWhereNotNull('reviewed_at')
    ->get();
```

### match()
The `match()` method in Eloquent is commonly used to filter your query result. It's typically implemented to provide a more flexible and reusable way to filter results based on various conditions.
```php
return Post::match([
        'id' => 1,
        'user_id' => 1
    ])->get();
```

Complex filtering with callbacks
```php
return Post::match(function ($query) {
        $query->where('views', '>', 100)
            ->whereBetween('created_at', ['2023-01-01', '2023-12-31']);
    })->get();
```

Request data filter, this will fetch data as per requested `title` and `user_id`
```php
Post::match($request->only(['title', 'user_id']))
    ->paginate();
```

Combine simple and complex filters
```php
Post::match([
        'user_id' => [1, 2, 3], // WHERE IN
        'created_at' => null,      // WHERE NULL
        'active' => function ($query) {
            $query->where('active', '=', 1)
                ->orWhere('legacy', '=', 1);
        }
    ])->orderBy('created_at', 'desc')
    ->get();
```

### pluck()
The `pluck()` method is used to retrieve the values of a single column from the result set. It returns an array or collection of the specified column's values, making it useful for quickly getting a list of specific data
```php
return Post::query()->pluck('title');
```

### useRaw() for Custom Queries with Parameter Bindings
The useRaw() method allows you to run raw SQL queries with parameter bindings, which helps prevent SQL injection by safely binding parameters to the query.
```php
return User::query()->useRaw(
    'SELECT * FROM user WHERE created_at > ? AND status = ?',
    ['2023-01-01', 'active']
);
```
is runs a custom SQL query that retrieves users created after January 1, 2023, and with an active status. The values 2023-01-01 and active are securely bound to the query to prevent SQL injection.

<a name="section-51"></a>
### Introduction
Database tables are often interconnected, representing real-world relationships between data. For instance, a blog post can have multiple comments, or an order may be linked to the user who placed it. Eloquent simplifies handling these relationships, providing built-in support for various types. Doppar supports three eloquent relationships.

- One-to-One
- One-to-Many
- Many-to-Many

### Defining Relationships (One-to-One)
Eloquent allows you to define relationships as methods within your model classes, enabling seamless method chaining and advanced query capabilities. This makes it easy to interact with related models while maintaining clean and efficient code.

For instance, let's assume each `Article` has a single associated `User` (author). We can define this one-to-one relationship in the `Article` model as follows:
```php
<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function user()
    {
         return $this->oneToOne(
            User::class,    // Related model class
            'id',           // Foreign key on related table (users.id)
            'user_id'       // Local key on this table (articles.user_id)
        );
    }
}
```
## Key Parameters for Defining Relationships

When defining relationships in your Eloquent models, you'll typically use these key parameters:

* **Related Model:**
    * This specifies the class name of the model you're establishing a relationship with.
    * Example: `User::class`
* **Foreign Key:**
    * This refers to the column in the *related* table that stores the foreign key, which references the primary key of the current model.
    * It is the column that makes the connection between the 2 tables.
* **Local Key:**
    * This is the column in the *current* model's table that is being referenced by the foreign key in the related table.
    * Usually this is the primary key of the current table.

Once defined, you can access the relationship in several ways:

#### As a Property (Lazy Loading)
```php
$article = Article::find(1);
$author = $article->user; // Automatically loads the related user
```

Fetching all the articles of user id 1
```php
return User::find(1)
    ->articles() // fetching all the articles of user id 1
    ->get();
```

Or you can fetch above data as follows also
```php
return User::find(1)->articles;
```

#### As a Method (Query Builder)
```php
$article = Article::find(1);
$activeAuthor = $article->user()
    ->where('status', '=', 1)
    ->first();
```

#### With Eager Loading
```php
// Load articles with their authors in a single query
$articles = Article::query()->embed('user')->get();

foreach ($articles as $article) {
    echo $article->user->name; // No additional query executed
}
```
#### embed() with sub query
This will return articles with user data where the user status is 1. If the user status is 0, it will return null for the user but still load the articles.
```php
return Article::query()->embed(['user' => function ($query) {
            $query->where('status', '=', 1);
        }])->get();
```

### Defining Relationships (One-to-Many)
For instance, let's assume each `User` has its associated `articles`. We can define this one-to-many relationship in the `User` model as follows:
```php
<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function articles()
    {
         return $this->oneToMany(
            Article::class, // Related model class
            'user_id', // Foreign key on related table (articles.user_id)
            'id'       // Local key on this table (users.id)
        );
    }
}
```

Now you can fetch all the users with their associated articles.
```php
return User::query()->embed('articles')->get();
```

### Defining Relationships (Many-to-Many)
Doppar ORM supports many-to-many relationships through an intermediate pivot table. Here's how to implement and work with them. Assume we have a `Post` model and a `Tag` model, where a many-to-many relationship exists between them. This means one post can have multiple tags, and one tag can be associated with multiple posts.
```php
// App\Models\Post.php
public function tags()
{
    return $this->manyToMany(
        Tag::class,  // Related model
        'post_id',   // Foreign key for posts in pivot table (post_tag.post_id)
        'tag_id',    // Foreign key for tags in pivot table (post_tag.tag_id)
        'post_tag'   // Pivot table name
    );
}
```
And the Tag model will be look like this
```php
// App\Models\Tag.php
public function tags()
{
    public function posts()
    {
        return $this->manyToMany(
            Post::class,  // Related model
            'tag_id',   // Foreign key for tags in pivot table
            'post_id',  // Foreign key for posts in pivot table
            'post_tag'  // Pivot table name
        );
    }
}
```
In a many-to-many relationship between `Post` and `Tag`, the `post_tag` pivot table acts as a bridge, storing the associations between `posts` and `tags`. It contains two columns:

- `post_id` – References the id of a post.
- `tag_id` – References the id of a tag.

Each row in this table represents a link between a specific post and a specific tag, allowing multiple posts to have multiple tags and vice versa.

#### Retrieving Related Models From Many To Many Relationship
We can fetch data from many to many relationship using eager loading like that
```php
return Post::query()->embed('tags')->get();
```

You can fetch Tag with posts as well
```php
return Tag::query()->embed('posts')->get();
```

### Many To Many Relationship with Lazy loading
In Doppar, when dealing with a many-to-many relationship, lazy loading allows you to retrieve related records only when they are accessed. For instance, if a Post model has a many-to-many relationship with a Tag model, you can fetch all the tags of a specific post using the following query:
```php
$post = Post::find(1);
return $post->tags;

// or simply you can call like that
return $post = Post::find(1)->tags;
```

For instance, if a Tag model has a many-to-many relationship with a Post model, you can fetch all the posts of a specific tag using the following query:
```php
$tag = Tag::find(1);
return $tag->posts;

// Get the posts related to a specific tag
foreach ($tag->posts as $post) {
    echo $post->title;
}
```

### link() with manyToMany
In Doppar, the `link()` method is used to associate records in a many-to-many relationship. This method adds entries to the pivot table, establishing a connection between related models
```php
// Link tags to a post
$post = Post::find(1);
$post->tags()->link([1, 2, 3]); // Link tags with IDs 1, 2, and 3
```

### unlink() with manyToMany
In Doppar, the `unlink()` method is used to unlink specific records from a many-to-many relationship. It removes the association between the current model (e.g., Post) and the related model (e.g., Tag) by removing the corresponding entries from the pivot table.
```php
$post = Post::find(1);
$post->tags()->unlink([1, 2, 3]); // Unlink tags with IDs 1, 2, and 3
```

If you simply call `unlink()`, it will delete all the tags
```php
$post = Post::find(1);
$post->tags()->unlink(); // unlink all tags
```

### relate() with manyToMany
In Doppar, the `relate()` method is used to sync the relationships between models in a many-to-many relationship. The `relate()` method will attach the provided IDs and can optionally detach existing relationships, depending on the second argument passed.
```php
$post = Post::find(1);
$post->tags()->relate([1, 2, 3]);
$changes = $post->tags()->relate([1, 2, 4]); // 3 will be removed
$post->tags()->relate([1, 2, 3], false); // link tithout unlinking
```

### Syncing with Pivot Data Using 
In Doppar, the `relate()` method not only allows you to sync records in a many-to-many relationship, but also provides the ability to attach additional data to the pivot table. This is useful when you need to store extra attributes (such as timestamps or other metadata) along with the relationship between two models.
```php
$post = Post::find(1);
$post->tags()->relate([
    1 => ['created_at' => now()],
    2 => ['featured' => true],
    3 => ['meta' => ['color' => 'blue']]
]);
```

### Nested Relationship
To efficiently retrieve all posts along with their associated comments, replies, and the users who made those replies, use the following query:
```php
return Post::query()->embed('comments.reply.user')->get();
```
#### Breakdown:
- comments → Fetches all comments related to the post.
- reply → Fetches replies associated with each comment.
- user → Fetches the user who authored each reply.

By using eager loading (embed), this query minimizes database queries and optimizes performance, ensuring efficient data retrieval.


### Specific Column Selection
The embed() method in Doppar ORM allows you to eager load related models and even specify which columns to load for each relationship. This helps optimize queries by only selecting the necessary data.
```php
User::query()
    ->embed([
        'comments.reply', // Load all columns of the related comments
        'posts' => function ($query) {
            $query->select(['id', 'title', 'user_id']); // Only load specific columns for posts
        }
    ])
    ->get();
```

#### Fetching Multiple Relationships
This query retrieves `users` along with their related `articles` and `address` using the embed method. By embedding multiple relationships, it ensures that all necessary data is fetched in a single query, improving efficiency and reducing additional database calls.
```php
return User::query()
        ->embed(['articles','address'])
        ->get();
```

### Using `present()` for Handling Present Relationships
In Doppar ORM, the `present()` method can be used to load relationships that are present (i.e., do not exist) in the model, or when you want to ensure related data is included, even if it is not empty.
```php
return Post::query() // Fetch only those posts which have comments
    ->present('comments') // Load the 'comments' relationship
    ->get();
```
This method is useful when you want to include relationships and need to fetch only those data that has relational data.

#### Passing callback with present()
The `present()` method can be used to load a relationship with custom query conditions. You can define specific conditions inside the closure passed to `present()` to filter the related data.
```php
return Post::query()
    ->present('comments', function ($query) {
        $query->where('comment', '=', 'Mrs.') // Filter comments with the text 'Mrs.'
              ->where('created_at', '=', NULL); // Only fetch comments with no creation date
    })
    ->get();
```

### absent() to Fetch Records with Missing Relationships
The `absent()` method is used to fetch records where a particular relationship does not exist. This is useful when you want to retrieve records that are missing related data.
```php
return User::query() // Fetch only those users who have no posts
    ->absent('posts') // Filter users with no related posts
    ->get();
```

### if() for Conditional Query Execution in Doppar ORM
Doppar ORM's `if()` method allows you to conditionally add query constraints based on a given condition. If the condition evaluates to true, the corresponding query modification is applied; otherwise, it is skipped.
```php
Post::query()
    ->if($request->input('search'),
        fn($q) => $q->where('title', 'LIKE', "%{$request->search}%"),
        fn($q) => $q->where('is_featured', '=', true) // default if no search is applied, and it is optional
    )
    ->get();
```
#### Explanation:
- First condition `($request->input('search'))`: If the search parameter is provided, the query will filter posts by the title using the LIKE operator.
- Default case: If no search parameter is provided, it will filter posts where is_featured is true.

### How `if()` Works with Different Conditions
Will execute when the condition is truthy:
```php
Post::query()
    ->if(true, fn($q) => $q->where('active', '=', true)) // Executes because true
    ->if('text', fn($q) => $q->where('title', '=', 'text')) // Executes because 'text' is truthy
    ->if(1, fn($q) => $q->where('views', '=', 1)) // Executes because 1 is truthy
    ->if([1], fn($q) => $q->whereIn('id', '=', [1])) // Executes because [1] is truthy
    ->get();
```

Will NOT execute when the condition is falsy:
```php
Post::query()
    ->if(false, fn($q) => $q->where('active', '=', false)) // Does not execute because false
    ->if(0, fn($q) => $q->where('views', '=', 0)) // Does not execute because 0 is falsy
    ->if('', fn($q) => $q->where('title', '=', '')) // Does not execute because empty string is falsy
    ->if(null, fn($q) => $q->where('deleted_at', '=', null)) // Does not execute because null is falsy
    ->if([], fn($q) => $q->whereIn('id', '=',  [])) // Does not execute because empty array is falsy
    ->get();
```
This makes the if() method powerful for dynamically building queries based on various conditions. It allows for more concise and flexible query building without having to manually check each condition before applying the relevant query changes.

### present() with if()
You can chain the `present()` method with `if()` to conditionally load a relationship with specific query constraints, based on dynamic conditions. This allows for more flexible and powerful query building.
```php
return Post::query()
    ->present('comments', function ($query) {
        $query->where('comment', '=', 'Mrs.') // Filter comments with 'Mrs.'
            ->where('created_at', '=', NULL); // Only include comments with no creation date
    })
    ->if($request->title, function ($query) use ($request) {
        $query->where('title', '=', $request->title); // Apply title filter if provided in the request
    })
    ->get();
```

### ifExists() check relationship existance
The `ifExists()` method in Doppar is used as a conditional check to determine whether a related model (e.g., posts) exists in the database for a given parent model (e.g., users). This method is useful for filtering results based on the existence of related data without requiring explicit joins or additional queries.
```php
// Find users who have at least one post
return User::query()->ifExists('posts')->get();
```
With conditions - find users who have at least one published post
```php
 return User::query()
    ->ifExists('posts', function ($query) {
        $query->where('status', '=', 'published');
    })
    ->get();
```

### ifNotExists() check relationship non-existance
In the Doppar framework, the `ifNotExists()` method works similarly to the `ifExists()` method but with the inverse logic. Instead of filtering users who have at least one post, it retrieves users who don't have any related posts. This can be useful when you want to find records without any associated data.
```php
// Find users who don't have any posts
return User::query()->ifNotExists('posts')->get();
```

### Aggregation Queries using ORM
Doppar ORM provides powerful aggregation functions to perform statistical calculations efficiently. Below are various examples of aggregation queries you can use in your application.
#### Total Sum of a Column
Calculate the total sum of a column (e.g., summing up all views values):
```php
Post::query()->sum('views');
```

#### Average Value of a Column
Compute the average value of a column (e.g., the average views):
```php
return Post::query()->avg('views');
```

#### Maximum Value in a Column
Find the highest price in the Product table:
```php
Product::query()->max('price');
```

#### Minimum Value in a Column
Find the lowest `price` in the Product table:
```php
Product::query()->max('price');
```

#### Standard Deviation Calculation
Compute the standard deviation of `price`:
```php
return Product::query()->stdDev('price');
```
#### Variance Calculation
Find the variance of `price`:
```php
return Product::query()->variance('price');
```

#### Multiple Aggregation in One Query
Retrieve multiple statistics (`count`, `average`, `min`, `max`) in a single query:
```php
Product::query()
    ->select([
        'COUNT(*) as count',
        'AVG(price) as avg_price',
        'MIN(price) as min_price',
        'MAX(price) as max_price'
    ])
    ->groupBy('variants')
    ->first();
```

#### Fetching Distinct Rows
You can also fetch `distinct` rows from your table by chanining the `distinct()` function as like below. This will fetch unique values from `post` table of `user_id` column
```php
Post::query()->distinct('user_id');
```

#### Calculating Sum
Sum up sales where title is "maiores":
```php
Product::query()
    ->where('title', '=', 'maiores')
    ->sum('price');
```

#### Total Sales by Category
Calculate total sales per category by grouping results:
```php
return Product::query()
    ->select(['category_id', 'SUM(price * quantity) as total_sales'])
    ->groupBy('category_id')
    ->get();
```

### increment()
Sometimes, we need to `increment` a specific column. In this case, you can use `increment` as shown below. The example below will `increment` the post by 1.
```php
$post = Post::find(1);
$post->increment('views'); // default increment by 1
$post->increment('views',10); // increment by 10
```
Increment a post's views count by 1 while updating the timestamp and modifier:
```php
$post->increment('views', 1, [
    'updated_at' => date('Y-m-d H:i:s'),
    'modified_by' => Auth::id()
]);
```

### decrement()
Sometimes, we need to `decrement` a specific column. In this case, you can use `decrement` as shown below. The example below will `decrement` the post by 1.
```php
$post = Post::find(1);
$post->decrement('views'); // default decrement by 1
$post->decrement('views',10); // decrement by 10
```
Increment a post's views count by 1 while updating the timestamp and modifier:
```php
$post->decrement('views', 1, [
    'updated_at' => date('Y-m-d H:i:s'),
    'modified_by' => Auth::id()
]);
```

<a name="section-52"></a>
## Transform Eloquent Collection

You can transform a fetched Eloquent collection using the `map` function. This allows you to modify or format the data before returning it.

Here’s an example of how to extract and return only the name attribute from each user:
```php
return User::all()->map(function ($item) {
    return [
        'name' => $item->name
    ];
});
```
This approach is useful when you need to customize the response structure while working with Eloquent collections.

<a name="section-47"></a>

## Pagination
Pagination is a powerful feature that allows you to retrieve and display large datasets in smaller, manageable chunks. In Doppar, you can easily paginate your query results using the `paginate()` method. This method automatically handles the logic for splitting data into pages, making it ideal for scenarios like displaying user lists, logs, or any other dataset that requires.

### Example:
To paginate a list of users sorted by their id in descending order, you can use the following query:
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class AppTestController extends Controller
{
    public function index()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate();

        return view('user', [
            'data' => $users
        ]);
    }
}
```
### Display Pagination in Views
When working with paginated data in your views, Doppar provides two convenient methods to render pagination links. These methods allow you to display navigation controls for moving between pages, ensuring a smooth user experience.
#### Available Methods:
 * `linkWithJumps()` method generates pagination links with additional "jump" options, such as `dropdown with paging`. It is ideal for datasets with a large number of pages, as it allows users to quickly navigate to the beginning or end of the paginated results.
 * `links()` This method generates standard pagination links, including "Previous" and "Next" buttons, along with page numbers. It is suitable for most use cases and provides a clean and simple navigation interface.

Now call the pagination for views
```html
@foreach ($data['data'] as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
    </tr>
@endforeach

{!! paginator($data)->links() !!} // "Previous" and "Next" buttons, along with page numbers.
{!! paginator($data)->linkWithJumps() !!} // "Previous" and "Next" buttons, along with page jump options.
```

### Customize Default Pagination
Doppar provides a Bootstrap 5 pagination view by default. However, you can also customize this view to suit your needs. To customize the pagination view, Doppar offers the `publish:pagination` pool command. Running this command will create two files, `jump.blade.php` and `number.blade.php`, inside the `resources/views/pagination` folder. These files allow you to tailor the pagination design to match your application's style.

```bash
php pool publish:pagination
```

Once you modify the `jump.blade.php` and `number.blade.php` files, the changes will immediately reflect in your pagination view. This allows you to fully customize the appearance and behavior of the pagination links to align with your application's design and requirements. Feel free to update these files as needed to create a seamless and visually consistent user experience.

<a name="section-53"></a>

## Database Transactions
A database transaction is a sequence of database operations that are executed as a single unit. Transactions ensure data integrity by following the ACID properties (Atomicity, Consistency, Isolation, Durability). If any operation within the transaction fails, the entire transaction is rolled back, preventing partial updates that could leave the database in an inconsistent state.

Doppar provides built-in support for handling database transactions using the `DB::transaction()` method, `DB::beginTransaction()`, `DB::commit()`, and `DB::rollBack()`.

### Using DB::transaction() for Simplicity
The `DB::transaction()` method automatically handles committing the transaction if no exception occurs and rolls it back if an exception is thrown.
```php
DB::transaction(function () {
    $user = User::create(['name' => 'Mahedi']);
    $post = Post::create(['user_id' => $user->id, 'title' => 'First Post']);
});
```

### Manually Handling Transactions
In cases where more control is needed, transactions can be manually started using DB::beginTransaction(). The operations must then be explicitly committed or rolled back.
```php
DB::beginTransaction();
try {
    $user = User::create([
        'name' => 'Mahedi',
        'email' => fake()->email,
        'password' => bcrypt('password'),
    ]);

    Post::create([
        'title' => 'My very first post',
        'user_id' => $user->id
    ]);

    DB::commit();
} catch (\Exception $e) {
    DB::rollBack();
    throw $e;
}
```

### Handling Deadlocks with Transaction Retries
Deadlocks can occur when multiple transactions compete for the same database resources. Doppar allows setting a retry limit for transactions using a second parameter in `DB::transaction()`.
```php
DB::transaction(function () {
    // Operations that might deadlock
}, 3); // Will attempt up to 3 times before throwing an exception
```
This approach helps mitigate issues caused by deadlocks by retrying the transaction a set number of times before ultimately failing.

Using transactions properly ensures database consistency and prevents data corruption due to incomplete operations. Doppar provides flexible methods for handling transactions, allowing both automatic and manual control based on the use case.

<a name="section-54"></a>

## Manual Join
In Doppar, Eloquent manual joins allow you to retrieve data from multiple tables based on a related column. The join method in Eloquent's Query Builder provides an easy way to combine records from different tables. This document explains how to perform various types of joins manually using Eloquent's Eloquent ORM and Query Builder.

### Basic Join Example
A simple join operation can be performed using the `join` method to combine records from two tables based on a common key. Below is an example of joining `users` and `posts` tables:
```php
$users = User::query()
    ->join('posts', 'users.id', '=', 'posts.user_id')
    ->get();
```
This will return a dataset containing user data which has at least one post.

### Specifying Join Type
By default, Doppar performs an `INNER JOIN`. You can specify the type of join you want by passing the join type as an argument:
```php
$users = User::query()
    ->join('posts', 'users.id', '=', 'posts.user_id', 'left')
    ->get();
```
Here, a `LEFT JOIN` is used to include all users, even if they do not have associated posts.

### Applying Conditions in Joins
You can apply additional conditions to filter the joined data. The example below joins the posts table and fetches only the users who have published posts:
```php
$users = User::query()
    ->join('posts', 'users.id', '=', 'posts.user_id')
    ->where('posts.published', '=', true)
    ->orderBy('users.name', 'ASC')
    ->get();
```

### Performing Multiple Joins
You can join multiple tables in a single query. The example below joins the `users`, `posts`, and `comments` tables:
```php
$users = User::query()
    ->join('posts', 'users.id', '=', 'posts.user_id')
    ->join('comments', 'posts.id', '=', 'comments.post_id')
    ->get();
```
This will return data containing users, their posts, and associated comments.

### Selecting Specific Columns
To optimize queries and improve performance, you can select specific columns instead of retrieving all fields:
```php
$users = User::query()
    ->select(['users.name', 'posts.title'])
    ->join('posts', 'users.id', '=', 'posts.user_id')
    ->get();
```
This query retrieves only the `users.name` and `posts.title` fields, reducing the amount of data transferred.

<a name="section-56"></a>

## Database Operations with `DB` Facade
The Doppar Framework provides a powerful and elegant DB Facade under the namespace `Phaseolies\Support\Facades\DB`. This facade offers a fluent and expressive interface to interact with your database, allowing you to perform a variety of operations such as `querying`, `inserting`, `updating`, `deleting`, and handling transactions or stored `procedures` with ease.

### Basic Database Operation
Get a list of all tables in the database
```php
echo DB::getTables(); // Returns an array of all table names in the connected database.
```

Check if a specific table exists
```php
echo DB::tableExists('user'); // Returns true if the user table exists, otherwise false.
```

Get the column names of a given table
```php
echo DB::getTableColumns('user');
```

Get the table name associated with a model instance
```php
DB::getTable(new User()); // Useful for dynamically retrieving the table name from a model class instance.
```

Get the current active PDO connection instance
```php
return DB::getConnection(); // Returns the raw PDO connection object used internally.
```

### Querying the Database using `query()`
Doppar provides `query()` function and using it, you can pass raw sql and execute it. See the basic example. Get a single row from the user table
```php
DB::query("SELECT * FROM user WHERE name = ?", ['Kasper Snider'])->fetch();
```
Executes a query and returns the first matching row as an associative array.

Get all rows that match a query
```php
DB::query("SELECT * FROM user WHERE name = ?", ['Kasper Snider'])->fetchAll();
```

### Modifying the Database using `execute()`
Doppar provides `execute()` function and using it, you can modify database. See the basic example. Inserts a new user record. Returns the number of affected rows (1 if successful).
```php
$inserted = DB::execute(
    "INSERT INTO users (name, email, password) VALUES (?, ?, ?)",
    ['John Doe', 'john@example.com', bcrypt('secret')]
);
```

You can use transaction here as well
```php
DB::transaction(function () {
    $moved = DB::execute(
        "INSERT INTO archived_posts SELECT * FROM posts WHERE created_at < ?",
        [date('Y-m-d', strtotime('-1 year'))]
    );

    $deleted = DB::execute(
        "DELETE FROM posts WHERE created_at < ?",
        [date('Y-m-d', strtotime('-1 year'))]
    );

    echo "Archived {$moved} posts and deleted {$deleted} originals";
});
```
Executes multiple statements in a single transaction. Ensures either all queries succeed or none are committed.

### Executing Stored Procedures
Doppar provides `executeProcedure` method to run your store procedure. See the basic example
```php
// Get nested results (original behavior)
$nestedResults = DB::executeProcedure('sp_GetAllUsers')->all();
```

Get flattened first result set
```php
$users = DB::executeProcedure('sp_GetAllUsers')->flatten();
```
Calls a procedure and flattens the first result set into a simple array.


Get first row only
```php
$firstUser = DB::executeProcedure('sp_GetUserById', [1])->first();
```

Get the second result set (index 1) by passing 123 parameter
```php
$stats = DB::executeProcedure('sp_GetUserWithStats', [123])->resultSet(1);
```
Useful when a stored procedure returns multiple result sets. This fetches the one at index 1.

### With Multiple Params
```php
$totalUsers = 0;
$results = DB::executeProcedure(
    'sp_GetPaginatedUsers',
    [1, 10, 'active', 'created_at', 'DESC'],
    [&$totalUsers]
)->all();
// $results[0] contains user data
// $totalUsers contains total count
```

### Executing View
Doppar provides `executeView` method to run your `view`. See the basic example
```php
$stats = DB::executeView('vw_user_statistics');
```

### View with WHERE Conditions
You can pass `where` condition in your custom view like
```php
// 2. View with single WHERE condition
$nyUsers = DB::executeView(
    'vw_user_locations', 
    ['state' => 'New York']
);

// Equivalent to: SELECT * FROM vw_user_locations WHERE state = 'New York'

// 3. View with multiple WHERE conditions
$premiumNyUsers = DB::executeView(
    'vw_user_locations',
    [
        'state' => 'New York',
        'account_type' => 'premium'
    ]
);

// Equivalent to: 
// SELECT * FROM vw_user_locations 
// WHERE state = 'New York' AND account_type = 'premium'
```

### View with Parameter Binding
You can also pass params with where condition as follows
```php
// 4. Using parameter binding for security
$recentOrders = DB::executeView(
    'vw_recent_orders',
    ['status' => 'completed'],
    [':min_amount' => 100] // Additional parameters
);

// Equivalent to:
// SELECT * FROM vw_recent_orders 
// WHERE status = 'completed' AND amount > :min_amount
```

<a name="section-14"></a>

## Middleware
Middleware acts as a bridge between a request and a response, allowing you to filter or modify incoming requests before they reach the controller. It is useful for authentication, logging, and request modification.

Doppar supports two types of middleware
* Global Middleware
* Route Middleware

##### Global Middleware
Global middleware applies to all routes automatically. It is executed on every request, ensuring consistent behavior across the application.

##### Route Middleware
Route middleware is applied to specific routes, giving you more control over which requests are affected. You can assign middleware to a route or a group of routes as needed.

<a name="section-15"></a>

## Route Middleware
We can define multiple route middleware. To define route middleware, just update the `App\Http\Kernel.php` file's `$routeMiddleware` array as like below

#### Create New Middleware
Doppar has command line interface to create a new middleware. Doppar has `make:middleware` command to create a new middleware.
```
php pool make:middleware Authenticate
```
Then this command will create a new `Authenticate` for you located inside `App\Http\Authenticate` directory

```php
<?php

/**
 * The application's route middleware.
 *
 * These middleware may be assigned to groups or used individually.
 *
 * @var array<string, class-string|string>
 */
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
];
```
And update your route like:
```php
<?php

use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class,'index'])->middleware('auth');
```

The `ProfileController` `index` method is now protected by the auth middleware. Update your middleware configuration to ensure authentication is required before accessing this method.

```php
<?php

namespace App\Http\Middleware;

use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Auth;
use Closure;

class Authenticate implements Middleware
{
    /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param \Closure(\Phaseolies\Http\Request) $next
     * @return Phaseolies\Http\Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect()->to('/login');
    }
}
```

<a name="section-16"></a>

## Global Middleware
We can register multiple global middleware. To register global middleware, just update the `App\Http\Kernel.php` file's `$middleware` array.

#### Create New Middleware
Doppar has command line interface to create a new middleware. Doppar has `make:middleware` command to create a new middleware.
```
php pool make:middleware CorsMiddlware
```
Then this command will create a new `CorsMiddleware` for you located inside `App\Http\Middleware` directory

```php
<?php

/**
 * Application global middleware
 */
public $middleware = [
    \App\Http\Middleware\CorsMiddleware::class,
];
```
Now update your middleware like
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Phaseolies\Request
use Phaseolies\Http\Response;
use Phaseolies\Middleware\Contracts\Middleware;

class CorsMiddleware implements Middleware
{
   /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param \Closure(\Phaseolies\Http\Request) $next
     * @return Phaseolies\Http\Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        /**
         * Code goes here
         */
        return $next($request);
    }
}
```

<a name="section-17"></a>

## Middleware Params
We can define multiple route middleware parameters. To define route middleware, add a `:` after the middleware name. If there are multiple parameters, separate them with a `,` comma. See the example

```php
<?php

use Phaseolies\Route;
use App\Http\Controllers\ExampleController;

Route::get('/', [ExampleController::class, 'index'])->middleware(['auth:admin,editor,publisher', 'is_subscribed:premium']);
```

* In this example:
  * The auth middleware receives three parameters: `admin`, `editor`, and `publisher`.
  * The `is_subscribed` middleware receives one parameter: `premium`.

#### Accept Parameters in Middleware
In the middleware class, define the handle method and accept the parameters as function arguments:
```php
<?php

/**
 * Handle an incoming request
 *
 * @param Request $request
 * @param \Closure(\Phaseolies\Http\Request) $next
 * @return Phaseolies\Http\Response
 */
public function __invoke(Request $request, Closure $next, $admin, $editor, $publisher): Response
{
    // Parameters received:
    // $admin = 'admin'
    // $editor = 'editor'
    // $publisher = 'publisher'

    // Middleware logic goes here

    return $next($request);
}
```


<a name="section-18"></a>

## CSRF Protectection

Cross-site request forgery (CSRF) attacks are a type of security threat where unauthorized actions are executed on behalf of an authenticated user without their knowledge. Fortunately, Doppar provides robust built-in protection to safeguard your application against such attacks.

Doppar simplifies CSRF protection by automatically generating a unique CSRF token for every active user session. This token acts as a secure identifier to ensure that requests made to the application are genuinely coming from the authenticated user. The token is stored in the user's session and is regenerated whenever the session is refreshed, making it virtually impossible for malicious actors to replicate or misuse it.

You can access the current session's CSRF token either through the request's session data or by using the `csrf_token()` helper function. This seamless integration ensures that your application remains secure while requiring minimal effort on your part. With Doppar, you can focus on building your application with confidence, knowing that CSRF protection is handled efficiently in the background.
```php
use Phaseolies\Http\Request;

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    // ...
});
```
Anytime you define a "POST" HTML form in your application, you should include a hidden CSRF _token field in the form so that the CSRF protection middleware can validate the request. For convenience, you may use the @csrf Blade directive to generate the hidden token input field:
```php
<form method="POST" action="/profile">
    @csrf

    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
```


<a name="section-19"></a>

## Controllers
Rather than defining all request-handling logic as closures in route files, you can use controller classes to organize related functionality. Controllers centralize request handling, making your code more structured and maintainable. For example, a UserController can manage user-related actions like displaying, creating, updating, and deleting users. By default, controllers are stored in the `app/Http/Controllers` directory.

To quickly generate a new controller, you may run the `make:controller` Pool command. By default, all of the controllers for your application are stored in the `app/Http/Controllers` directory

```
php pool make:controller UserController

php pool make:controller User/UserController // create controller inside User directory
```
Let's take a look at an example of a basic controller. A controller may have any number of public methods which will respond to incoming HTTP requests:
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id)
    {
        return view('user.profile', [
            'user' => User::find($id)
        ]);
    }
}
```
Once you have written a controller class and method, you may define a route to the controller method like so:
```php
use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user/{id}', [UserController::class, 'show']);
```
### Invokable Controllers
Doppar also support invokable controllers. You can call it single action controller also. To create a single action controller, need to pass the `--invok` option before create a controller.
```
php pool make:controller ProductController --invok
```

Now this command will create a invokable controller for you. For invokable controller, route defination will be like
```php
Route::get('/invoke_me', ProductController::class);
```
Now `ProductController` __invoke method automatically will be injected by Doppar container. But remember
> **⚠️ Warning:** Constructor dependency injection won't work for __invokable controllers
>
<a name="section-20"></a>

## Request
Doppar's Phaseolies\Http\Request class provides an object-oriented way to interact with the current HTTP request being handled by your application as well as retrieve the input, cookies, and files that were submitted with the request.
#### Accessing the Request Data
To access request data, Doppar has some default built in method.
Doppar provides a powerful `Request` class to handle incoming HTTP requests. This class offers a wide range of methods to access and manipulate request data, making it easy to build robust web applications.

#### HTML Form Request Data

These methods are used to access data submitted through HTML forms (e.g., POST, GET).

* **Accessing All Data:**
    * `$request->all()`: Returns an array of all request data.
* **Accessing Specific Field Values:**
    * `$request->name`: Retrieves the value of the "name" field.
    * `$request->input('name')`: Equivalent to `$request->name`, using the `input()` method.
    * `$request->get('name')`: Equivalent to previous one
* **Retrieving Data with Exclusions:**
    * `$request->except('name')`: Retrieves all data except the "name" field.
    * `$request->except(['name', 'age'])`: Retrieves data excluding "name" and "age".
* **Retrieving Specific Fields Only:**
    * `$request->only('name')`: Retrieves only the "name" field.
    * `$request->only(['name', 'age'])`: Retrieves only "name" and "age" fields.
* **Checking Field Existence:**
    * `$request->has('name')`: Returns `true` if the "name" field exists, `false` otherwise.
* **Accessing Validation Results:**
    * `$request->passed()`: Retrieves data that passed validation (if applied).
    * `$request->failed()`: Retrieves data that failed validation (if applied).
* **Accessing Session Results:**
    * `$request->session()->token()`: Retrieves csrf token data.
    * `$request->session()->get('key')`: Get the session data that is stored in `key`
    * `$request->session()->put('key','value')`: Set the session data that is will be stored in `key`
    * `$request->session()->flush()`: To delete session data

#### Server Request Information

These methods provide access to server-related request information.

* **Client Information:**
    * `$request->ip()`: Retrieves the client's IP address.
    * `$request->userAgent()`: Retrieves the user agent string (browser/device info).
    * `$request->referer()`: Retrieves the referer URL (where the request came from).
* **Headers:**
    * `$request->headers()`: Retrieves all request headers as an array.
    * `$request->header('key')`: Retrieves the value of a specific header by key.
    * `$request->headers->get('host')`: Retrieves the value of a specific header by key.
    * `$request->headers->set('key','value')`: Set the value to the header.
* **Request Details:**
    * `$request->scheme()`: Retrieves the request scheme (e.g., "http" or "https").
    * `$request->isSecure()`: Returns `true` if the request is using HTTPS, `false` otherwise.
    * `$request->isAjax()`: Returns `true` if the request is an AJAX request, `false` otherwise.
    * `$request->isJson()`: Returns `true` if the request expects a JSON response, `false` otherwise.
    * `$request->contentType()`: Retrieves the content type of the request (e.g., "application/json").
    * `$request->contentLength()`: Retrieves the content length of the request body.
    * `$request->method()`: Retrieves the HTTP method used (e.g., GET, POST).
    * `$request->query()`: Retrieves all query parameters (GET data).
    * `$request->url()`: Retrieves the full URL of the request.
    * `$request->host()`: Retrieves the host name (e.g., "example.com").
    * `$request->server()`: Retrieves all server variables as an array.
    * `$request->server->get('key')`: Get the server- by key name
    * `$request->uri()`: Retrieves the request URI (e.g., "/path/to/resource").
* **Cookies:**
    * `$request->cookie()`: Retrieves all cookies sent with the request.
    * `$request->cookies->get('key')`: Get the cookie by key name

#### Authentication

This method is used to access authenticated user data.

* `$request->auth()`: Retrieves the authenticated user data.
* `$request->user()`: Retrieves the authenticated user data.

#### File Uploads

These methods handle file uploads from HTML forms.

* **Accessing the File Object:**
    * `$image = $request->file('file')`: `'file'` is the HTML form input name.
* **Retrieving File Information:**
    * If `$file = $request->file('file')`:
        * If `$file->isValid()`:
            * `$file->getClientOriginalName()`: Retrieves the original file name.
            * `$file->getClientOriginalPath()`: Retrieves the temporary file path.
            * `$file->getClientOriginalType()`: Retrieves the MIME type.
            * `$file->getClientOriginalSize()`: Retrieves the file size in bytes.
            * `$file->getClientOriginalExtension()`: Retrieves the file extension (e.g., "jpg", "png").
            * `$file->generateUniqueName()`: Generate a unique name for the uploaded file
            * `$file->isMimeType(string|array $mimeType)`: Checks if the uploaded file is of a specific MIME type
            * `$file->isImage()`: Check if the uploaded file is an image.
            * `$file->isVideo()`: Check if the uploaded file is a video.
            * `$file->isDocument()`: Check if the uploaded file is a document.
            * `$file->move(string $destination, ?string $fileName = null)`: Moves the uploaded file to a new location.
            * `$file->getMimeTypeByFileInfo()`: Get the file's mime type by using the fileinfo extension.
        * `$file->getError()`: Gets the error code of the uploaded file.

##### Example
```php
// Accessing the uploaded file object
$image = $request->file('file'); // 'file' is the HTML form input name

// Retrieving file information
if ($file = $request->file('file')) {
    if ($file->isValid()) {
        $file->getClientOriginalName(); // Retrieves the original file name
        $file->getClientOriginalPath(); // Retrieves the temporary file path
        $file->getClientOriginalType(); // Retrieves the MIME type
        $file->getClientOriginalExtension(); // Retrieves the file extension like jpg, png
        $file->getClientOriginalSize(); // Retrieves the file size in bytes
    }
}
```

#### Global `request()` Helper
The `request()` helper function in Doppar provides a convenient and globally accessible way to retrieve data from the current HTTP request. It’s an alias for accessing the `Phaseolies\Http\Request` instance without needing to inject or typehint it.
### Basic Usage
```php
request('key', 'default');
```
- Retrieves the value of key from the current request.
- Returns 'default' if the key does not exist.

### Example:
```php
$name = request('name', 'Guest'); // Returns the 'name' from the request or 'Guest' if not set
```

You can do the same thing using `request()` object like
```php
$name = request()->input('name', 'Guest'); // as request object
```

<a name="section-21"></a>

## Response
All routes and controllers should return a response to be sent back to the user's browser. Doppar provides several different ways to return responses. The most basic response is returning a string from a route or controller. The framework will automatically convert the string into a full HTTP response:
```php
Route::get('/', function () {
    return 'Hello World';
});
```

In addition to returning strings from your routes and controllers, you may also return arrays.
```php
Route::get('/', function () {
    return [1, 2, 3];
});
```

### Collection 
You can also return collection like
```php
Route::get('/', function () {
    return $collection = collect([1, 2, 3, 4]);
    return $collection->count();
});
```

### Response Objects
Typically, you won't just be returning simple strings or arrays from your route actions. Instead, you will be returning full `Phaseolies\Http\Response` instances.
```php
Route::get('/', function () {
    return response()->text("Hello World", 200);
});
```

### Eloquent Models and Collections
For Eloquent, Doppar usage its own Eloquent Model and Collection. So you can return Eloquent collection data as `Phaseolies\Http\Response`, Doppar automatically convert this data as collection
```php
use App\Models\User;

Route::get('/user', function () {
    return User::all();
});
```
### Attaching Headers to Responses
Keep in mind that most response methods are chainable, allowing for the fluent construction of response instances. For example, you may use the `setHeader` method to add a series of headers to the response before sending it back to the user:
```php
return response()->text("Hello World", 200)
    ->setHeader('Content-Type', 'text/plain')
    ->setHeader('X-Header-One', 'Header Value')
    ->setHeader('X-Header-Two', 'Header Value');
```
Or, you may use the withHeaders method to specify an array of headers to be added to the response:
```php
return response()->text("Hello World", 200)
    ->withHeaders([
        'Content-Type' => 'text/plain',
        'X-Header-One' => 'Header Value',
        'X-Header-Two' => 'Header Value',
    ]);
```
You also use the `Response` object as the controller method params and get the same response like
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Response $response)
    {
        return $response->text("Hello World", 200)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
    }
}
```

You can also return response like this, directly using `response()` helper.
```php
 
 return response($content, $status, $headers);
 
 return response([
            'name' =>  'doppar'
        ],200, [
            'Header-Value' => 'Your Header value'
        ]);
```

### Response Collection Inside Array
If you want to return colelction inside a array, you can use `toArray()` method to convert your collection to array
```php
return response()->json([
        'data' => User::all()->toArray()
    ], 200);
```

### Attaching Headers to Responses using Response Facades
You can also use `Facades` to get the response. You can use `Response` facades like
```php
namespace App\Http\Controllers;

use Phaseolies\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {
        return Response::text("Hello World", 200)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
    }
}
```

### Check Response Status
You can check the response status like
```php
$response = response()->json([
        'data' => 'Doppar'
   ], 200);

return $response->isOk();
```

### Some Avaialbe Response Method
There are so many response method that you can use to check your HTTP response. Some of are
```php
public function isSuccessful(): bool
public function isRedirection(): bool
public function isClientError(): bool
public function isServerError(): bool
public function isOk(): bool
public function isForbidden(): bool
public function isNotFound(): bool
public function isRedirect(?string $location = null): bool
public function isFresh(): bool
public function isValidateable(): bool
public function setPrivate(): Response
public function setPublic(): Response
public function setImmutable(bool $immutable = true): Response
public function isImmutable(): bool
public function setCache(array $options): static
public function isInvalid(): bool
```

### Redirects Response
Redirect responses are instances of the `Phaseolies\Http\Redirect` class, and contain the proper headers needed to redirect the user to another URL. There are several ways to generate a Redirect instance. The simplest method is to use the global `redirect` helper or even you can use `Redirect` facades
```php
use Phaseolies\Support\Facades\Redirect;

Route::get('/dashboard', function () {

    // Both will give you the same output
    return redirect()->to('/home/dashboard');
    return Redirect::to('/home/dashboard');
    
    // Even you can use
    redirect('/home/dashboard');
});
```

### Redirecting to Named Routes
When you call the redirect helper with no parameters, an instance of `Phaseolies\Routing\Redirect` is returned, allowing you to call any method on the `Redirect` instance. For example, to generate a `Redirect` to a named route, you may use the route method:
```php
return redirect()->route('login');
```
If your route has parameters, you may pass them as the second argument to the route method:
```php
// For a route with the following URI: /profile/{id}/{username}
return redirect()->route('profile', ['id' => 1, 'username' => 'mahedy150101']);
```
### Redirecting to External Domains
Sometimes you may need to redirect to a domain outside of your application. You may do so by calling the `away` method, which creates a RedirectResponse without any additional URL encoding, validation, or verification:
```php
return redirect()->away('https://www.google.com');
```

### Redirecting With Flashed Session Data
Redirecting to a new URL and flashing data to the session are usually done at the same time. Typically, this is done after successfully performing an action when you flash a success message to the session. For convenience, you may create a `RedirectResponse` instance and flash data to the session in a single, fluent method chain:
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
       redirect()->to('/login')
            ->with('success', 'You are successfully logged out');
    }
}

```
You can show this in many ways. This ways will automatically check is there is any session flash message then display it

```blade
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
```
### View Responses
If you need control over the response's status and headers but also need to return a view as the response's content, you should use the view method:
```php
return response()->view('welcome')->setHeader('Content-Type', 'text/html');
```
### JSON Responses
The json method will automatically set the `Content-Type header to application/json`, as well as convert the given array to JSON using the `json_encode` PHP function:
```php
 return response()->json([
        'name' => 'Mahedi Hasan',
        'age' => 33
    ], 200);
```

### Responses Facades
You can using `Response` facades to get the response like above. As example get the json response using Response facades
```php
use Phaseolies\Support\Facades\Response;

return Response::json([
        'name' => 'Mahedi Hasan',
        'age' => 33
    ], 200);
```

### File Downloads Response
The download method generates a response that triggers a file download in the user’s browser. It takes the file path as its primary argument. Optionally, you can specify a custom download filename as the second argument—this overrides the default name seen by the user. Additionally, an array of custom HTTP headers can be passed as a third argument for further control over the download behavior.
```php
return response()->download($pathToFile);

return response()->download($pathToFile, $name, $headers);
```

### Streamed Downloads
At times, you may want to convert the string output of an operation into a downloadable response without storing it on disk. The streamDownload method allows you to achieve this by accepting a callback, filename, and an optional array of headers as parameters:
```php

use App\Services\Facebook;

return response()->streamDownload(function () {
    echo Facebook::api('repo')
        ->contents()
        ->readme('doppar', 'doppar')['contents'];
}, 'doppar-readme.md');
```

### File Responses
The file method may be used to display a file, such as an image or PDF, directly in the user's browser instead of initiating a download. This method accepts the absolute path to the file as its first argument and an array of headers as its second argument:
```php
return response()->file($pathToFile);

return response()->file($pathToFile, $headers);
```

### Streamed Responses
Streaming data to the client as it is generated can greatly reduce memory usage and enhance performance, particularly for extremely large responses.
```php
public function streamedContent(): \Generator
{
    yield 'Hello, ';
    yield 'World!';
}

return response()->stream(function (): void {
    foreach ($this->streamedContent() as $chunk) {
        echo $chunk;
        ob_flush();
        flush();
        sleep(2); // Simulate delay between chunks...
    }
}, 200, ['X-Accel-Buffering' => 'no']);
```

### Streamed JSON Responses
To stream JSON data incrementally, you can use the `streamJson` method. This is particularly beneficial for large datasets that need to be sent progressively to the browser in a format that JavaScript can easily parse
```php
return response()->streamJson([
    'users' => User::all(),
]);
```

<a name="section-22"></a>

## Views
In Doppar, it's not practical to return entire HTML document strings directly from your routes and controllers. Fortunately, views offer a clean and structured way to manage your application's UI by keeping HTML in separate files.

Views help separate your application's logic from its presentation layer, improving maintainability and readability. In Doppar, views are typically stored in the resources/views directory. The templating system in Doppar allows you to create dynamic and reusable UI components efficiently. A basic view file might look like this:
```
<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
        <h1>Hello, {{ $name }}</h1>
    </body>
</html>
```
Since this view is stored at resources/views/greeting.blade.php, we may return it using the global view helper like so:
```
Route::get('/', function () {
    return view('greeting', ['name' => 'James']);
});
```
### Passing Data to Views
As you saw in the previous examples, you may pass an array of data to views to make that data available to the view:
```php
return view('greetings', ['name' => 'Victoria']);
```
### Optimizing Views
In Doppar Framework, Blade template views are compiled on demand. When a request is made to render a view, Doppar checks if a compiled version exists. If the compiled view is missing or outdated compared to its source, Doppar will recompile it dynamically.

However, compiling views at runtime introduces a minor performance overhead. To optimize performance, Doppar provides the view:cache command, which precompiles all views ahead of time. This can be particularly useful during deployment.
```php
php pool view:cache
```
You may use the `view:clear` command to clear the view cache:
```
php artisan view:clear
```


<a name="section-23"></a>

## Asset Bundling
In Doppar, you can easily load CSS, JavaScript, and other asset files from the public folder using the enqueue() functio
```html
<link rel="stylesheet" href="{{ enqueue('style.css') }}">
<link rel="stylesheet" href="{{ enqueue('assets/style.css') }}"> // Here assets is a folder name
```
This ensures that your asset paths remain dynamic and easily manageable across the project.

<a name="section-24"></a>

## Session
Doppar's `session()` helper method provides a simple and intuitive way to manage session data in your application. Below is a detailed explanation of the available methods and their usage. Like get, put, has, forget, flush, and more, you can easily handle session operations.

### Session Console Command
To remove all the session data, you can run
```bash
php pool session:clear
php pool session:clear --force
```

### Put and Get Session Data
To store data in the session and retrieve it later, use the `put` and `get` methods.
#### Syntax
```php
$request->session()->put($key, $value);
```
Example
```php
$request->session()->put('name', 'doppar');
return $request->session()->get('name');
```
You can also get the session data like
```php
return session('name', 'default');
```


You can check a key exists or not in a session data by doing this
```php
if($rquest->session()->has('name')){
    // Session key data exists
}
```

You can destroy specific key session data by doing this
```php
$rquest->session()->forget('key')
```
You can clear all session data by calling `flush()` function
```php
$rquest->session()->flush();
```

Even you can destroy session using `destroy` function
```php
$request->session()->destroy()
```
### Set and Get Session ID
You can set seesion id and get is also. 
```php
$rquest->session()->setId($id);
$rquest->session()->getId()
```

If you want to show all the session data from your application, call `all()` method like
```php
$rquest->session()->all()
```
### Session Facades
You can also handle session data using `Session` facades.
```php
use Phaseolies\Support\Facades\Session;

Session::put('name','mahedi');
Session::get('name');
```

<a name="section-50"></a>

## Cookie
Doppar provides two ways to manage cookies in the application. One is `Phaseolies\Support\Facades\Cookie` facades and another is `cookie()` helper fucntion. Each approach allows you to store, retrieve, and delete cookies efficiently. Let's explore both methods in detail.

### Storing Cookies
The Cookie facade provides a structured way to manage cookies. It allows you to store, retrieve, and remove cookies with additional options like expiration time, path, and security settings. To store cookies, simply use `store()` function.
```php
use Phaseolies\Support\Facades\Cookie;

Cookie::store('cookie_name', 'cookie_value');

// Using helper

cookie()->store('cookie_name', 'cookie_value');
```

### Cookie With Expiration Time
If you want to store cookie using your defined expiration time, follow it
```php
// Using timestamp
Cookie::store('user_token', 'abc123', ['expires' => time() + 3600]);

// Using DateTime
$expireDate = new \DateTime('+1 day');
Cookie::store('user_token', 'abc123', ['expires' => $expireDate]);

// Using string (strtotime compatible)
Cookie::store('user_token', 'abc123', ['expires' => '+1 week']);
```

You can use Carbon also like that
```php
Cookie::store('temp_data', 'value456', [
    'expires' => Carbon::parse('next friday 3pm')
]);
```

### Cookie With Path
To define cookie with path, you can follow below ways
```php
Cookie::store('prefs', 'dark', ['path' => '/settings']);
```

### Cookie With Domain
To add domain in your cookie you can follow as below
```php
Cookie::store('session', 'xyz789', ['domain' => '.example.com']);
```

### Secure & HttpOnly
When storing cookies, security is a crucial aspect, especially for authentication and sensitive user data. The secure and httponly attributes help protect cookies from attacks such as cross-site scripting (XSS) and man-in-the-middle (MITM) attacks.
```php
Cookie::store('auth', 'secure123', [
    'secure' => true,    // HTTPS only
    'httponly' => true   // JavaScript cannot access
]);
```

### SameSite Attribute
For samesite attribute, you can also set like that
```php
Cookie::store('csrftoken', 'rand123', [
    'samesite' => Cookie::SAMESITE_STRICT
]);
```

### Partitioned (for CHIPS)
Setting `'partitioned' => true` allows a cookie to be accessed only within a specific cross-site context, without being shared across different origins. This helps prevent third-party tracking while still enabling functionalities like embedded content authentication.
```php
Cookie::store('tracking', 'user123', [
    'partitioned' => true  // For cross-site cookies
]);
```

### Raw Cookie (no URL encoding)
By default, cookies are URL-encoded, meaning special characters like `=` and & are automatically converted to a safe format. However, if you need to store data without encoding, you can use the raw option.
```php
Cookie::store('raw_data', 'some=value', [
    'raw' => true  // Disables URL encoding
]);
```

### Forever Cookie
A forever cookie is a cookie that does not expire or is set with a very distant expiration date, ensuring it remains stored in the user's browser for an extended period. These cookies are useful for remembering user preferences, authentication tokens, and long-term tracking. You can store `forever` cookie as like below by using `forever` method.
```php
Cookie::forever('remember_me', 'yes', [
    'path' => '/',
    'httponly' => true
]);
```

### Retrieving Cookies
We can very easily get our stored cookie data using `get` function.
```php
Cookie::get('user_token');

cookie()->get('user_token');


Cookie::retrieve('non_existent', 'default_value'); // with default value
```

### Check Cookie Existence
Before accessing a cookie, it’s best practice to check if it exists to avoid errors. Doppar provides a method to verify whether a specific cookie is present using `Cookie::has()`
```php
if (Cookie::has('user_token')) {
    // Cookie exists
}
```

### Delete Cookie
When a cookie is no longer needed, it should be deleted to ensure proper data management and security. Doppar provides a way to remove cookies using the `remove()` method.
```php
Cookie::remove('user_token');

// With Path/Domain
Cookie::remove('old_cookie', [
    'path' => '/special',
    'domain' => '.example.com'
]);
```

### Advanced Cookie Usage: Create Without Sending
In some cases, you might want to create a cookie but not immediately send it to the user's browser. This can be useful for situations where you need to modify the cookie before sending it or store it for later in the same request cycle. Doppar provides a way to create cookies in advanced scenarios like this by using the `make()` method.
```php
$cookie = Cookie::make('preview_mode', 'enabled', [
    'expires' => '+30 minutes',            // Sets the expiration time to 30 minutes from now
    'samesite' => Cookie::SAMESITE_LAX     // Specifies SameSite attribute for better cross-site cookie handling
]);

// Send later
Cookie::store($cookie);
```

### Modifying an Existing Cookie
In some cases, you may need to update the value or properties of an already created cookie. Doppar provides a convenient way to modify an existing cookie using methods like `withValue()` and `withExpires()`. These methods allow you to change the value or expiration of a cookie after it has been created.
```php
Cookie::make('existing_cookie', '1')
    ->modify()
    ->withValue('10')
    ->withExpires('+1 day')
    ->update();
```
You can extend it also like that
```php
Cookie::make('existing_cookie', 'light')
    ->modify()
    ->withValue('dark')
    ->withPath('/settings')
    ->withDomain('.example.com')
    ->withSecure(true)
    ->withSameSite('lax')
    ->update();
```

### Fetch All Cookies
To get all the cookies, you can like that
```php
$request->cookies->all();

//or
Cookie::all();
```

<a name="section-25"></a>

## Validation
Doppar provides a very simple approaches to validate your application's incoming data. It is most common to use the validate method available on all incoming HTTP requests. However, we will discuss other approaches to validation as well. We can validate from and can show error message in blade file very easily. To validate from , just assume we have two routes.
```php
<?php

use Phaseolies\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/register', [ExampleController::class, 'index']);
Route::post('/register', [ExampleController::class, 'store']);
```
And now we can update `App\Http\Controllers\ExampleController.php` like
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Request;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->sanitize([
            'email' => 'required|email|unique:users|min:2|max:100',
            'password' => 'required|min:2|max:20',
            'username' => 'required|unique:users|min:2|max:100',
            'name' => 'required|min:2|max:20'
        ]);

        // If validation passes, proceed to store the user data.
    }
}
```
Here the `store()` method in the `UserController` is designed to handle user registration form submissions. It ensures that user input is validated and sanitized before being stored in the database.

**Functionality:**

1.  **Request Handling:**
    * The method receives an instance of the `Request` class (`$request`), which encapsulates all incoming form data.

2.  **Data Sanitization and Validation:**
    * The `$request->sanitize()` method is employed to validate and filter the incoming data according to the following rules:
        * `email`:
            * Must be present (`required`).
            * Must adhere to a valid email format.
            * Must be unique within the `users` table.
            * Must be between 2 and 100 characters in length.
        * `password`:
            * Must be present (`required`).
            * Must be between 2 and 20 characters in length.
        * `username`:
            * Must be present (`required`).
            * Must be unique within the `users` table.
            * Must be between 2 and 100 characters in length.
        * `name`:
            * Must be present (`required`).
            * Must be between 2 and 20 characters in length.

3.  **Data Storage:**
    * Upon successful validation, the sanitized and validated data is stored in the `$data` variable.
    * The method then proceeds to store this data in the database, typically by creating a new record in the `users` table.

You can also get `failed` and `passed` data from the request. 
```php
<?php

public function register(Request $request)
{
    $data = $request->sanitize([
        'email' => 'required|email|unique:users|min:2|max:100',
        'password' => 'required|min:2|max:20',
        'username' => 'required|unique:users|min:2|max:100',
        'name' => 'required|min:2|max:20'
    ]);

    $data // validation passed data
    $request->passed(); // validation passed data

    // Safely create the user now
    User::create($request->passed());
}
```

### Show Validation Message
To show validation error message in your blade file, doppar has a very elegent syntax. Showing validation error message specific key wise
```html
<input .... class="form-control @error('email') is-invalid @enderror value="{{ old('email') }}">
@error('email')
    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
@enderror
```
But if you want to show all error message in a single call, you can use below way
```html
 @errors
    <div class="alert alert-danger">
        <ul>
            @foreach (session()->get('errors') as $field => $messages)
                @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@enderrors
```

Doppar will automatically trace the error message and display here.

## Validation Facades
Doppar provides `Phaseolies\Support\Facades\Sanitize` facades to sanitize your form request data. you can sanitize your form request data like
```php
<?php

namespace App\Http\Controllers\Auth;

use Phaseolies\Support\Facades\Sanitize;
use Phaseolies\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $sanitizer = Sanitize::request($request->all(), [
            'email' => 'required|email|min:2|max:100',
            'password' => 'required|min:2|max:20'
        ]);

        if ($sanitizer->fails()) {
            return back()->withErrors($sanitizer->errors())->withInput();
        }

        // validation passed and you can get the sanitized data like
        $validated = $sanitizer->passed();
    }
}
```

Now you can show all the error message with session flash method. Let's see the example of session flash error message showing
```html
// Use any one of them 
@if (session()->has('errors'))
    <div class="alert alert-danger">
        <ul>
            @foreach (session()->get('errors') as $field => $messages)
                @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@endif
```

### Image validation
In Doppar, you can use the $request->sanitize() method to validate and sanitize incoming request data. This ensures that the submitted data meets specific criteria before being processed.
To validate an uploaded file, use the following code:
```php
$request->sanitize([
    'file' => 'required|image|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000|max:2048'
]);
```
The following validation rules are applied to image uploads to ensure that only properly formatted and sized images are processed.

**Rules:**

* **`required`**:
    * Ensures that a file is provided in the upload request. If no file is present, validation will fail.
* **`image`**:
    * Verifies that the uploaded file is indeed an image. This rule checks the file's MIME type to confirm it's an image format.
* **`mimes:jpg,png,jpeg`**:
    * Restricts the acceptable image file types to JPEG (`jpg`, `jpeg`) and PNG (`png`). Any other image formats or file types will be rejected.
* **`dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000`**:
    * Enforces specific size constraints on the image.
        * `min_width=100` and `min_height=100`: The image must have a minimum width and height of 100 pixels.
        * `max_width=1000` and `max_height=1000`: The image must not exceed a maximum width and height of 1000 pixels.
* **`max:2048`**:
    * Limits the maximum file size to 2048 kilobytes (2 megabytes). Files exceeding this size will be rejected.

**Validation Failure:**

If the uploaded file fails to meet any of these criteria, the validation process will fail. An error response will be generated, indicating the specific validation failures.

### Date Validation
To validate date, you follow this example
```php
'date' => 'required|date|gte:today'
```
Here date must date type of field and `gte` means `greater than equal` today. if you use `gt` that means `greater than` today like
```php
'date' => 'required|date|gt:today'
```
You can also use `lte` and `lt` means `less than today` and `less than`. As for example
```php
'date' => 'required|date|lte:today' // date should be less than equal today
```

### Number Validation
To validate number, you follow this example
```php
$request->sanitize([
    'number' => 'null|int|between:2,5'
]);
```
The above validation will be applied like that, the number can be nullable and if number provides, it must be integer and digit must in between greater than equal 2 and less than equal 5

To validate `float` number, you follow this example
```php
$request->sanitize([
    'number' => 'null|float:2|between:2,5'
]);
```
The above validation will be applied like that, the number can be nullable and if number provides, it must be float and digit must in between greater than equal 2 and less than equal 5 and decimal after number will be 2 digit to "have exactly two decimal places" or "with two decimal places" like `3.33` not `3.333`

### Validation Using Form Request Class
We can also validate requested data using a class to make our code more clean and maintable. Doppar provides a pool command to create a new form request class.
```bash
php pool make:request LoginRequest
```

This command will create a new Request class to handle login request form data inside the `App\Http\Validations` folder. In this class, you will find two methods: `authorize()` and `rules()`. If you want to perform validation, ensure that the `authorize()` method returns `true`. See the example
```php
<?php

namespace App\Http\Validations;

use Phaseolies\Http\Validation\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|min:2|max:100',
            'password' => 'required|min:2|max:20'
        ];
    }
}
```

Now you this Request validation class in your controller like
```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Validations\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->passed() // validated data
    }
}
```

<a name="section-26"></a>

## Error Handling
Doppar has HttpException class to throw an exception. You can use it like
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Phaseolies\Http\Exceptions\HttpException;

class UserController extends Controller
{

    public function index()
    {
        try {
           // code
        } catch (HttpException $th) {
            return $th->getMessage();
        }
    }
}

```
### Abort Facades
To handle error showing in browser is important. Now assume you want to redirect user a 404 page or showing any HTTP status page error. You can use `Phaseolies\Support\Facades\Abort` class or `abort` global helper function.
```php
use Phaseolies\Support\Facades\Auth;

Abort::abort(404);
abort(404);
```
This will show the user 404 error page. You can also use `abort_if` to add extra condition.

```php
abort_if(Auth::user()->id === 1, 404);
```

### User Define Custom Error Page
If you want to use a custom error page, you need to create your error view file inside the `resources/views/errors` directory. For example, to create a custom 404 error page, you would name the file `404.blade.php`, where `404` represents the HTTP status code. Once created, Doppar will automatically use your custom error page for the corresponding status code.

<a name="section-27"></a>

## Error Logging and System Monitoring

Doppar provides a comprehensive logging system to facilitate application debugging and monitoring. By leveraging the powerful `Monolog` library, Doppar offers flexible logging capabilities, allowing you to record various events and messages to different channels.

**Logging Channels:**

Doppar supports three primary logging channels, configurable via the `config/log.php` file and your `.env` environment variables:

* **`stack`**: Allows you to group multiple log handlers into a single channel.
* **`daily`**: Creates a new log file each day, useful for managing large log volumes.
* **`single`**: Writes all log messages to a single file (`storage/logs/doppar.log`).
* **`slack`**: Creates log each day in slack channel

**Configuration:**

You can customize the logging behavior by modifying the `config/log.php` file and the `.env` file. This allows you to select your preferred logging channel, adjust log levels, and configure other logging options.

**Basic Logging with the `Phaseolies\Support\Facades\Log` Facades:**

Doppar provides a convenient `Log` Facades class to simplify the logging process. To log a message, simply use the following syntax:

```php
use Phaseolies\Support\Facades\Log;

Log::info('Howdy');
```

Doppar allow you to create Log using multiple method like
```php
Log::warning('Howdy');
Log::notice('Howdy');
Log::alert('Howdy');
Log::emergency('Howdy');
Log::error('Howdy');
Log::debug('Howdy');
Log::critical('Howdy');
```

### Log channel
You can use channel to show Log message, like you want to show Log a daily file or slack channel or single channel, you can use like below
```php
Log::channel('stack')->info('Howdy');
Log::channel('daily')->warning('Howdy');
Log::channel('single')->notice('Howdy');
Log::channel('slack')->alert('Howdy');
```

### Log Helper
You can show above all the log data using log helper function like
```php
info('Howdy');
warning('Howdy');
notice('Howdy');
alert('Howdy');
emergency('Howdy');
error('Howdy');
debug('Howdy');
critical('Howdy');
```

#### Automatic System Error Logging
Doppar includes a robust, built-in system for automatically capturing and recording system errors. This crucial feature ensures that critical issues are promptly identified, allowing developers to maintain application stability and effectively troubleshoot problems. Doppar automatically logged system error message in `storage/log/doppar.log` file.

**How It Works:**

* **Automatic Capture:**
    * When an uncaught exception or error occurs within your Doppar application, the framework's error handling mechanism automatically intercepts the event.
* **Log Destination:**
    * These captured system error messages are then written to the `storage/logs/doppar.log` file. This central location acts as a comprehensive repository for all system-level errors.
* **Purpose:**
    * This automatic logging empowers developers to:
        * Identify and diagnose the root cause of errors.
        * Monitor application health and stability in real-time.
        * Proactively address potential issues before they escalate.

**Benefits:**

* **Simplified Debugging:**
    * A centralized log of system errors significantly streamlines the debugging process. Developers can quickly review the log to pinpoint the source of problems, saving valuable time and effort.
* **Enhanced Monitoring:**
    * Regularly reviewing the error log enables developers to identify recurring issues, potential vulnerabilities, and performance bottlenecks, leading to a more stable application.
* **Improved Reliability:**
    * By promptly addressing logged errors, developers can enhance the overall reliability and stability of their Doppar application, ensuring a consistent and dependable user experience.

**In Essence:**

Doppar's automatic system error logging acts as a vital safety net, ensuring that critical errors are meticulously recorded for thorough analysis and swift resolution. This proactive approach significantly contributes to the development of a more robust, dependable, and maintainable application.

<a name="section-48"></a>

## URL Generation
Doppar provides several helpers to assist you in generating URLs for your application. These helpers are primarily helpful when building links in your templates, or when generating redirect responses to another part of your application. The most basic URL generation will be like assume we want to generate url using route name.
```php
use Phaseolies\Support\Facades\URL;

URL::route('login');

// its equivalent helper method is
route('login');
```

### Signed URL
Assume you want to generate a URL that will be expire after some times with a signature, you can use `singed` method like
```php
URL::signed('/download', ['file' => 'report.pdf'], 3600);

// This will generate URL like this
http://example.com/download?file=report.pdf&expires=1742400695&signature=14a4f4a5c6b6c96eb8668af1759232591d52eb8456bcf088addb02275b673562
```

You can also create this above URL using
```php
URL::to('/download')
    ->withQuery(['file' => 'report.pdf'])
    ->withSignature(3600)
    ->withFragment('about')
    ->make();

// output
http://localhost:8000/download?file=report.pdf&expires=1742401435&signature=363ef0e47fd9fca7197882490ee8f4c132df6b9b6e9e0041ac0df5c31cc349d3#about
```

There are some basic helper method to access URL like
```php
URL::full(); // http://example.com/hello?name=doppar
URL::current(); // http://example.com/hello
```

### Accessing public assets
Doppar provides `enqueue()` method to access your public assstes like
```php
URL::enqueue('/assets/example.png'); // http://localhost:8000/assets/example.png

// its equivalent helper method is
enqueue('/assets/example.png');
```

<a name="section-28"></a>

## Pool Console
Pool is the command line interface included with Doppar. Pool exists at the root of your application as the pool script and provides a number of helpful commands that can assist you while you build your application. To view a list of all available Pool commands, you may use the list command:
```bash
php pool list
```
It will shows all the application commands
**General Commands:**

* `completion`: Dump the shell completion script.
* `help`: Display help for a command.
* `list`: List available commands.

**Database Migration Commands:**

* `migrate`: Runs new database migrations.
* `migrate:fresh`: Rolls back all migrations and re-runs them.

**Cache Management Commands:**

* `cache:clear`: Clear all cache files from the `storage/framework` folder.
* `config:clear`: Clear all config cache data.
* `config:cache`: Cache the configuration files into a single file for faster access.
* `view:cache`: Precompile all views and store them in the `storage/framework/views` folder.
* `view:clear`: Clear all compiled view files from the `storage/framework/views` folder.

**Database Seeding Commands:**

* `db:seed`: Run database seeds.

**Auth Commands:**

* `make:auth`: Generates Doppar's builtin authentication scaffolding

**Key Generation Commands:**

* `key:generate`: Generate a new application key and set it in the `.env` file.

**Code Generation (Make) Commands:**

* `make:controller`: Creates a new controller class.
* `make:middleware`: Creates a new middleware class.
* `make:provider`: Creates a new service provider class.
* `make:model`: Creates a new model class.
* `make:migration`: Creates a new Phinx migration class.
* `make:seed`: Creates a new Phinx seed class.

**Session Management Commands:**

* `session:clear`: Clear all session files from the `storage/framework/sessions` folder.

**Storage Management Commands:**

* `storage:link`: Create a symbolic link from `public/storage` to `storage/app/public`.

**Development Server Command:**

* `start`: Start the Doppar development server.

<a name="section-30"></a>

## Encryption
Doppar's encryption services provide a simple, convenient interface for encrypting and decrypting text via PHP's OpenSSL using `AES-256` and `AES-128` encryption. All of Doppar's encrypted values are signed using a message authentication code (MAC) so that their underlying value cannot be modified or tampered with once encrypted.

Before using Doppar's encrypter, you must set the key configuration option in your `config/app.php` configuration file. This configuration value is driven by the `APP_KEY` environment variable. You should use the `php pool key:generate` command to generate this variable's value since the `key:generate` command will use PHP's secure random bytes generator to build a cryptographically secure key for your application. Typically, the value of the `APP_KEY` environment variable will be generated for you during Doppar's installation.

#### Encrypting a Value
You can use `Phaseolies\Support\Facades\Crypt` facades to `encrypt` a string.
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Crypt;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $encrypted = Crypt::encrypt("Hello World");

        $encrypted // This is now encrypted
    }
}
```

#### Decrypting a Value
You can use `Phaseolies\Support\Facades\Crypt` facades to `decrypt` a string.
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Crypt;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $decrypted = Crypt::decrypt($encrypted);

        $encrypted // This is now decrypted
    }
}
```
<a name="rate-limiter"></a>

## Rate Limiter
Rate limiting is a technique used to control the number of requests a client can make to an API within a specified timeframe. It helps prevent abuse, reduce server load, and enhance security by limiting how frequently a user can access a given route.

In the Doppar PHP framework, you can apply rate limiting to specific routes using middleware.
```php
Route::get('show', [PostController::class, 'index'])
    ->middleware(['throttle:10,1']);
```
Here `throttle:10,1` Limits requests to 10 per minute. This means that any client (such as a browser, mobile app, or script) can call the `/show` endpoint up to 10 times per minute. If they exceed this limit, the server will respond with a 429 Too Many Requests status code.

### Customizing Rate Limits
You can customize the rate limit by changing the parameters:
```
throttle:<max_requests>,<decay_minutes>
```
For example:
- throttle:5,1 – 5 requests per minute
- throttle:100,60 – 100 requests per hour

<a name="caching"></a>

## Caching
Caching is a powerful technique that stores frequently accessed data in a temporary storage layer, reducing the need to repeatedly perform expensive operations (like database queries or API calls). By using caching in your application, you can significantly improve performance and reduce server load.

The Doppar PHP framework provides a flexible caching system that supports multiple drivers and implements the PSR-16 SimpleCache standard for interoperability.

### Configuration
The cache system is configured via the `config/caching.php` file. This file allows you to define:

- The default cache driver.
- Available cache stores.
- A global key prefix to prevent collisions.

### Supported Drivers
Doppar supports a range of cache backends:

| Driver  | Description                             |
|---------|-----------------------------------------|
| file    | Stores cache files on disk              |
| redis   | Uses Redis for high-performance caching |
| array   | Stores in memory (useful for testing)   |
| apc     | Uses APCu PHP extension                 |

🛠️ You can define custom adapters and drivers to suit your infrastructure needs.

### Usage
Doppar provides a convenient caching facade to simplify working with cache in your controllers and services.
```php
use Phaseolies\Support\Facades\Cache;

// Store an item for 60 seconds
Cache::set('name', 'Mahedi', 60);

// Retrieve an item
$name = Cache::get('name', 'Default Value');

// Check if a key exists
$exists = Cache::has('name');

// Remove an item
Cache::delete('name');
```

### Working With Multiple Items
```php
Cache::setMultiple([
    'key1' => 'value1',
    'key2' => 'value2'
], 60);

$values = Cache::getMultiple(['key1', 'key2'], 'default');

// Remove multiple items
Cache::deleteMultiple(['key1', 'key2']);
```

### Advanced Operations
```php
// Increment or decrement cache values
Cache::increment('counter', 2);
Cache::decrement('counter');

// Add a new item only if it doesn't already exist
Cache::add('user_id_123', 'John Doe', 120);

// Store an item forever (without TTL)
Cache::forever('config_loaded', true);

// Clear entire cache store
Cache::clear();
```

### Custom Cache Store Implementation
Under the hood, Doppar uses the `\Phaseolies\Cache\CacheStore` class which implements the PSR `CacheInterface` and works with Symfony’s `AdapterInterface`. This design allows you to easily switch or extend cache drivers while maintaining a consistent API.

```php
$store = new \Phaseolies\Cache\CacheStore($adapter, 'my_prefix_');
$store->set('custom_key', 'value', 300);
```

<a name="section-32"></a>

## Database Connection
To connect the database you have to update `.env` configuration file and database related config file located in `config/database.php`. Doppar currently support only MYSQL database.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
<a name="section-33"></a>

## Database Migration
Managing database changes by hand is risky and error-prone. Doppar's migration system takes the guesswork out of the equation by automating and organizing your schema changes — so you can focus more on building features and less on database headaches.

Doppar provides a seamless and structured way to manage your database migrations, making it easy to evolve your database schema over time. With Doppar’s migration system, you can track changes, collaborate with your team, and keep your development, staging, and production environments in sync.

### Create Migration
To create a new migration file, run this command
```bash
php pool make:migration create_users_table --create=users
```
Here, `users` is the table name. This command will generate a new migration file by returning an anonymous class 
instance. Now assume we are going to update this for define our database schema.

```php
<?php

use Phaseolies\Support\Facades\Schema;
use Phaseolies\Database\Migration\Blueprint;
use Phaseolies\Database\Migration\Migration;

return new class extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
```
### Run Migration
To migrate your all file or newly created migration files, run this `migrate` command
```bash
php pool migrate
```

### Available Fields
Let's see all the available columns types and options
#### id()
Creates an auto-incrementing primary key (unsigned big integer).
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
});
```

#### string()
Defines a column with the `VARCHAR` type, ideal for storing short strings like names, titles, or labels. By default, the maximum length is 255 characters.
```php
Schema::create('users', function (Blueprint $table) {
    $table->string('title');
    // with custom length
    $table->string('title', 100);
});
```

### char()
Defines a column with the `CHAR` type, ideal for storing short strings like names, titles, or labels. By default, the maximum length is 255 characters.
```php
Schema::create('users', function (Blueprint $table) {
    $table->char('name');
});
```

### tinyText()
Defines a column with the `TINYTEXT` type, ideal for storing small blocks of text such as summaries, excerpts, or 
content.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->tinyText('excerpt');
});
```

### mediumText()
Defines a column with the `MEDIUMTEXT` type, ideal for storing longer blocks of text such as summaries, excerpts, or content that exceeds the 255-character limit of a string.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->mediumText('body');
});
```

### text()
Defines a column with the `TEXT` type, ideal for storing longer blocks of text such as summaries, excerpts, or content 
that exceeds the 255-character limit of a string.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->text('body');
});
```

### longText()
Defines a column with the `LONGTEXT` type, perfect for storing very large amounts of text, such as full articles, blog post content, or rich HTML.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->longText('description');
});
```

### json()
Defines a column with the `JSON` type, ideal for storing structured data like arrays, objects, or key-value pairs. Useful when the data format is dynamic or flexible.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->json('attributes');
});
```

### integer()
Defines a column with the `INT` type, ideal for storing whole numbers such as counts, IDs, or any data that doesn’t require decimal precision.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->integer('post_views');
});
```

### boolean()
Defines a column with the `BOOLEAN` type, which stores binary values: `true (1)` or `false (0)`. Typically used for flags or status indicators, such as whether a post is active or published.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->boolean('status');
});
```

### timestamps()
Defines two columns: `created_at` and `updated_at`. These are automatically managed by Eloquent to track when a record is created and last updated.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->timestamps();
});
```

### unique()
Enforces a unique constraint on a column, ensuring that no two rows can have the same value for that column. It's often used on columns like email addresses, slugs, or usernames to maintain data integrity.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->string('slug')->unique();
});
```

### nullable()
Allows a column to accept `null` values. By default, columns in Doppar are required, but using nullable() makes the 
column optional, meaning it can store `NULL` values.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->string('excerpt')->nullable();
});
```

### default()
Sets a default value for a column if no value is provided during the creation of a record. This is useful for ensuring a column has a predetermined value when it’s not explicitly set.
```php
Schema::create('posts', function (Blueprint $table) {
    $table->boolean('status')->default(true);
});
```

### Number Types
Doppar migration includes various numeric column types to handle different ranges and precisions of data. Here's a quick 
overview:
```php
// Signed Integers:
$table->tinyInteger('tiny_int_column'); // 1 byte, range: -128 to 127
$table->smallInteger('small_int_column'); // 2 bytes, range: -32,768 to 32,767
$table->mediumInteger('medium_int_column'); // 3 bytes, range: -8,388,608 to 8,388,607
$table->integer('int_column'); // 4 bytes, range: -2,147,483,648 to 2,147,483,647
$table->bigInteger('big_int_column'); // 8 bytes, range: -9.2 quintillion to 9.2 quintillion

// Unsigned Integers (no negative values):
$table->unsignedInteger('unsigned_int_column'); // 0 to 255
$table->unsignedTinyInteger('unsigned_tiny_int_column'); // 0 to 65,535
$table->unsignedSmallInteger('unsigned_small_int_column'); // 0 to 16,777,215
$table->unsignedMediumInteger('unsigned_medium_int_column'); // 0 to 4,294,967,295

// Floating Point Types:
$table->float('float_column', 8, 2); // Approximate numeric, total 8 digits, 2 after decimal
$table->double('double_column', 15, 8); // Higher precision float, total 15 digits, 8 after decimal
$table->decimal('decimal_column', 10, 2); // Exact numeric, total 10 digits, 2 after decimal (ideal for currency)
```

### Date/Time Types
Doppar migration includes a variety of date and time-related columns to cover different temporal data needs:
```php
$table->date('date_column'); // Stores only the date (format: YYYY-MM-DD)
$table->dateTime('datetime_column'); //  Stores date and time (format: YYYY-MM-DD HH:MM:SS)
$table->dateTimeTz('datetime_tz_column'); // Like dateTime, but includes time zone support
$table->time('time_column'); // Stores only time (format: HH:MM:SS)

// Time Zone Aware Columns:
$table->timeTz('time_tz_column'); //  Like time, but with time zone awareness
$table->timestamp('timestamp_column'); // Stores date and time, often used for tracking created/updated times
$table->timestampTz('timestamp_tz_column'); // Time-stamped with time zone support

$table->year('year_column');
$table->softDeletes(); // Adds a deleted_at timestamp column
```

### Binary Types
Doppar migration defines several binary and BLOB (Binary Large Object) column types to handle various sizes of binary data:
```php
// Standard Binary:
$table->binary('binary_column'); // Creates a BLOB column suitable for storing small binary data (up to 65,535 bytes). 

// Extended BLOB Types (MySQL-specific):
$table->tinyBlob('tiny_blob_column'); // Stores up to 255 bytes.
$table->blob('blob_column'); // Stores up to 65,535 bytes.
$table->mediumBlob('medium_blob_column'); // Stores up to 16 MB.
$table->longBlob('long_blob_column'); // Stores up to 4 GB
```

### Special Types
Doppar migration utilizes several specialized column types to handle unique data requirements:
```php

// Defines a column with a set of predefined string  values. Commonly used for status indicators or categorical data.
$table->enum('enum_column', ['active', 'pending', 'cancelled']); 

// Allows storage of multiple values from a predefined list in a single column.
$table->set('set_column', ['red', 'green', 'blue']);

$table->uuid('uuid_column'); // Creates a column to store Universally Unique Identifiers (UUIDs).

$table->ipAddress('ip_address_column'); // Stores IPv4 and IPv6 addresses.
$table->macAddress('mac_address_column'); // Stores MAC addresses. Typically stored as strings in the format 00:00:00:00:00:00
$table->json('json_column'); // Stores JSON-formatted data. Supported in MySQL 5.7+
```

### Spatial Types (GIS)
Doppar migration utilizes several specialized column types to handle geospatial data, enabling advanced geographical queries and operations:
```php
$table->geometry('geometry_column'); // Stores any type of geometry data.
$table->point('point_column'); // Represents a single location in coordinate space (latitude and longitude).
$table->lineString('line_string_column'); // Stores a sequence of points forming a continuous line.
$table->polygon('polygon_column'); // Defines a shape consisting of multiple points forming a closed loop.
$table->geometryCollection('geometry_collection_column'); // Stores a collection of geometry objects.
$table->multiPoint('multi_point_column'); // Stores multiple point geometries.
$table->multiLineString('multi_line_string_column'); // Stores multiple linestring geometries.
$table->multiPolygon('multi_polygon_column'); // Stores multiple polygon geometries.
```

### Determining Whether a Table Exists
You can determine whether or not a table exists by using the `hasTable()` method.
```php

use Phaseolies\Support\Facades\Schema;

public function up()
{
    if (Schema::hasTable('users')) {
        // do something
    }
}
```

### Dropping a Table
Tables can be dropped quite easily using the `drop()` method.
```php

use Phaseolies\Support\Facades\DB;

DB::table('users')->drop()
```

### Truncate a Table
Tables can be Truncated easily using the `truncate()` method.
```php

use Phaseolies\Support\Facades\DB;

DB::table('users')->truncate()
DB::table('users')->truncate(true) // passing true mean force reset auto increment
```

### Enable Disable Foreign Key Constraints
You can easily disable and enable foreign key constraints using Schema facades by calling `disableForeignKeyConstraints()` method to disable and `enableForeignKeyConstraints()` method to enable like
```php

use Phaseolies\Support\Facades\Schema;

Schema::disableForeignKeyConstraints();
Schema::enableForeignKeyConstraints();
```

### Working With Foreign Keys
For creating foreign key constraints on your database tables. Let’s add a foreign key to an example table:
```php

use Phaseolies\Support\Facades\Schema;
use App\Models\User;

public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->foreignIdFor(User::class)->nullable();

        // or you can use like that
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
    })
}
```

In Doppar, when defining foreign key constraints within your migrations, you can specify actions to be taken when the 
referenced record is deleted. This ensures referential integrity and allows for automatic management of related records.

#### Setting Up CASCADE Actions
There are three primary ways to define `CASCADE` actions in Doppar migrations:
```php
public function up()
{
     // true for onDeleteCascade and true for onUpdateCascade
     $table->foreignIdFor(User::class, true, true);

     // Or
     $table->unsignedBigInteger('user_id');
     $table->foreign('user_id')
         ->references('id')
         ->on('users')
         ->onDelete('CASCADE');

     // Using the cascadeOnDelete Shortcut:
     $table->unsignedBigInteger('user_id');
     $table->foreign('user_id')
         ->references('id')
         ->on('users')
         ->cascadeOnDelete();
}
```

You can also use this method `cascadeOnDelete()`, `restrictOnDelete()`, `nullOnDelete()`, `cascadeOnUpdate()`, 
`restrictOnUpdate()`, `nullOnUpdate()`.

### Refreshing Migrations
The `php pool migrate:fresh` command is a powerful tool in Doppar that allows you to reset and re-run all your 
migrations. This is particularly useful during development when you need to rebuild your database schema without manually rolling back and reapplying each migration.

#### What It Does
When you run:
```php
php pool migrate:fresh
```
Doppar performs the following actions
- Rolls back all existing migrations by executing the down() methods.
- Re-runs all migrations by executing the up() methods

This process effectively rebuilds your entire database schema.

<a name="section-34"></a>

### Database Seeder
No you know that seeder is the most important thing when you develop a web application. Doppar support Database 
Seeding. Doppar includes the ability to seed your database with data using seed classes. All seed classes are stored 
in the `database/seeders` directory. To create a Seeder class, run this command
```php
php pool make:seeder UserSeeder
```
Now it will generate a file like
```php
<?php

namespace Database\Seeders;

use Phaseolies\Database\Migration\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
    }
}

```

Now you can seed data from this class by updating run method. You can update run method like
```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Phaseolies\Database\Migration\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => bcrypt('password')
        ]);
    }
}
```

Remember that `fake()` is a global helper function, so you can use it in your entire application where you want.

### Run The Seed
To run the database seeder, there is also pool console command. Run this command to seed database
```bash
php pool db:seed // it will seed all seeder class
php pool db:seed UserSeeder // It will only seed UserSeed class
```

<a name="section-35"></a>

## Hashing Configuration
The `config/hashing.php` file in Doppar allows you to configure password hashing for your application. This configuration determines the algorithm used to securely store user passwords.

**Key Configuration Options:**

* **`driver`**:
    * This option specifies the default hashing algorithm to be used.
    * Doppar supports the following drivers:
        * `bcrypt`: A widely used and secure hashing algorithm.
        * `argon`: A modern and secure hashing algorithm.
        * `argon2id`: The most modern and recommended argon variant.
    * **Default:** `argon2id` (recommended).

* **`bcrypt`**:
    * This section configures options for the `bcrypt` hashing algorithm.
    * **`rounds`**:
        * Controls the number of rounds used in the bcrypt hashing process.
        * Higher rounds increase the time taken for hashing, making it more secure but also slower.
        * The value is read from the `BCRYPT_ROUNDS` environment variable, with a default of 10.
        * Configure this value in your `.env` file.

* **`argon`**:
    * This section configures options for the `argon` hashing algorithm.
    * **`memory`**:
        * Specifies the amount of memory (in kilobytes) used by the argon hashing algorithm.
        * Increasing this value enhances security but increases memory usage.
        * **Default:** `65536`
    * **`threads`**:
        * Specifies the number of threads used by the argon hashing algorithm.
        * Increasing this value can speed up the hashing process on multi-core systems.
        * **Default:** `1`
    * **`time`**:
        * Specifies the number of iterations for the argon hashing algorithm.
        * Increasing this value increases the time taken for hashing, making it more secure.
        * **Default:** `4`

**Usage:**

* To change the default hashing driver, modify the `driver` option in the `config/hashing.php` file.
* To customize the bcrypt rounds, set the `BCRYPT_ROUNDS` environment variable in your `.env` file.
* To change the argon configuration, modify the 'argon' array in the `config/hashing.php` file.

Now we you create hash password using `bcrypt()` or direct calling `Hash::make()` method.
```php
$hashedValue = bcrypt('bcrypt');
$hashedValue // "$2y$10$gtr.qSIRWTDh7uh9ubj5duC0/KwQJcwZ0.KpFPOPzeRClpwo2FRSa"
```
### Hash Facades
We can create hash password using `Hash::make()` method.

```php
use Phaseolies\Support\Facades\Hash;

$hashedValue = Hash::make('password');
$hashedValue // "$2y$10$qcxCuljWvI7e1A5ah6axl.qgNsVoNw3ad8HSDFRmnVxyzIoj5/x8m"
```

### Checking Hash
If you want to check hash data, you need to use `check` method
```php
use Phaseolies\Support\Facades\Hash;

if (Hash::check('plainText', 'hashedValue')) {
    // Password matched
}
```

### Determining if a Password Needs to be Rehashed
Check if a password hash needs rehashing (security upgrade). The needsRehash method provided by the Hash class allows you to determine if the work factor used by the hasher has changed since the password was hashed. Some applications choose to perform this check during the application's authentication process:
```php
if (Hash::needsRehash($hashed)) {
    $hashed = Hash::make('plain-text');
}
```

<a name="section-36"></a>

## Authentication
Doppar provides built-in authentication features, simplifying user login and logout processes. This section details how to use these features within your application. To generate authentication, Doppar provides a `make:auth` command. 
```bash
php pool make:auth
```

This command will generate authentication for you. Let's look up the authentication features code.


### Login Functionality

Doppar's authentication system allows you to easily verify user credentials and establish a login session. Doppar provides `Phaseolies\Support\Facades\Auth` to create authentication functionalitis

**Implementation:**

1.  **Controller Setup:**
    * Use the `Phaseolies\Support\Facades\Auth` to access authentication methods.

2.  **Login Method:**
    * Utilize the `sanitize` method to validate and sanitize user input (e.g., email and password).
    * Call the `Auth::try()` method, passing the validated credentials (`$request->passed()`).
    * If `Auth::try()` returns `true`, the user is successfully logged in.
y you will get login and logout features. To do login
```php
<?php

namespace App\Http\Controllers\Auth;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->sanitize([
            'email' => 'required|email|min:2|max:100',
            'password' => 'required|min:2|max:20',
        ]);

        if (Auth::try($request->passed())) {
            // User is logged in
        }
    }
}

```

### Auth Via Remember Me
If you want to create auth using remember me, then you just need to pass, true as the second parameter in try method like
```php
if (Auth::try($request->passed(), true)) {
    // User is logged in
}
```

### Auth using login()
If you want to create auth using user object, then you just need to pass the use object, like
```php
if (Auth::login($user)) {
    // User is logged in
}
```

You can also use login() via `remember_token` by passing true as the second argument.
```php
if (Auth::login($user, true)) {
    // User is logged in with remember_token token
}
```
### Auth using loginUsingId()
This method logs in a user persistently, meaning the authentication is stored in the `session`.
```php
if (Auth::loginUsingId($user->id)) {
    // User is logged in
}
```

### Auth using onceUsingId()
This method logs in a user for a single request only, meaning authentication is not stored in the `session` or `cookies`.
```php
if (Auth::onceUsingId(1)) {
    // User is logged in
}
```

### Custom Authentication Key
In some applications, authentication is not based on email but instead uses a `mobile number` or `username`. By default, Doppar uses `email` and `password` for authentication. However, you can change this behavior by overriding the `getAuthKeyName()` method in your `User` model.
#### How to Customize the Authentication Key
To switch from `email-based authentication` to `username-based authentication`, override the getAuthKeyName() method in your model:

```php
/**
 * Get the authentication key name used for identifying the user.
 * @return string
 */
public function getAuthKeyName(): string
{
    return "username"; // set any key for authentication like phone
}
```
Now, instead of logging in with an `email`, Doppar will use the `username` field for authentication.

### Get Authenticated User Data
To get the current authenticated user data, Doppar has `Auth::user()` method and `auth()` helper. Simply call
```php
Auth::user(); // Current authenticated user data
auth()->user() // Current authenticated user data using auth() helper

// or you can use
$request->user();

// or you can use also request() helper
request()->user();

// or you can use also auth() helper
request()->auth();
```

### Logout
To destroy user session, simply call `logout` function.
```php
<?php

namespace App\Http\Controllers\Auth;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function logout()
    {
        Auth::logout(); // User login session is now destroyed
    }
}

```
<a name="section-37"></a>

## Mail Configuration
Doppar provides a convenient way to setup your mail configuration. Doppar currently support only `smtp` driver for mail configuration. Need to update `.env`'s mail configuration before starting with mail features. Doppar usage `PHPMailer` tp send mail.
```
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Now you can check also mail related configuration from `config/mail.php` file. Remember, if you update, `config/mail.php` file, don't forget to clear your system cache.
```bash
php pool cache:clear // to clear the cache
php pool config:cache // to cache again
```

Now if you setup with your `smtp` mail credentials, now you are ready to go.

<a name="section-38"></a>

## Sending Mail
When building Doppar applications, each type of email sent by your application is represented as a "mailable" class. These classes are stored in the `app/Mail` directory. Don't worry if you don't see this directory in your application, since it will be generated for you when you create your first mailable class using the `make:mail` Pool command:
```bash
php pool make:mail InvoicMail
```

### Configuring the Sender
You specify a global "`from`" address in your `config/mail.php` configuration file. This address will be used to send mail.
```
'from' => [
    'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
    'name' => env('MAIL_FROM_NAME', 'Example'),
],
```

### Configuring the Subject
By time to time, every Mail has a subject. Doppar allows you to define a Mail subject in a very convenient way. To define Mail subject, just need to update the subject method from your mailable class.
```php
/**
 * Define mail subject
 * @return Phaseolies\Support\Mail\Mailable\Subject
 */
public function subject(): Subject
{
    return new Subject(
        subject: 'New Mail'
    );
}
```

### Configuring the View
Within a mailable class's content method, you may define the view, or which template should be used when rendering the email's contents. Since each email typically uses a Blade template to render its contents, you have the full power and convenience of the Blade templating engine when building your email's HTML:
```php
/**
 * Set the message body and data
 * @return Phaseolies\Support\Mail\Mailable\Content
 */
public function content(): Content
{
    return new Content(
        view: 'Optional view.name'
    );
}
```

If you want to pass the data without views, you can pass string or array data.
```php
public function content(): Content
{
    return new Content(
        data: [
           'order_status' => true
        ]
    );
}
```

Even you can send mail without passing any data to Content. Suppose you just want to pass attachment only. you can do in this case, just make content empty.
```php
public function content(): Content
{
    return new Content();
}
```

### Complete Example of Sending Mail
Doppar provides `to` and `send` method primaritly to send a basic mail. You can use `Phaseolies\Support\Facades\Mail` call to handle mail functionalities.
```php
<?php

namespace App\Http\Controllers;

use Phaseolies\Support\Facades\Mail;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;

class OrderController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        $data = [
            'order_status' => 'success',
            'invoice_no' => '123-123'
        ];

        Mail::to($user)->send(new InvoiceMail($data));

        // or you can send mail by passing only mail address
        Mail::to('recipient@example.com')->send(new InvoiceMail($data));

        // also by passing name as the second argument
        Mail::to('recipient@example.com', 'recipient_name')->send(new InvoiceMail($data));
    }
}
```

Now update your `InvoiceMail` mailable class like
```php
<?php

namespace App\Mail;

use Phaseolies\Support\Mail\Mailable\Subject;
use Phaseolies\Support\Mail\Mailable\Content;
use Phaseolies\Support\Mail\Mailable;

class InvoiceMail extends Mailable
{
    public function __construct(protected $data) {}

    public function subject(): Subject
    {
        return new Subject(
            subject: "Order Shipped Confirmation"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order.invoice', // 'resources/views/emails/order/invoice.blade.php'
            data: $this->data // Passing data will be available in invoice.blade.php, access it via {{ $data }}
        );
    }

    public function attachment(): array
    {
        return [];
    }
}
```

<a name="section-39"></a>

## Sending Mail with Attachment
To send mail with attachment, you have to pass data attachment path using `attachment` method.
```php
public function attachment(): array
{
    return [
        storage_path('invoice.pdf') => [
            'as' => 'rename_invoice.pdf', // The file will be sent using this name
            'mime' => 'application/pdf',  // file mime types
        ]
    ];
}
```

### Multiple Attachments with Mime Types
You can also send mail with multiple attachment. Just pass your file arrays in the attachment method like
```php
public function attachment(): array
{
    return [
        storage_path('invoice_1.pdf') => [
            'as' => 'invoice_3.pdf',
            'mime' => 'application/pdf',
        ],
        storage_path('invoice_2.pdf') => [
            'as' => 'invoice_3.pdf',
            'mime' => 'application/pdf',
        ],
        storage_path('invoice_3.pdf') => [
            'as' => 'invoice_3.pdf',
            'mime' => 'application/pdf',
        ],
    ];
}
```

Here both `as` and `mime` is optional, you can simply send email attachment like
```php
public function attachment(): array
{
    return [
        storage_path('invoice_1.pdf'),
        storage_path('invoice_2.pdf'),
        storage_path('invoice_3.pdf')
    ];
}
```
<a name="section-40"></a>
## Sending Mail with CC and BCC
You are not limited to just specifying the "to" recipients when sending a message. You are free to set "to", "cc", and "bcc" recipients by chaining their respective methods together:
```php
use Phaseolies\Support\Mail\Mail;

Mail::to($request->user())
    ->cc($moreUsers)
    ->bcc($evenMoreUsers)
    ->send(new OrderShipped($order));
```

<a name="section-42"></a>
## File Storage
Doppar's filesystem configuration file is located at `config/filesystems.php`. Within this file, you may configure all of your filesystem "`disks`". Each disk represents a particular storage driver and storage location. Example configurations for each supported driver are included in the configuration file so you can modify the configuration to reflect your storage preferences and credentials.

You may configure as many disks as you like and may even have multiple disks that use the same driver. But if you change any of your configuration, and that is not wokring, please clean the application configuration by running the command `config:clear`.

## The Local Driver
When using the local driver, all file operations are relative to the root directory defined in your filesystems configuration file. By default, this value is set to the `storage/app/` directory. Therefore, the following method would write to `storage/app/example.txt`.

```php
use Phaseolies\Support\Facades\Storage;

Storage::disk('local')->store($request->file('file'));
```

## The Public Disk
The public disk included in your application's filesystems configuration file is intended for files that are going to be publicly accessible. By default, the public disk uses the local driver and stores its files in `storage/app/public`.

If your public disk uses the local driver and you want to make these files accessible from the web, you should create a `symbolic link` from source directory `storage/app/public` to target directory `public/storage`:

To create the symbolic link, you may use the `storage:link` Pool command:
```bash
php pool storage:link
```

Once a file has been stored and the symbolic link has been created, you can create a URL to the files using the `enqueue` helper:
```php
echo enqueue('storage/file.txt');
```

<a name="section-43"></a>
## File Upload
To upload file, you can use `Phaseolies\Support\Facades\Storage` facades or you can use direct file object. To upload a image using Storage facades

```php
use Phaseolies\Support\Facades\Storage;

Storage::disk('public')->store('profile', $request->file('file'));
```

This will store file into `storage/app/public/profile` directory. here `profile` is the directory name that is optional. If you do not pass `profile`, it will storage file to its default path like `storage/app/public`. You can also uploads file into `local` disk that is a private directory.

```php
use Phaseolies\Support\Facades\Storage;

Storage::disk('local')->store('profile', $request->file('file'));
```

This will store file into `storage/app/profile` directory. here `profile` is the directory name that is optional. If you do not pass `profile`, it will storage file to its default path like `storage/app`. You can also uploads file into `local` disk that is a private directory.

### Upload with custom file name
If you want to upload file using your customize file name, then remember, `store()` third parameter as `$fileName`. see the example

```php
$file = uniqid() . '_' . $request->file('file')->getClientOriginalName();

Storage::disk('local')->store('profile', $request->file('file'), $file);
```

### Get the uploaded File
Now if you want to get the uploaded file path, simply you can use `get()` method
```php
return Storage::disk('local')->get('profile.png'); // it will return the file path
```

### Get the uploaded file contents
To get the uploaded file contents, you can call `contents()` method, like
```php
return Storage::disk('local')->content('product/product.json');
```

### Delete file
To delete file from storage disk, you can call `delete()` method
```php
return Storage::disk('local')->delete('product/product.json');
```

### Upload File Except Storage
You can upload file any of your application folder. Doppar allows it also. To upload file without `Storage` facades, 
```php
$request->file('file')->store('product');
```

Now your file will be stored in profuct directory inside storage folder. You can also use the `storeAs` method by passing your custom file name. 
```php
$request->file('file')->storeAs('product-cart', 'my_customize_file_name');
```
Now your file will be stored in `product-cart` directory with the name of `my_customize_file_name`. You can also pass callback with `storeAs` method like
```php
$admin = 0;
$request->file('file')->storeAs(function ($file) use ($admin) {
    if (! $admin) {
        return true;
    }
}, 'product-cart', 'file_name');
```
You can also use `move` method to upload your file.
```php
$file = $request->file('invoice');
$file->move($destinationPath, $fileName)
```

### File Downloads
The download method generates a response that triggers a file download in the user’s browser. It takes the file path as its primary argument. Optionally, you can specify a custom download filename as the second argument—this overrides the default name seen by the user. Additionally, an array of custom HTTP headers can be passed as a third argument for further control over the download behavior.
```php
return response()->download($pathToFile);

return response()->download($pathToFile, $name, $headers);
```
### File Responses
The file method may be used to display a file, such as an image or PDF, directly in the user's browser instead of initiating a download. This method accepts the absolute path to the file as its first argument and an array of headers as its second argument:
```php
return response()->file($pathToFile);

return response()->file($pathToFile, $headers);
```

### Streamed Responses
Streaming data to the client as it is generated can greatly reduce memory usage and enhance performance, particularly for extremely large responses.
```php
public function streamedContent(): \Generator
{
    yield 'Hello, ';
    yield 'World!';
}

return response()->stream(function (): void {
    foreach ($this->streamedContent() as $chunk) {
        echo $chunk;
        ob_flush();
        flush();
        sleep(2); // Simulate delay between chunks...
    }
}, 200, ['X-Accel-Buffering' => 'no']);
```

### Streamed JSON Responses
To stream JSON data incrementally, you can use the `streamJson` method. This is particularly beneficial for large datasets that need to be sent progressively to the browser in a format that JavaScript can easily parse
```php
return response()->streamJson([
    'users' => User::all(),
]);
```

<a name="section-49"></a>

## Helpers
Doppar provides a collection of global helper functions in PHP. While many of these functions are integral to the framework’s internal operations, they are also available for use in your own projects whenever they prove useful.

### env()
The `env()` function in Doppar is used to retrieve environment variables from the application's configuration. It allows you to define environment-specific settings in a .env file and access them throughout your application. If the specified variable is not found, you can provide a default value as a fallback.
```php
$databaseHost = env('DB_HOST', 'localhost');
```
In this example, `DB_HOST` is fetched from the environment file, and if it's not set, 'localhost' is returned as the default.

### app()
The `app()` function provides access to the service container instance in thouht it return the `Application` instance of Doppar. It can be used to resolve dependencies, retrieve bound services, or access the container itself.
```php
$app = app(); // This returns the global Application instance.
```
But if your pass a class like
```php
$logger = app(Logger::class); // This fetches an instance of Logger.
```
You can Resolve a service with parameters as well
```php
$service = app(MyService::class, ['param1' => 'value']);
```
This retrieves `MyService` while passing custom parameters. This function simplifies dependency injection, making it easier to manage and access services within the application.

### url()
The `url()` function is a convenient helper for creating a new instance of the UrlGenerator class, which is responsible for handling urls in Doppar. By calling this function, you can easily manage urls.
```php
 return url()
    ->to('/profile')
    ->withQuery('foo=bar&baz=qux') // you can pass here array also like ['foo' => 'bar', 'baz' => 'qux']
    ->withFragment('about')
    ->withSignature(3600)
    ->setSecure(true)
    ->make();

// it will generate url like that
// http://example.com/profile?foo=bar&baz=qux&expires=1742923201&signature=2cd1656d3557f64a433de7dcb01abbb64c2dc9daa85983b8dad88f8ac732a935#about
```

You can also generate url by passing parameters like
```php
url('/profile'); // http://example.com/profile

url()->to('profile')->make(); // http://example.com/profile

url('profile', ['id' => 123]); http://example.com/profile?id=123
```

### Full URL and Current URL
If you need to get the `full` url and `current` url, you can follow this
```php
url()->full(); // it will return url with query string
url()->current(); // it will return url without query string
```
### Base URL
You can get the application base url like
```php
url()->base(); // you can also do it base_url('/foo') -> http://example.com/foo
```

### Route URL
You can also create URL from the route name.
```php
Route::get('/home', [HomeController::class, 'home'])->name('dashboard');

url()->route('dashboard'); // here dashboard is the route name
```

### Signed URL
You can generate signed url like that
```php
url()->signed('dashboard') // http://example.com/dashboard?expires=1742924701&signature=403e835e62dd107314167399cb04a4a50897467c5248c3059a5e53f7388d0760
```

### URL with Secure HTTPS
You can also generate url with https by calling `setSecure()` method like
```php
url()->setSecure(true)->signed('dashboard');
// https://example.com/dashboard?expires=1742924773&signature=e92792a28fe270e3539a297d452a5856fd1787a24ed65ea65a87ee333f068086
```

### Check Valid URL
You can check a URL is valid or not using `isValid()` method like
```php
url()->isValid('example.com');
```

### request()
The `request()` function is a convenient helper for creating a new instance of the Request class, which is responsible for handling HTTP requests in Doppar. By calling this function, you can easily access the incoming request data, such as `GET`, `POST` parameters, `headers`, `cookies`, and more.
```php
$request = request();
```
This returns a new instance of the Request class, allowing you to interact with the current HTTP request. To access the request data, such as retrieving a query parameter:
```php
$name = request()->query('name');
```
This function simplifies the process of working with HTTP requests by providing direct access to the request object, streamlining data retrieval and manipulation.

### More Usage
```php
request('key', 'default');
```
- Retrieves the value of key from the current request.
- Returns 'default' if the key does not exist.

### Example:
```php
$name = request('name', 'Guest'); // Returns the 'name' from the request or 'Guest' if not set
```

You can do the same thing using `request()` object like
```php
$name = request()->input('name', 'Guest'); // as request object
```

### response()
The `response()` function in Doppar is a helper used to generate and return HTTP response instances. It provides a flexible way to create a response, whether it’s with content or just an empty response, and allows setting the HTTP status code and headers.
```php
return response('Hello, World!', 200, ['Content-Type' => 'text/plain']);
```
Create a response without content (just a status and headers):
```php
return response(null, 404);
```
Create a response factory when no arguments are passed:
```php
$responseFactory = response();
```
If no arguments are passed, the function returns a ResponseFactory instance, which can be used to generate responses later.

### view()
The `view()` function in Doppar is a helper used to render a view with the given data and return a response containing the rendered content. It simplifies the process of rendering views and sending them as HTTP responses, while also allowing you to add custom headers if needed.
```php
return view('home', ['name' => 'John']);
```
This renders the home view, passing the data array ['name' => 'John'] to the view and returning a response with the rendered content. as third parameters, it accept headers also
```php
return view('welcome', ['user' => 'Alice'], ['X-Custom-Header' => 'Value']);
```
This function provides a simple way to return rendered views as HTTP responses, while also giving you the flexibility to set custom headers and pass data to the views.

### redirect()
The `redirect()` function in Doppar is a helper for creating and returning HTTP redirects. It simplifies the process of redirecting the user to a different URL, optionally with a specific HTTP status code, headers, and security (HTTPS) settings.
```php
return redirect('/home');
```
Redirect with headers and security (HTTPS):
```php
return redirect('/profile', 302, ['X-Redirect-Notice' => 'Redirecting...'], true);
```
Get the redirect instance without redirection (factory usage):
```php
$redirect = redirect();
```
If no arguments are provided, it returns the RedirectResponse instance, which can be used to perform redirects later. This helper function streamlines the process of handling HTTP redirects in doppar application, providing flexibility for status codes, headers, and security options.

### back()
The `back()` function in Doppar is a helper used to create a redirect response to the previous location (the referring page), which is commonly used for scenarios like redirecting a user back after a form submission or an action that requires them to return to where they were.
```php
return back();
```
This redirects the user back to the previous location using the default status code (302). A RedirectResponse instance, which will redirect the user either to the previous location or the fallback location.
```php
// Redirect back with default 302 status
return back();

// Redirect back with a custom status code and headers
return back(301, ['Cache-Control' => 'no-store']);

// Redirect back with a fallback URL if the referer is not available
return back(302, [], '/home');
```
### session()
The `session()` function in Doppar is a helper used to interact with the session data. It provides a convenient way to retrieve, set, or manage session data. This helper simplifies working with sessions by abstracting some of the underlying complexities and making session data access more straightforward.
```php
$value = session('user_id');
```
This retrieves the value stored in the session under the key 'user_id'. 
```php
// Retrieve session value for 'user_id'
$userId = session('user_id');

// Set session value for 'user_id'
session('user_id', 123);

// Retrieve session value with a default fallback
$username = session('user_name', 'Guest');

// Store multiple session values at once
session(['user_id' => 123, 'user_name' => 'John']);

// Access the entire session instance
$session = session();
```

### cookie()
The cookie() function is a helper designed to interact with HTTP cookies in Doppar. It allows you to retrieve, create, and manage cookies within your application. Cookies are used to store small pieces of data on the user's browser, such as session identifiers, authentication tokens, or user preferences.
#### Example
```php
// Access the entire cookie instance
$cookie = cookie();

// Store cookie values
cookie()->store('cookie_name', 'cookie_value');

// Get cookie value
cookie()->get('cookie_name', 'default');
```

### csrf_token()
The `csrf_token()` function is a helper designed to fetch the CSRF (Cross-Site Request Forgery) token from the session. CSRF tokens are used to protect forms from malicious attacks by ensuring that the request originates from the intended user and not from a potential attacker.
```php
$token = csrf_token();
```
### bcrypt()
The `bcrypt()` function is a helper designed to hash a plain text password using the Bcrypt hashing algorithm. This function is commonly used in authentication systems to store passwords securely by converting them into a hashed value that cannot be easily reversed.
```php
$hashedPassword = bcrypt('myPlainTextPassword');
```
### old()
The `old()` function is a helper used to retrieve the old input value for a given key from the session. This is particularly useful in scenarios like form validation, where you want to repopulate form fields with the user's previously entered data after a validation failure.
```php
$value = old('email');
```
This will return the previously entered value for the input field with the key `email`, or null if no old value is found.
#### Example
```html
// Example in a form input field
<input type="text" name="username" value="{{ old('username') }}">

// If the user previously entered 'john_doe' and the form was submitted with errors,
// the input field will be repopulated with 'john_doe' after the validation failure.
```

### fake()
The `fake()` function is a helper designed to create and return an instance of the Faker generator, which is used to generate fake data. This can be particularly useful for seeding a database with random data, testing, or generating sample data for development purposes.
```php
$faker = fake();
$name = $faker->name;
$email = $faker->email;
```
### route()
The `route()` function is a helper used to generate a full URL for a named route. It allows you to easily create links to specific routes in your application based on their name and any parameters they might require.
```php
$url = route('route.name', ['parameter1' => 'value1']);
```
This will return the full URL for the named route route.name, replacing any required parameters with the provided values.
#### Example
```php
// If you have a route named 'file' with a parameter 'id' in your routes file:
Route::get('/file/1', [FileController::class, 'index'])->name('file');
$url = route('file',1);
// The result might be something like 'http://example.com/file/1'
```

### config()
The `config()` function is a helper used to retrieve configuration values by key. It allows you to access values from the configuration files in your application, providing a centralized way to manage various settings.
```php
$value = config('app.name');
```
This retrieves the value associated with the `app.name` configuration key.
#### Example
If you have a configuration file `config/app.php` with the following content:
```php
return [
    'name' => 'My Application',
    'env' => 'local',
    'timezone' => 'UTC',
];
```
You can retrieve the value like this:
```php
$timezone = config('app.timezone', 'America/New_York'); // 'UTC'
```
If the key doesn’t exist, and you provide a default value:

### is_auth()
The `is_auth()` function is a helper used to check if a user is authenticated (i.e., logged in). It allows you to easily determine whether the current user has been authenticated through the application's authentication system.
```php
if (is_auth()) {
    // The user is logged in
} else {
    // The user is not logged in
}
```
### base_path()
The `base_path()` function is a helper used to retrieve the base path of the application, with an optional path appended to it. It provides an easy way to get the root directory of your application, and optionally append additional subdirectories or files to the base path.
```php
// Get the base path of the application
$basePath = base_path(); // /var/www/html/doppar

// Get the base path with a specific subdirectory or file
$fullPath = base_path('storage/logs'); // /var/www/html/doppar/storage/logs
```
### base_url()
The `base_url()` function is a helper that retrieves the base URL of the application, with an optional path appended to it. This function is used to generate the full URL to your application, considering both the environment (e.g., local development, production) and any given subpath.
```php
// Get the base URL of the application
$baseUrl = base_url();

// Get the full URL with a specific path
$fullUrl = base_url('images/logo.png'); // http://example.com/images/logo.png
```

### storage_path()
The `storage_path()` function is a helper that retrieves the storage path of the application, with an optional path appended to it. This function is used to generate the full path to the storage directory of your application, allowing you to easily access or store files in a consistent manner.
```php
// Get the base storage path
$storagePath = storage_path();

// Get the full storage path with a specific subdirectory or file
$fullPath = storage_path('uploads/images/logo.png');
```

### public_path()
The `public_path()` function is a helper that retrieves the public path of the application, with the option to append a specific path to it. This function is useful for determining the full path to the public directory of your application, enabling easier access to publicly accessible resources, such as assets, uploaded files, and other public files.
```php
// Get the base public path
$publicPath = public_path();

// Get the full public path with a specific subdirectory or file
$fullPath = public_path('images/logo.png');
```

### resource_path()
The `resource_path()` function is a helper that retrieves the application's resource path, with an optional ability to append a specific subdirectory or file path. This function is particularly useful when dealing with application resources such as views, language files, and configuration files that are stored in the resources directory.
```php
// Get the base resources path
$resourcesPath = resource_path();

// Get the full resources path with a specific subdirectory or file
$fullPath = resource_path('views/layouts/app.blade.php');
```

### config_path()
The `config_path()` function is a helper that retrieves the configuration path of the application, with an optional path appended to it. This function is used to generate the full path to the configuration directory of your application, allowing you to easily access or store configuration files in a consistent manner.
```php
// Get the base config path
$configPath = config_path();

// Get the full config path with a specific subdirectory or file
$fullPath = config_path('app.php');
```

### database_path()
The `database_path()` function is a helper designed to retrieve the application's database path, with the ability to append a specific subdirectory or file path if necessary. This function is particularly useful for accessing the database configuration, migration files, and other database-related files that are stored within the database directory.
```php
// Get the base database path
$databasePath = database_path();

// Get the full database path with a specific subdirectory or file
$fullPath = database_path('migrations/');
```
### enqueue()
The `enqueue()` function is a helper designed to generate the URL for assets (such as CSS, JavaScript, images, etc.) located in the public directory of the application. This function allows you to generate a full URL for assets, either with or without a secure (HTTPS) scheme, depending on the provided parameters.
```php
// Generate the URL for a public asset (e.g., CSS, JS, image)
$assetUrl = enqueue('assets/css/styles.css');

// Generate the URL for a public asset with a secure (HTTPS) scheme
$secureAssetUrl = enqueue('assets/js/app.js', true);
```
Generating a Secure (HTTPS) URL for a JavaScript File: If you want to load a JavaScript file over HTTPS:
```php
$jsUrl = enqueue('assets/js/app.js', true);
```

### abort()
The `abort()` function is a helper that allows you to immediately stop the current request and return an HTTP response with a specific status code and an optional message. This is particularly useful for handling error scenarios or preventing further processing when a certain condition is met.
```php
// Abort with a 404 Not Found status and an optional message
abort(404, 'Page not found');

// Abort with a 500 Internal Server Error status and a custom message
abort(500, 'Something went wrong on the server');
```
### abort_if()
The `abort_if()` function is a helper designed to automatically abort the request and send a specific HTTP status code with an optional message when a condition is true. It provides a shorthand way to handle conditional error situations and terminate the request early if a specific condition is met.
```php
// Abort the request if a condition is true
abort_if($userNotAuthenticated, 401, 'Unauthorized access');

// Abort the request if a file does not exist
abort_if(!file_exists($filePath), 404, 'File not found');
```
## String Helper function
Doppar provides a collection of global string helper functions in PHP. While many of these functions are integral to the framework’s internal operations, they are also available for use in your own projects whenever they prove usefull. All the string function, you can access it via global `str()` function or you can use `Phaseolies\Support\Facades\Str` facades

### mask()
The `mask()` function is a helper designed to mask parts of a given string while keeping a specified number of characters visible at the start and the end. This can be useful for hiding sensitive information (like credit card numbers, emails, or phone numbers) while displaying a portion of it for the user to verify.
```php
use Phaseolies\Support\Facades\Str;

// Mask a credit card number except for the last four digits
$maskedCard = str()->mask('1234 5678 9876 5432', 4, 4, '*');
$maskedCard = Str::mask('1234 5678 9876 5432', 4, 4, '*');

// Mask a phone number except for the first three and last four digits
$maskedPhone = str()->mask('123-456-7890', 3, 4, '#');
$maskedPhone = Str::mask('123-456-7890', 3, 4, '#');
```
### Example
Masking Credit Card Numbers: To display only the last 4 digits of a credit card number for security reasons, you can use the mask() function:
```php
$maskedCard = str()->mask('1234 5678 9876 5432', 4, 4); // Output: 1234 ******** 5432
```
Masking Phone Numbers: For masking a phone number except for the first 3 and last 4 digits:
```php
$maskedPhone = str()->mask('123-456-7890', 3, 4, '#'); // Output: 123-###-7890
```
Masking Email Addresses: To hide part of an email address except for the first and last characters:
```php
$maskedEmail = str()->mask('john.doe@example.com', 1, 1); // Output: j********e.com
```

### truncate()
The `truncate()` function is a helper designed to truncate a string to a specified maximum length. If the string exceeds this length, it appends a suffix (such as ellipsis ...) to indicate that the string has been shortened.
```php
$shortDescription = str()->truncate('This is a long description that should be shortened for previews.', 30, '... Read More');
$shortDescription = Str::truncate('This is a long description that should be shortened for previews.', 30, '... Read More');
// Output: "This is a long description... Read More"
```
### snake()
The `snake()` function is a helper designed to convert a camelCase string into a snake_case string. This is useful when you need to transform variable names, keys, or identifiers from camelCase (often used in programming) into snake_case (commonly used in database column names or URL routing).
```php
// Convert a camelCase string to snake_case
$snakeString = str()->snake('camelCaseString'); // Output: 'camel_case_string'
```
### camel()
The `camel()` function is a helper designed to convert a snake_case string into a camelCase string. This is useful when you need to transform variable names, keys, or identifiers from snake_case (commonly used in databases or file names) into camelCase (often used in programming languages like JavaScript and PHP for variable names).
```php
// Convert a snake_case string to camelCase
$camelString = str()->camel('snake_case_string'); // Output: 'snakeCaseString'
```

### random()
The `random()` function is a helper designed to generate a random alphanumeric string of a specified length. This is useful when you need to generate secure random tokens, passwords, or unique identifiers.
```php
// Generate a random alphanumeric string of default length 16
$randomString = str()->random(); // Output: 'a1B2c3D4e5F6g7H8'

// Generate a random alphanumeric string of a custom length (e.g., 8)
$randomString = str()->random(8); // Output: 'Xy7GzH8Q'
```
### isPalindrome()
The `isPalindrome()` function is a helper designed to check whether a given string is a palindrome. A palindrome is a word, phrase, or sequence that reads the same backward as forward (ignoring spaces, punctuation, and capitalization).
```php
// Check if a string is a palindrome
$isPalindrome = str()->isPalindrome('racecar'); // Output: true

// Check if a string is not a palindrome
$isPalindrome = str()->isPalindrome('hello'); // Output: false
```
### countWord()
The `countWord()` function is a helper designed to count the number of words in a given string. This is useful when you need to determine the word count of a sentence, paragraph, or any text input.
```php
// Count the number of words in a string
$wordCount = str()->countWord('This is a test sentence.'); // Output: 5

// Count the number of words in a string with punctuation
$wordCount = str()->countWord('Hello, world!'); // Output: 2
```
### Log Helpers
These are helper functions designed to simplify logging at different levels of severity. They utilize Doppar's built-in Log facade to log messages with various log levels. Each function accepts a payload (which can be any type of data) and logs it accordingly at the specified level.
```php
// Log an informational message
info('This is an info message.'); // Logs an info-level message

// Log a warning message
warning('This is a warning message.'); // Logs a warning-level message

// Log an error message
error('This is an error message.'); // Logs an error-level message

// Log an alert message
alert('This is an alert message.'); // Logs an alert-level message

// Log a notice message
notice('This is a notice message.'); // Logs a notice-level message

// Log an emergency message
emergency('This is an emergency message.'); // Logs an emergency-level message

// Log a critical message
critical('This is a critical message.'); // Logs a critical-level message

// Log a debug message
debug('This is a debug message.'); // Logs a debug-level message
```
### collect()
The `collect()` function is a helper designed to create a new instance of a Doppar Collection. It simplifies the process of creating and working with collections in your application. Collections allow you to work with arrays in a more expressive and fluent way, providing additional methods for filtering, transforming, and manipulating data.
```php
// Create a new collection with an array of items
$collection = collect([1, 2, 3, 4]); // Returns a Collection instance containing [1, 2, 3, 4]

// Create an empty collection
$emptyCollection = collect(); // Returns an empty Collection instance
```
### Example Usage
See some basic example of collection, how you can use it

### filter()
The `filter()` method allows you to filter a collection based on a given condition.

```php
$collection = collect([1, 2, 3, 4, 5, 6]);

// Filter to get only even numbers
$evenNumbers = $collection->filter(function ($value) {
    return $value % 2 === 0;
});

return $evenNumbers; // [2,4,6]
```
### map()
The map() method allows you to transform each item in the collection using a callback function.
```php
$collection = collect([1, 2, 3, 4]);

// Multiply each number by 2
$doubledNumbers = $collection->map(function ($value) {
    return $value * 2;
});

return $doubledNumbers;
```
### first()
The first() method retrieves the first item in the collection.
```php
// Create a collection of numbers
$collection = collect([10, 20, 30, 40]);

// Get the first item
$firstItem = $collection->first();

echo $firstItem; // Output: 10
```

### delete_folder_recursively()
The `delete_folder_recursively()` function is a helper designed to delete a folder and all its contents, including subfolders and files. It performs a recursive deletion, ensuring that every file and folder inside the target folder is deleted before the folder itself is removed.
```php
// Delete a folder and its contents recursively
$result = delete_folder_recursively('/path/to/folder'); // Returns true on success, false on failure
```
### title()
The `title()` function is a helper designed to convert a given string into title case, where the first letter of each word is capitalized, and the rest of the letters are in lowercase. This is commonly used for formatting titles or headings.
```php
// Convert a string to title case
$title = str()->title("hello world"); // Returns "Hello World"
```

### slug()
The `slug()` function is a helper designed to generate a URL-friendly slug from a given string. A slug is typically used in URLs, where spaces and special characters are replaced with hyphens (or another separator), and all letters are converted to lowercase.
```php
// Generate a URL-friendly slug
$slug = str()->slug("Hello World!"); // Returns "hello-world"
```

The word separator used in the slug. By default, this is a hyphen (-), but you can specify another separator if needed.
```php
// Generate a URL-friendly slug with the default separator (hyphen)
$slug = str()->slug("Hello World!"); // Returns "hello-world"

// Generate a URL-friendly slug with a custom separator (underscore)
$slug = str()->slug("Hello World!", '_'); // Returns "hello_world"
```

### contains()
The `contains()` function is a helper designed to check if a given string (the haystack) contains another string (the needle), performing a case-insensitive search.
```php
// Check if a string contains another string (case-insensitive)
$contains = str()->contains("Hello World", "world"); // Returns true
```
### limitWords()
The `limitWords()` function is a helper designed to limit the number of words in a string. If the string contains more words than the specified limit, the function truncates the string and appends an optional ending suffix (such as ...).
```php
// Limit the number of words in a string
$truncatedString = str()->limitWords("This is a test string", 3); // Returns "This is a..."
```

The function returns the truncated string with a specified number of words and the optional suffix. If the string has fewer words than the specified limit, it remains unchanged.
```php
// Limit the number of words to 3, append "..."
$truncatedString = str()->limitWords("This is a test string", 3); // Returns "This is a..."

// Limit the number of words to 2, append custom suffix
$truncatedString = str()->limitWords("Hello there, how are you?", 2, '...more'); // Returns "Hello there...more"
```

### removeWhiteSpace()
The `removeWhiteSpace()` function is a helper designed to remove all whitespace characters (spaces, tabs, newlines, etc.) from a given string. This is useful when you need to clean up strings for processing or formatting purposes
```php
// Remove spaces from a string
$cleanedString = str()->removeWhiteSpace("Hello   World"); // Returns "HelloWorld"

// Remove all whitespace including tabs and newlines
$cleanedString = str()->removeWhiteSpace("Hello \tWorld\n"); // Returns "HelloWorld"
```

### uuid()
The `uuid()` function is a helper designed to generate a UUID v4 (Universally Unique Identifier), which is a random 128-bit value represented as a string. UUIDs are commonly used for generating unique identifiers in distributed systems, databases, and APIs.
```php
// Generate a UUID v4 string
$uuid = str()->uuid();
// or
$uuid = uuid(); // Returns something like "f47ac10b-58cc-4372-a567-0e02b2c3d479"
```

## startsWith()
The `startsWith()` function is a helper designed to check if a given string (the haystack) starts with another string (the needle). This check is case-sensitive.
```php
// Check if a string starts with a specific substring
$startsWith = str()->startsWith("Hello World", "Hello"); // Returns true
$startsWith = str()->startsWith("Hello World", "world"); // Returns false (case-sensitive)
```

### endsWith()
The `endsWith()` function is a helper designed to check if a given string (the haystack) ends with another string (the needle). This check is case-sensitive.
```php
// Check if a string ends with a specific substring
$endsWith = str()->endsWith("Hello World", "World"); // Returns true
$endsWith = str()->endsWith("Hello World", "world"); // Returns false (case-sensitive)
```

### studly()
The `studly()` function is a helper designed to convert a given string into StudlyCase (also known as PascalCase), where the first letter of each word is capitalized, and there are no spaces or underscores between words.
```php
// Convert a snake_case string to StudlyCase
$studlyString = studly("hello_world"); // Returns "HelloWorld"

// Convert a more complex string to StudlyCase
$studlyString = studly("convert_this_string_to_studly_case"); // Returns "ConvertThisStringToStudlyCase"
```

### everse()
The reverse() function is a helper designed to reverse the characters in a given string while correctly handling multi-byte characters (such as characters in non-Latin alphabets or special symbols). This ensures that characters are reversed properly, without corrupting multi-byte sequences.
```php
// Reverse a regular string
$reversedString = reverse("Hello World"); // Returns "dlroW olleH"
```

### extractNumbers()
The `extractNumbers()` function is a helper designed to extract all numeric digits from a given string. It removes any non-numeric characters, leaving only the digits.
```php
// Extract digits from a string containing letters and symbols
$numbers = str()->extractNumbers("Hello 123, World 456!"); // Returns "123456"

// Extract digits from a string with mixed content
$numbers = str()->extractNumbers("Price: $123.45, Discount: 10%"); // Returns "1234510"
```

### longestCommonSubstring()
The `longestCommonSubstring()` function is a helper designed to find the longest common substring shared between two given strings. A common substring is a contiguous sequence of characters that appears in both strings.
```php
// Example with overlapping words
$commonSubstring = str()->longestCommonSubstring("hello world", "yellow world"); // Returns "llo world"

// Example with no common substring
$commonSubstring = str()->longestCommonSubstring("abcdef", "xyz"); // Returns ""

// Example with a single common character
$commonSubstring = str()->longestCommonSubstring("banana", "bandana"); // Returns "bana"
```

### leetSpeak()
The `leetSpeak()` function is a helper designed to convert a given string into leetspeak (1337), a playful encoding style where certain letters are replaced with similar-looking numbers or symbols.
```php
// Convert a simple phrase
$leetString = str()->leetSpeak("leet speak"); // Possible output: "l33t sp34k"

// Convert a more complex phrase
$leetString = str()->leetSpeak("programming is fun"); // Possible output: "pr0gr4mm1ng 15 fun"
```

Common Leetspeak Replacements:
```
A -> 4   B -> 8   C -> (   E -> 3   G -> 6   H -> #
I -> 1   L -> 1   O -> 0   S -> 5   T -> 7   Z -> 2
```
This function is great for fun text transformations, gaming usernames, or encoding messages in a way that is still somewhat readable.

### extractEmails()
The `extractEmails()` function is a helper designed to extract all email addresses from a given string. It scans the string for valid email formats and returns them as an array.
```php
// Extract email addresses from a string
$emails = str()->extractEmails("Contact us at support@example.com or sales@example.org");
// Returns: ["support@example.com", "sales@example.org"]
```

### highlightKeyword()
The `highlightKeyword()` function is a helper designed to highlight all occurrences of a specified keyword in a given string using HTML tags. This is useful for emphasizing search results, user input matches, or key terms in displayed content.
```php
// Default behavior with <strong> tag
$text = "Doppar is awesome. Learn Doppar now!";
$highlighted = str()->highlightKeyword($text, "Doppar"); 
// Returns: "<strong>Doppar</strong> is awesome. Learn <strong>Doppar</strong> now!"

// Using a <span> tag for custom styling
$highlighted = str()->highlightKeyword($text, "Doppar", "span class='highlight'"); 
// Returns: "<span class='highlight'>Doppar</span> is awesome. Learn <span class='highlight'>Doppar</span> now!"
```

<a name="section-55"></a>

## Localization
Doppar provides multiple ways to handle localization in your application. You can set, retrieve, and translate language strings efficiently using various helpers and facades. Language files located in your root `lang` directory

### Setting the Locale
To change the application's active language, use:
```php
use Phaseolies\Support\Facades\App;

App::setLocale('en');
```

### Example
Set language based on user preference
```php
if ($user->language === 'es') {
    App::setLocale('es');
} else {
    App::setLocale('en');
}
```

### Get the Current local
To retrieve the currently set language:
```php
use Phaseolies\Support\Facades\App;

$currentLang = App::getLocale()
```

### Fetching Translations
Assume we have a language file inside `lang/en/messages.php` and that conatins this.
```php
<?php

return [
    'welcome' => 'Thank you for choosing Doppar :version. Build something amazing',
];
```

Now you can retrieve translations using multiple approaches:
#### Using the lang() Helper
```php
lang()->get('messages.welcome', ['version' => Application::VERSION]);
// or
lang()->trans('messages.welcome', ['version' => Application::VERSION]);
```

#### Using the Lang Facade
```php
use Phaseolies\Supports\Facades\Lang;

$message = Lang::trans('messages.welcome', ['version' => Application::VERSION]);
```

### Using the trans() Helper
```php
$message = trans('messages.welcome', ['version' => Application::VERSION]);
```

<a name="section-57"></a>

## Doppar Framework – Package Development Guide
Welcome to the official Doppar Framework Package Development Guide! This document walks you through the full lifecycle of creating, structuring, and maintaining packages within the Doppar PHP ecosystem.

Whether you're building internal modules or reusable packages for others, this guide helps you create clean, organized, and pluggable components for your Doppar applications.

### Overview
In Doppar, a package is a self-contained module that can include:
- Configuration files
- Routes
- Views
- Migrations
- Commands
- Service classes

Packages are registered via Service Providers and integrated seamlessly into your application.

### Creating a New Package
Start by creating a directory structure similar to this:
```markdown
packages/
└── VendorName/
    └── PackageName/
        ├── config/
        │   └── packagename.php
        ├── routes/
        │   └── web.php
        ├── views/
        │   └── (Blade files)
        ├── database/
        │   └── migrations/
        ├── src/
        │   └── PackageServiceProvider.php
        └── composer.json
```
Keep all business logic under a `src/` folder for cleaner autoloading and separation of concerns.

### Building the Service Provider
The Service Provider is the heart of your package. It connects your package to the Doppar framework.
```php

namespace Vendor\PackageName;

use Phaseolies\Providers\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
       //
    }
}
```

### Register Service Provider
To integrate your package into a Doppar application, you need to register your package's service provider. The service provider is the entry point that tells Doppar how to load your package's components such as routes, views, config, and migrations.

Open your application's configuration file `config/app.php` and add your service provider with the `providers` array
```php
'providers' => [
    // Other service providers...
    Vendor\PackageName\PackageServiceProvider::class,
],
```
Replace `Vendor\PackageName\PackageServiceProvider` with the actual namespace and class name of your service provider.

### Configuration Files
Place default configuration in `config/packagename.php`. To allow users to customize, publish it via:
```php
public function register()
{
    $this->mergeConfig(__DIR__.'/config/packagename.php', 'packagename'); // merging config
}
```

Now you can echo your package config name like
```php
echo config('packagename.key', 'default')
```

You can publish configuration file by running this command
```php
php pool vendor:publish --tag=config
```

### Routing
Put your package routes in `routes/web.php`. Load them with:
```php
public function boot()
{
    $this->loadRoutes(__DIR__ . '/routes/web.php'); // loading routes
}
```
Use route groups and prefixes to avoid conflicts.

### Views
Store your Blade templates in `views/` and reference them with a `namespace` packagename:
```php
public function boot()
{
    $this->loadViews(__DIR__ . '/views', 'packagename'); // loading views and packagename is the namespace

    $this->publishes([
        __DIR__ . '/views' => resource_path('views/vendor/packagename'),
    ]);
}
```

Now you can allow doppar to load your views using `namespace` like this
```php
view('packagename::welcome');
```
Allow users to override by publishing them to:
```php
// php pool vendor:publish --tag=views
resources/views/vendor/packagename
```

### Migrations
Include database migrations in `database/migrations`. They will auto-load on boot, but can also be published and customized by users.
```php
public function boot()
{
    $this->loadMigrations(__DIR__ . '/database/migrations');

    $this->publishes([
        __DIR__ . '/database/migrations' => database_path('migrations'),
    ]);
}
```
```php
php pool vendor:publish --tag=migrations
php pool migrate
```

You can override vendor publish file by adding `--force`
```php
php pool vendor:publish --force // override existing files
```

### Publishing Your Package
If you want to share your package, Add a proper `composer.json` with psr-4 autoloading:
```php
"autoload": {
    "psr-4": {
        "Vendor\\PackageName\\": "src/"
    }
}
```
Push it to GitHub or publish to Packagist and Install via Composer:
```bash
composer require vendor/packagename
```

Creating packages in Doppar is all about clean separation, reusability, and plug-and-play integration. Whether you're building UI components, authentication systems, or developer tools, this guide helps you build consistent and scalable packages.

<a name="flarion"></a>

## Doppar Flarion
Flarion provides a lightweight API authentication system for the Doppar framework.

Flarion allows each user of Doppar application to generate and manage multiple API tokens. These tokens are stateless and designed for use in mobile apps, third-party clients, or any frontend that communicates via a simple token-based API.

Each token can be assigned specific abilities, defining what the token is allowed to do within the system. This makes it easy to implement fine-grained access control across your API routes, without relying on cookies or session state — fully aligned with Doppar's stateless architecture.

### How it Works
Doppar Flarion exists to solve one problems. Let's discuss it before digging deeper into the library.

### API Tokens
Flarion is a lightweight authentication package for the Doppar framework that allows you to issue API tokens to your users without the complexity of OAuth. This functionality is inspired by platforms like GitHub, where users can generate personal access tokens from their account settings. For example, your Doppar application might have a settings page where users can create API tokens to integrate with external services or automate workflows.

Flarion handles the generation, storage, and management of these tokens. Tokens are stored in a dedicated database table and can be assigned specific abilities (scopes) to control access. They typically have a long lifespan (often lasting for years), but users can delete them at any time for security.

Incoming HTTP requests are authenticated by checking the Authorization header for a valid token. If the token exists and is valid, Flarion will resolve the corresponding user and authorize the request accordingly — all in a stateless, token-based manner ideal for API-first applications.

### Installation
You may install Doppar Flarion via the `composer require` command:
```bash
composer require doppar/flarion
```

### Publish Configuration
Now we need to publish the configuration files by running this pool command
```bash
php pool vendor:publish --provider="Phaseolies\Flarion\FlarionServiceProvider"
```

Now run migrate command to migrate `personal_access_token` table
```bash
php pool migrate
```

### Register Provider
Next, register the Flarion service provider so that Doppar can initialize it properly. Open your `config/app.php` file and add the `FlarionServiceProvider` to the providers array:
```
'providers' => [
    // Other service providers...
    Flarion\FlarionServiceProvider::class,
],
```
This step ensures that Doppar knows about Flarion and can load its functionality when the application boots.

### API Token Authentication
Flarion allows you to issue API tokens / personal access tokens that may be used to authenticate API requests to your application. When making requests using API tokens, the token should be included in the Authorization header as a `Bearer token`.

To begin issuing tokens for users, your User model should use the `Doppar\Flarion\Tokenable` trait:
```php
<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;
use Doppar\Flarion\Tokenable;

class User extends Model
{
    use Tokenable;
}
```

To issue a token, you may use the `createToken` method. The `createToken` method returns a Doppar\Flarion\NewAccessToken instance.

```php
use Phaseolies\Http\Request;

Route::post('create/token', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
```

You may access all of the user's tokens using the tokens Eloquent relationship provided by the HasApiTokens trait:
```php
foreach ($user->tokens as $token) {
    // ...
}
```

### Token Abilities
Flarion allows you to assign "abilities" to tokens. Abilities serve a similar purpose as OAuth's "scopes". You may pass an array of string `abilities` as the third argument to the `createToken` method:
```php
return $user->createToken('token-name', null, ['post-update'])->plainTextToken;
```

When handling an incoming request authenticated by Flarion, you may determine if the token has a given ability using the middleware and `tokenCan` method:
```php
Route::post('token_scope', [PostController::class, 'update'])
    ->middleware('auth-api:post-update');
```

Or you can did the same job like
```php
if ($user->tokenCan('post-update')) {
    // ...
}
```

### Check Multiple Abilities
You can also check for multiple abilities by joining them with an ampersand (&). The token must have all listed abilities to pass the check:
```php
Route::post('token_scope', [PostController::class, 'update'])
    ->middleware('auth-api:post-update&post-another');
```
Each ability must exactly match one of the abilities assigned to the token. If any of the specified abilities are missing from the token, the request will be rejected with a `unauthorized` response.

### Protecting Routes
To ensure that all incoming API requests are authenticated, you should apply the Flarion authentication guard to any protected routes in your application — typically inside your `routes/api.php` file.

Flarion handles stateless authentication using API tokens, so every request must include a valid token in the Authorization header. This makes it perfect for mobile apps, external clients, or any token-driven access.

First register the flarion middleware inside your `App\Http\Kernel.php` file.
```php
public array $routeMiddleware = [
    'auth-api' => \Doppar\Flarion\Http\Middleware\AuthenticateApi::class,
];
```

Now you can use `auth-api` middleware to protect your route.


```php
use Phaseolies\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth-api');
```

### Revoking Tokens
You may "revoke" tokens by deleting them from your database using the tokens relationship that is provided by the `Doppar\Flarion\Tokenable` trait:
```php
// Revoke all tokens...
$user->tokens()->delete();

// Revoke the token that was used to authenticate the current request...
$request->user()->tokens()->where('token', '=', $tokenId)->delete();
$request->user()->currentAccessToken()->delete();

// Revoke a specific token...
$user->tokens()->where('id', '=', $tokenId)->delete();
```

### Token Expiration
By default, Flarion tokens never expire and may only be invalidated by revoking the token. However, if you would like to configure an expiration time for your application's API tokens, you may do so via the expiration configuration option defined in your application's `flarion` configuration file. This configuration option defines the number of minutes until an issued token will be considered expired:
```php
'expiration' => 5,
```
If you would like to specify the expiration time of each token independently, you may do so by providing the expiration time as the second argument to the `createToken` method:

```php
return $user->createToken('token-name',  now()->addMinutes(5))->plainTextToken;
```