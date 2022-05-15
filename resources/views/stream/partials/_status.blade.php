<div class="mb-2">
    @if($stream->is_online)
        <div class="online-circle bg-success d-inline-flex"></div>
        <span>Online</span>
    @else
        <i class="fas fa-circle text-danger"></i>
        <span>Offline</span>
    @endif
</div>
