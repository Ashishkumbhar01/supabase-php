### Supabase-PHP

![Supabase](https://getlogo.net/wp-content/uploads/2020/11/supabase-logo-vector.png)

![GitHub forks](https://img.shields.io/github/forks/Ashishkumbhar01/supabase-php?style=for-the-badge&logo=Github)
![GitHub License](https://img.shields.io/github/license/Ashishkumbhar01/supabase-php?style=for-the-badge)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/Ashishkumbhar01?style=for-the-badge&logo=Github%20Sponsors&label=Support%20me)](https://github.com/sponsors/Ashishkumbhar01)
![GitHub Repo stars](https://img.shields.io/github/stars/Ashishkumbhar01/supabase-php?style=for-the-badge&logo=Github)
![GitHub Release](https://img.shields.io/github/v/release/Ashishkumbhar01/supabase-php?style=for-the-badge)
![GitHub Downloads (all assets, all releases)](https://img.shields.io/github/downloads/Ashishkumbhar01/supabase-php/total?style=for-the-badge)

Supabase for PHP client. Realtime database, Storage.

### Example
* Install Supabase client for our project.
* Than we are require supabase-client by composer.

```bash
composer require supabase-php/supabase-client
```

* First of all we need our `.env` file, so follow this command.

```bash
cp .env.example .env
```
* Following this code for your Supabase project/App.

```php
<?php
use Supabase\Supapase;
use Supabase\Database;

require_once "/vendor/autoload.php";

$key = $_ENV['apikey'];
$db_name = $_ENV['project_id'];
$table = $_ENV['table'];

$client = new Supabase($key, $db_name);

// Get data
$client->get($table, $query);

// Post data
$data = ['name'=>'jonny', 'email'=>'jonny@deep'];
$client->post($table, $data);

// Update data
$data = ['name'=>'John', 'email'=>'john@deo.com'];
$client->update($table, $id, $data);

// Delete data
$id = 2;
$client->delete($table, $id);
```
* When you creating your supabase table, make sure RLS (Row Level Security) option be [×] disable. if RLS are enable [✓] maybe you getting some error so you need to use `Auth class`.

### Supabase Authentication
* Auth Class coming soon.
