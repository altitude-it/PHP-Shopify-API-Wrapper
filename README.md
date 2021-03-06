# Shopify API Wrapper
forked and adapted from ShopifyExtras/PHP-Shopify-API-Wrapper

## Requirement

- laravel 5.3


## Install

Via composer, inside your laravel app

```bash
 composer config repositories.altitudeShopify vcs https://github.com/altitude-it/PHP-Shopify-API-Wrapper
 composer require Altitude/Shopify-php-api-wrapper:dev-master
 
 ```
 In the ```config/app.php``` file of the project add the service provider :
``` 
        /*
         * Package Service Providers...
         */
       Shopify\Laravel\ServiceProvider::class,

```

## Getting Started (for a private app)

In the not committed ```.env``` file of the project add the shopify settings of your private app :

```
SHOPIFY_SHOP_DOMAIN='<store.myshopify.com>'
SHOPIFY_ACCESS_TOKEN='<password>'
```

First you will need to initialise the client like this in a class:

```php
use Shopify\Laravel\Facade as Shopify;
```

Then you can begin making requests:
```php
// Get a list of all products.
Shopify::getProducts();

// Get a list of all orders.
Shopify::getOrders();

// Get a specific product.
Shopify::getProduct(array("id" => $product_id));

// Add a product .
$product = array (
  'product' => 
  array (
    'title' => 'Burton Custom Freestyle 151',
    'body_html' => '<strong>Good snowboard!</strong>',
    'vendor' => 'Burton',
    'product_type' => 'Snowboard',
    'images' => 
    array (
      0 => 
      array (
        'src' => 'http://example.com/rails_logo.gif',
      ),
    ),
  ),
);
Shopify::createProduct($product);

```

