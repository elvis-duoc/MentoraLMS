
  <ul class="td_page_pagination td_mp_0 td_fs_18 td_semibold">
    @if ($paginator->onFirstPage())
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" class="td_page_pagination_item td_center" type="button"><i
                class="fa-solid fa-angles-left"></i></a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (!is_array($element))
            <li><a class="td_page_pagination_item td_center" href="javascript:;">...</a></li>
        @else
            @if (count($element) < 2)
            @else
                @foreach ($element as $key => $el)
                    @if ($key == $paginator->currentPage())
                        <li ><a class="td_page_pagination_item td_center active" href="javascript::void()">{{ $key }}</a></li>
                    @else
                        <li><a class="td_page_pagination_item td_center" href="{{ $el }}">{{ $key }}</a></li>
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" class="td_page_pagination_item td_center" type="button"><i
                class="fa-solid fa-angles-right"></i></a>
        </li>
    @else
    @endif
  </ul>
