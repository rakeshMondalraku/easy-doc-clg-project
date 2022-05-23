<div class="btn-group btn-group-sm" role="group">
    <button class="btn btn-primary btn-sm" title="View" onclick="view({{ $id }})">
        <i class="fas fa-eye"></i>
    </button>
    @if ($status == 'pending' || $status == 'approved')
        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Change Status
        </button>
        <div class="dropdown-menu">
            @switch($status)
                @case('pending')
                    <button class="dropdown-item" onclick="changeStatus({{ $id }}, 'approved')">Approve</button>
                    <button class="dropdown-item" onclick="changeStatus({{ $id }}, 'canceled')">Cancel</button>
                @break

                @case('approved')
                    <button class="dropdown-item" onclick="changeStatus({{ $id }}, 'completed')">Complete</button>
                @break
            @endswitch
        </div>
    @endif
</div>
