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
composer require supabase-php/supabase-client:"dev-master"
```

* First of all we need our `.env` file, so follow this command.

```bash
cp .env.example .env
```
* Following this code for your Supabase project/App.

```php
<?php
use Supabase\Supabase\Supabase as Supabase;

require_once __DIR__."/vendor/autoload.php";

$url="https://your_project_id.supabase.co";
$apikey="";
$table="users";

$client = new Supabase($url,$apikey,$table);

// get all data.
$html = $client->get($table);
echo "<pre>";
print_r($html);

// get single data by using column name.
$html = $client->fetch($table,'name');
echo "<pre>";
print_r($html);

$data = [
"name" => "Sushil Kumar",
"age" => 23
];

// post data 
$client->post($table, $data);

// Update the Data by using columns.
$data = ["name"=>"sushil","age"=>20];
//$client->update($table, $id, $data);

// Delete the data using by id
$id = 15;
$client->delete($table, $id);
```
* When you creating your supabase table, make sure RLS (Row Level Security) option be [×] disable. if RLS are enable [✓] maybe you getting some error so you need to use `Auth class`.

### Supabase Authentication
* Auth Class coming soon.
