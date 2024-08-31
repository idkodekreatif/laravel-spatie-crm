@props(['size' => 'lg', 'title', 'action' => null])

<div class="modal-dialog modal-dialog-centered modal-{{ $size }}" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ $action }}" method="post" id="form_action">
            @csrf

            <div class="modal-body">
                {{ $slot }}
            </div>
            @if ($action)
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
            </div>
            @endif
        </form>
    </div>
</div>