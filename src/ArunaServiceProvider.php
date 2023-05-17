<?php

namespace Biigle\Filesystem\Aruna;

use Aws\S3\S3Client;
use Biigle\Flysystem\Aruna\ArunaAdapter;
use GuzzleHttp\Client;
use Illuminate\Filesystem\AwsS3V3Adapter;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class ArunaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['filesystem']->extend('aruna', function($app, $config) {
            $bucket = $config['bucket'];
            $collectionId = $config['collectionId'];

            $s3Client = new S3Client([
                'credentials' => [
                    'key' => $config['key'],
                    'secret' => $config['secret'],
                ],
                'endpoint' => $config['endpoint'],
                // Keep as-is.
                'region' => '',
                'version' => 'latest',
                'bucket_endpoint' => true,
            ]);

            $httpClient = new Client([
                'base_uri' => $config['apiUri'],
                'headers' => [
                    'Authorization' => 'Bearer '.$config['token'],
                ],
            ]);
            $adapter = new ArunaAdapter($s3Client, $bucket, $httpClient, $collectionId, $config['prefix'] ?? '');

            // Use this instead to use temporary URLs once CORS can be configured in
            // Aruna.
            // return new AwsS3V3Adapter(new Filesystem($adapter), $adapter, $config, $s3Client);

            return new FilesystemAdapter(new Filesystem($adapter), $adapter, $config);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
