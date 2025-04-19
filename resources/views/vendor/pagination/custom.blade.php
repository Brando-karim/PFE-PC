<style>
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 1rem 0;
}

.pagination .page-item {
    list-style: none;
    margin: 0 2px;
    transition: transform 0.2s ease;
}

.pagination .page-link,
.pagination .pagelink {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    text-decoration: none;
    color: #4a5568;
    background-color: #f7fafc;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    font-weight: 500;
}

.pagination .page-item:hover {
    transform: scale(1.05);
}

.pagination .page-link:hover {
    background-color: #edf2f7;
    color: #2d3748;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.pagination .page-item.active .page-link,
.pagination .page-item.active .pagelink {
    background-color: #4F46E5;
    color: white;
    border-color: #4F46E5;
    box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3), 0 2px 4px -1px rgba(79, 70, 229, 0.2);
}

.pagination .page-item.disabled .page-link,
.pagination .page-item.disabled .pagelink {
    color: #a0aec0;
    background-color: #f7fafc;
    cursor: not-allowed;
    pointer-events: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .pagination {
        gap: 0.25rem;
    }
    
    .pagination .page-link,
    .pagination .pagelink {
        padding: 0.375rem 0.5rem;
        font-size: 0.875rem;
    }
}
</style>

@if($paginator->hasPages()) 
    <ul class="pagination"> 
        @if($paginator->onFirstPage()) 
            <li class="page-item disabled"><span class="pagelink">Précédent</span></li> 
        @else 
            <li class="page-item"><a class="page-link" href="{{ 
$paginator->previousPageUrl() }}">Précédent</a></li> 
        @endif 
 
        @foreach ($elements as $element) 
            @if (is_string($element)) 
                <li class="page-item disabled"><span class="pagelink">{{ $element }}</span></li> 
            @endif 
 
            @if (is_array($element)) 
                @foreach ($element as $page => $url) 
                    @if ($page == $paginator->currentPage())                         <li class="page-item active"><span class="page-link">{{ $page }}</span></li> 
                    @else 
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> 
                    @endif 
                @endforeach 
            @endif 
        @endforeach 
 
        @if($paginator->hasMorePages()) 
            <li class="page-item"><a class="page-link" href="{{ 
$paginator->nextPageUrl() }}">Suivant</a></li> 
        @else 
            <li class="page-item disabled"><span class="pagelink">Suivant</span></li> 
        @endif 
    </ul> 
@endif 
