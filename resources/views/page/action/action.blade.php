<div class="dropdown pt-2">
    <a href="javascript:;" class="text-secondary ps-4" id="dropdownCam" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3" aria-labelledby="dropdownCam" style="">
        @foreach ($actions as $key => $item)
        <li>
            <a class="dropdown-item border-radius-md {{ $key == 'Delete' ? 'delete' : 'action' }}" href="{{ $item }}">
                {!! $key !!}
            </a>
        </li>
        @endforeach
    </ul>
</div>