@if ($paginator->hasPages())
<div class="d-flex justify-content-end my-2">
<nav aria-label="Page navigation example">
    <ul class="pagination">

        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><span class="page-link" >← Previous</span></li>
        @else
            <li><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-item"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled page-item"><span class="page-link" >Next →</span></li>
        @endif
    </ul>
</nav>
</div>
@endif
