### Supabase-PHP

![Supabase](https://getlogo.net/wp-content/uploads/2020/11/supabase-logo-vector.png)

Supabase for PHP client. Realtime database, Storage.

### Example

Install Supabase client for our project.

```bash
composer require supabase-php/supabase-client 
```

First of all we need our `.env` file, so follow this command.

```bash
cp .env.example .env
```
Following this code for your Supabase project/App.

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
