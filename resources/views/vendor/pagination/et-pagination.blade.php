@php
    function toBanglaNumber($number) {
        $banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace(range(0, 9), $banglaDigits, $number);
    }
@endphp

@if ($paginator->hasPages())
    <nav class="mt-10">
        <ul class="flex justify-center space-x-3 et-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="disabled">
                        পূর্ববর্তী
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        পূর্ববর্তী
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="disabled">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="active">
                                    {{ toBanglaNumber($page) }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">
                                    {{ toBanglaNumber($page) }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        পরবর্তী
                    </a>
                </li>
            @else
                <li>
                    <span class="disabled">
                        পরবর্তী
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
