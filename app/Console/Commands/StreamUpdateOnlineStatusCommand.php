<?php

namespace App\Console\Commands;

use App\Models\Stream;
use App\Services\AntmediaService;
use DB;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use JsonException;
use Throwable;

class StreamUpdateOnlineStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:update-online-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @return int
     * @throws RequestException
     * @throws JsonException
     * @throws Throwable
     */
    public function handle()
    {
        $streams = Stream::all()->keyBy('slug');

        $service = new AntmediaService();
        $updatedStreams = $service->getStreamsList( count($streams) );

        DB::beginTransaction();

        foreach ($updatedStreams as $s) {
            if ( isset($streams[$s->streamId]) ) {
                $stream = $streams[$s->streamId];
                $stream->is_online = $s->status === 'broadcasting';
                $stream->save();

                unset($streams[$s->streamId]);
            }
        }

        foreach ($streams as $stream) {
            $stream->is_online = 0;
            $stream->save();
        }

        DB::commit();

        return Command::SUCCESS;
    }
}
