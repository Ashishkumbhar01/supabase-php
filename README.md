### Supabase-PHP

![Supabase](https://getlogo.net/wp-content/uploads/2020/11/supabase-logo-vector.png)

![GitHub forks](https://img.shields.io/github/forks/Ashishkumbhar01/supabase-php?style=for-the-badge&logo=Github)
![GitHub License](https://img.shields.io/github/license/Ashishkumbhar01/supabase-php?style=for-the-badge)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/Ashishkumbhar01?style=for-the-badge&logo=Github%20Sponsors&label=Support%20me)](https://github.com/sponsors/Ashishkumbhar01)
![GitHub Repo stars](https://img.shields.io/github/stars/Ashishkumbhar01/supabase-php?style=for-the-badge&logo=Github)
![GitHub Release](https://img.shields.io/github/v/release/Ashishkumbhar01/supabase-php?style=for-the-badge)
![Packagist Downloads](https://img.shields.io/packagist/dt/supabase-php/supabase-client?style=for-the-badge&logo=composer)

Supabase for PHP client. Realtime database, Storage.

### Example
* Install Supabase client for our project.
* Than we are require supabase-client by composer.

```bash
composer require supabase-php/supabase-client
```
or
```bash
composer require supabase-php/supabase-client:"dev-master"
```

* First of all we need our `.env` file, so follow this command.

```bash
cp .env.example .env
```
* Following this code for your Supabase project/App.

```php
<?php
use Supabase\Functions;

require_once __DIR__."/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// .env config
$config = array(
   'url' => $_ENV['SB_URL'],
   'apikey' => $_ENV['SB_APIKEY']
);

$client = new Functions(
   $config['url'],
   $config['apikey']
);

// get all data.
$html = $client->getAllData('users');
echo "<pre>";
print_r($html);

// get single data by using column name.
$html=$client->getSingleData($table,'name');

echo "<pre>";
print_r($html);

$data = [
'name' => 'Sushil Kumar',
'age' => 23
];

// post data 
$client->postData('users', $data);

// Update the Data by using columns.
$data = [
'name' => 'sushil',
'age' => 20
];

$client->updateData($table, $id, $data);

// Delete the data using by id
$client->deleteData($table, 20);
```
* When you creating your supabase table, make sure RLS (Row Level Security) option be [×] disable. if RLS are enable [✓] maybe you getting some error so you need to use `Auth class`.

### Supabase Authentication
* Auth Class coming soon.
