<style>
    .pagination {
        display: flex;
        color: var(--black);
        list-style: none;
        padding: 0;
        font-size: 18px;
        margin-top: 30px;
        gap: 30px;
    }

    .pagination .left {
    }

    .highlight a {
        text-decoration: none;
        color: var(--black);
        font-weight: 400;
        text-decoration: underline;
    }

    .highlight a:hover {
        color: var(--red);
        font-weight: bold;
    }
</style>

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li class="highlight"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="left highlight"><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="left disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
