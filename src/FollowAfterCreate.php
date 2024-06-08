<?php

namespace Huoxin\FollowOwnDiscussion;

use Flarum\Discussion\Event\Started;

class FollowAfterCreate
{
    public function handle(Started $event): void
    {
        $actor = $event->actor;

        if ($actor && $actor->exists && $actor->getPreference('followAfterCreate')) {
            $actor->assertRegistered();

            $state = $event->discussion->stateFor($actor);

            $state->subscription = 'follow';
            $state->save();
        }
    }
}
