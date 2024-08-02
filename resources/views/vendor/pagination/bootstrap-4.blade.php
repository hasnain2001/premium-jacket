<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Pagination Styles */
.nav-pagination {
    background-color: white; /* White background for the navigation bar */
    padding: 10px; /* Padding around the navigation bar */
    border-radius: 5px; /* Rounded corners for the navigation bar */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow for a subtle 3D effect */
}

.pagination {
    display: flex;
    justify-content: center; /* Center align the pagination links */
    margin: 0;
    padding: 0;
    list-style: none; /* Remove default list styles */
}

.page-item {
    margin: 0 5px; /* Space between pagination items */
}

.page-link {
    color: brown; /* Bootstrap primary color for links */
    background-color: #ffffff; /* White background for links */
    border: 1px solid #dee2e6; /* Light gray border */
    padding: 10px 15px; /* Padding for the links */
    border-radius: 50%; /* Circular shape for the links */
    text-decoration: none; /* Remove underline from links */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effects */
}

.page-link:hover {
    background-color: brown; /* Bootstrap primary color on hover */
    color: #ffffff; /* White color for text on hover */
}

.page-item.active .page-link {
    background-color: brown; /* Bootstrap primary color for active page */
    border-color: brown; /* Match border color for active page */
    color: #ffffff; /* White color for text on active page */
}

.page-item.disabled .page-link {
    color: #6c757d; /* Bootstrap secondary color for disabled state */
    pointer-events: none; /* Disable pointer events for disabled links */
}

    </style>
  </head>
  <body>
    @if ($paginator->hasPages())
    <nav class="nav-pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
