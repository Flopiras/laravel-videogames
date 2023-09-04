@if (session('toast'))
    {{-- Toasts container --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">

            {{-- Header --}}
            <div class="toast-header">
                <strong class="me-auto">{{ session('toast')['owner'] }}</strong>
                <small>{{ date('Y/m/d h:m:s', strtotime(session('toast')['timestamp'])) }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>

            {{-- Body --}}
            <div class="toast-body">

                {{-- Message --}}
                {{ session('toast')['message'] }}

                {{-- Restore Action --}}
                @if (session('toast')['action'] === 'restore')
                    <div class="mt-2 pt-2 border-top">
                        <form action="{{ session('toast')['action-route'] }}">
                            <button class="btn btn-success">Restore</button>
                        </form>
                    </div>
                @endif

                {{-- Go To List Action --}}
                @if (session('toast')['action'] === 'go_to_list')
                    <div class="mt-2 pt-2 border-top">
                        <a href="{{ session('toast')['action-route'] }}" class="btn btn-sm btn-success">Go to
                            Detail</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endif
