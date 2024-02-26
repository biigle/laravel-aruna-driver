# Laravel Aruna Object Storage Driver

⚠️ This package is now archived because AOS storage disks can be used via the S3 protocol.

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

## Funding

This work was supported by the German Research Foundation (DFG) within the project “Establishment of the National Research Data Infrastructure (NFDI)” in the consortium NFDI4Biodiversity (project number 442032008).

![NFDI4Biodiversity Logo](NFDI_4_Biodiversity___Logo_Positiv.svg)
