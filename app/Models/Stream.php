<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Stream
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $img_preview
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stream newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereImgPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stream whereName($value)
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
}
