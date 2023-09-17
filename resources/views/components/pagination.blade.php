@if ($paginator->hasPages())
    <ul class="pagination">
        
        @if (!$paginator->onFirstPage())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Ir para a primeira página" title="Ir para a primeira página">
                    {{ __('Primeira') }}
                </a>
            </li>
            
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Ir para a página anterior" title="Ir para a página anterior">
                    {{ __('Anterior') }}
                </a>
            </li>
        @endif

        @php
            $pages = $paginator->getUrlRange(
                max(1, $paginator->currentPage() - 2),
                min($paginator->lastPage(), $paginator->currentPage() + 2)
            );
        @endphp

        @foreach ($pages as $page => $url)
            <li class="page-item {{ $page != $paginator->currentPage() ?: "active" }}">
                <a href="{{ $url }}" class="page-link">
                    {{ $page }}
                </a>
            </li>
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Ir para a próxima página" >
                    {{ __('Próxima') }}
                </a>
            </li>
            
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Ir para a última página">
                    {{ __('Última') }}
                </a>
            </li>
        @endif 
    </ul>
@endif 
