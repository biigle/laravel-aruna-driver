# Laravel Aruna Object Storage Driver

[Aruna Object Storage](https://aruna-storage.org) storage driver for Laravel/Lumen.

## Installation

Require the package with Composer:

```
composer require biigle/laravel-aruna-driver
```

### Laravel

The service provider is detected automatically.

### Lumen

Add the service provider to `bootstrap/app.php`:
```php
$app->register(Biigle\Filesystem\Aruna\ArunaServiceProvider::class);
```

## Configuration

Add a new storage disk to `config/filesystems.php`:

```php
'disks' => [
   'aruna' => [
      'driver' => 'aruna',
      // The bucket name consists of the collection version (or latest), the
      // collection name and the project name.
      'bucket' => 'latest.collection-name.project-name',
      'collectionId' => 'MYARUNACOLLECTIONULID',
      'apiUri' => 'https://api.aruna-storage.org',
      // The bucket name MUST be included in the endpoint URL.
      'endpoint' => 'https://latest.collection-name.project-name.data.gi.aruna-storage.org',
      'key' => env('ARUNA_S3_KEY', ''),
      'secret' => env('ARUNA_S3_SECRET', ''),
      'token' => env('ARUNA_API_TOKEN', ''),
   ],
]
```

Additional configuration options:

- `prefix` (default: `null`): Prefix to use for all file paths.

