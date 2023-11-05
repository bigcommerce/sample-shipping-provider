# Silex based reference implementation of a Shipping Carrier Service integration

This is a very simple reference application based on the PHP Silex microframework, that demonstrates how to process a request from the BigCommerce Carrier Service integration and return a valid response.
It is designed to quickly deploy to Heroku and let you get started on your development with minimal ramp-up.

## Requirements

Check composer.json but in general:

- PHP >=8.2

- composer

- xdebug (for development/debugging)

## Running locally

```
    $ git clone ...
    $ composer install
    $ COMPOSER_PROCESS_TIMEOUT=0 composer run
```

Then, browse to http://localhost:8888

**Note** To enable xdebug support replace `run` with `devrun` (see composer.json 'scripts' sections for details)

## Running on Heroku

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

Or do the manual thing...

```
    $ heroku login -i
    $ heroku create
    $ git push heroku master
    $ heroku open
```
 
**Note** Some additional setup may be required ([Setting up Heroku + PHP](https://devcenter.heroku.com/articles/getting-started-with-php))



## Sample app contents

The default landing page contains an overview of how to trigger various shipping rate responses from the sample app.


- `ShippingRateServiceProvider.php` registers (within the DI container) the API controller and service (below) for the BC sample responses provided

- `ShippingRateAPIController.php` the basic API controller with minimal validation and error handling to pass POST requests to an API service

- `StubbedShippingRateAPIService.php` the basic rate API service that returns a static json file based on the rate request destination country code

- `SimpleRateAPIServiceInterface.php` a simple interface that you can extend from to build to your own rate service (just change the provider above to instantiate your new service instead of the stubbed one)


## Disclaimer

This is just one way to implement your service integration, there is no restriction on how you structure your application or what framework you use. 
Feel free to pick what parts, if any, from this repo to use in your own development.
