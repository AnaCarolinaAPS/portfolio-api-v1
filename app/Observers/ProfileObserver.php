<?php

namespace App\Observers;

use App\Models\Information;
use App\Models\Profile;

class ProfileObserver
{
    /**
     * Handle the Profile "created" event.
     */
    public function created(Profile $profile): void
    {
        //When a profile is created we need to create an Information for it
        Information::create([
            'profile_id' => $profile->id,
        ]);

        // Update current_profile_id session
        session([
            'current_profile_id' => $profile->id,
        ]);
    }

    /**
     * Handle the Profile "updated" event.
     */
    public function updated(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "deleted" event.
     */
    public function deleted(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "restored" event.
     */
    public function restored(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "force deleted" event.
     */
    public function forceDeleted(Profile $profile): void
    {
        //
    }
}
