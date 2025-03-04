<?php

namespace App\Jobs;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use Illuminate\Support\Facades\Log;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        // Access the payload
        $payload = $this->webhookCall->payload;

        // Log it for debugging (optional)
        Log::info('Received Webhook:', $payload);

        // Return as JSON response
        return response()->json([
            'message' => 'Webhook processed successfully',
            'data' => $payload
        ]);
    }
}
