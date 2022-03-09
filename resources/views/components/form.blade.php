@if (isset($get))
    <form action="{{ $route }}" {!! isset($enctype) ? 'enctype="multipart/form-data"' : '' !!} method="get">
        @csrf
        @if (isset($edit))
            @method('patch')
        @endif
        @if (isset($delete))
            @method('delete')
        @endif
        {{ $content }}
    </form>
@else
    <form action="{{ $route }}" {!! isset($enctype) ? 'enctype="multipart/form-data"' : '' !!} method="post">
        @csrf
        @if (isset($edit))
            @method('patch')
        @endif
        @if (isset($delete))
            @method('delete')
        @endif
        {{ $content }}
    </form>
@endif
