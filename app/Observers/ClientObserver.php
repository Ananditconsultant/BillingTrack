<?php

namespace FI\Observers;

use FI\Modules\Clients\Models\Client;
use FI\Modules\CustomFields\Models\ClientCustom;

class ClientObserver
{
    /**
     * Listen to the Client created event.
     */
    public function created(Client $client): void
    {
        // Create the default custom record.
        $client->custom()->save(new ClientCustom());
    }
    /**
     * Listen to the Client creating event.
     */
    public function creating(Client $client): void
    {
        $client->url_key = str_random(32);

        if (!$client->currency_code)
        {
            $client->currency_code = config('fi.baseCurrency');
        }

        if (!$client->language)
        {
            $client->language = config('fi.language');
        }
    }
    /**
     * Listen to the Client deleted event.
     */
    public function deleteing(Client $client): void
    {
        foreach ($client->notes as $note)
        {
            ($client->isForceDeleting()) ? $note->onlyTrashed()->forceDelete() : $note->delete();
        }

        foreach ($client->attachments as $attachment)
        {
            ($client->isForceDeleting()) ? $attachment->onlyTrashed()->forceDelete() : $attachment->delete();
        }

        foreach ($client->expenses as $expense)
        {
            ($client->isForceDeleting()) ? $expense->onlyTrashed()->forceDelete() : $expense->delete();
        }
    }
    /**
     * Listen to the Client saving event.
     */
    public function saving(Client $client): void
    {
        $client->name    = strip_tags($client->name);
        $client->address = strip_tags($client->address);

        if (!$client->unique_name)
        {
            $client->unique_name = $client->name;
        }
    }
}
