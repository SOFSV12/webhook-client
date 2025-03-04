# Laravel 10 Application

This Laravel 10 application receives payloads from a webhook call from another application. It requires PHP 8.1 and higher.

## Register Webhook Route

To receive webhook calls, you need to register the webhook route in your `routes/api.php` file:

```php
Route::webhooks('webhook-receiving-url');
```
In your `config/webhook-client.php` file, you need to specify the appropriate class for the `process_webhook_job` configuration. This class will handle the webhook job:

```php
'process_webhook_job' => \App\Jobs\ProcessWebhookJob::class,
```

## Installation

1. Clone the repository:
    ```bash
    git clone <repository-url>
    cd <repository-directory>
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Set the `WEBHOOK_CLIENT_SECRET` in the `.env` file. This secret must match the signing secret in the server application which runs on `laravel-webhook-server`.

4. Publish the migration for webhook calls:
    ```bash
    php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-migrations"
    ```

## Webhook Processing

This application uses the [laravel-webhook-client](https://github.com/spatie/laravel-webhook-client) package to process webhook calls from the server application. The payload can be viewed in the `laravel.log` file.

## Configuration

Ensure the following environment variable is set in your `.env` file:
```env
WEBHOOK_CLIENT_SECRET=your-webhook-client-secret
```

## Usage

After setting up the application and configuring the environment variables, the application will be ready to receive and process webhook payloads. The payload will be displayed in the `laravel.log` file.

For more information on the `laravel-webhook-client` package, refer to the [official documentation](https://github.com/spatie/laravel-webhook-client).

