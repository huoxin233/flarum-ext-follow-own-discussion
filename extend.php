<?php

/*
 * This file is part of huoxin/follow-own-discussion.
 *
 * Copyright (c) 2024 huoxin.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Huoxin\FollowOwnDiscussion;

use Flarum\Extend;
use Flarum\Discussion\Event\Started;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),
        
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),
        
    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\Settings())
        ->default('huoxin-follow-own-discussion.defaultFollowAfterCreate', true),

    (new Extend\Event())
        ->listen(Started::class, FollowAfterCreate::class),
    
    (new Extend\User())
        ->registerPreference('followAfterCreate', 'boolval', (bool) resolve('flarum.settings')->get('huoxin-follow-own-discussion.defaultFollowAfterCreate', true)),
];
