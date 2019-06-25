<?php
/**
 * LaraClassified - Geo Classified Ads CMS
 * Copyright (c) Mayeul Akpovi. All Rights Reserved
 *
 * Email: mayeul.a@larapen.com
 * Website: http://larapen.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Larapen\Listeners;

use App\Larapen\Events\AdWillBeDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailAdDeleteAlert extends Email
{
    /**
     * Handle the event.
     *
     * @param  AdWasDeleted $event
     * @return void
     */
    public function handle(AdWillBeDeleted $event)
    {
        // Don't send mail to Admin (if you want use crawler)
        if (isset($event->ad->user_id) and $event->ad->user_id == 1) {
            return false;
        }
        
        try {
            Mail::send('emails.ad.delete-alert', ['ad' => $event->ad, 'days' => $event->days], function ($m) use ($event) {
                $m->to($event->ad->seller_email, $event->ad->seller_name)->subject(trans('mail.Your ad ":title" will be deleted in :days days', [
                    'title' => $event->ad->title,
                    'days' => $event->days
                ]));
            });
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
