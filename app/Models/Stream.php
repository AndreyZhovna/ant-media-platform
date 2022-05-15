<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Storage;

/**
 * App\Models\Stream
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $img_preview
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $createdBy
 * @method static \Database\Factories\StreamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereImgPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stream extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'stream';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param $value
     * @return string|null
     */
    public function getImgPreviewAttribute($value): ?string
    {
        if (!$value) {
            return null;
        }

        if ( filter_var($value, FILTER_VALIDATE_URL) ) {
            return $value;
        }

        return Storage::disk('public')->url('uploads/streams/preview/' . $value);
    }

    /**
     * @return HasOne
     */
    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
