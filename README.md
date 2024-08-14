### Supabase-PHP
Supabase for PHP client. Realtime database, Storage.

### Example
```php
<?php
use Supabase\Database;
use Supabase\Storage;

$key = "ae2gsg85vsgs63!dfd/svd";
$db_name = "test";

$client = new Supabase($key, $db_name);

// Get data
$client->get();

// Post data
$data = ['name'=>'jonny', 'email'=>'jonny@deep'];
$client->post($data);

// Update data
$data = ['name'=>'John', 'email'=>'john@deo.com'];
$client->update($data);

// Delete data
$id = 2;
$client->delete($id);
```
