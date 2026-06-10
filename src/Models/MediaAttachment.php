<?php

namespace Slimani\MediaManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Slimani\MediaManager\MediaManagerPlugin;

class MediaAttachment extends Model
{
    protected $table = 'media_attachments';

    protected $fillable = [
        'media_file_id',
        'attachable_id',
        'attachable_type',
        'collection',
        'sort_order',
    ];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function file(): BelongsTo
    {
        /** @var MediaManagerPlugin $plugin */
        $plugin = filament('media-manager');

        return $this->belongsTo($plugin->getFileModel(), 'media_file_id');
    }
}
