<div class="col mb-4">
    <div class="card h-100 bg-dark shadow-lg border-0" style="color: white; transition: transform 0.3s ease, box-shadow 0.3s ease;">
        <div class="position-relative overflow-hidden" style="border-radius: 0.375rem 0.375rem 0 0;">
            <img src="{{ asset($icon) }}" alt="Image of Article"
                 class="card-img-top" 
                 style="height: 180px; object-fit: cover; transition: transform 0.3s ease;"
                 id="{{ $specs_type }}-input-article-img">
        </div>
        
        <div class="card-body d-flex flex-column">
            <h3 class="card-title fw-bold mb-3" 
                id="{{ $specs_type }}-input-article-titre"
                style="color: #000000; font-size: 1.25rem; line-height: 1.4;">
            </h3>
            
            {{--
            @foreach ($article->specs as $specs)
            <ul class="list-group list-group-flush border-bottom-0">
                <li class="list-group-item bg-dark" style="color: white">
                    <h3 class="fw-bold">{{ ucwords($specs->type) }} Specs:</h3>
                    @foreach ($specs->get_details() as $name => $value)
                    <div>
                        <strong>{{ $name }}:</strong> {{ $value }}
                    </div>
                    @endforeach
                </li>
            </ul>
            @endforeach
            --}}
            
            <div class="mt-auto">
                <ul class="list-group list-group-flush" style="display: none; border: none;" id="{{ $specs_type }}-input-price-ul">
                    <li class="list-group-item bg-transparent border-0 p-0 mb-3" id="{{ $specs_type }}-input-article-price">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="text-muted small">Price</span>
                            <span class="h5 mb-0 text-success fw-bold"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card-footer bg-transparent border-0 p-3">
            <button type="button" 
                    class="btn w-100" 
                    style="display: none; 
                           background: linear-gradient(45deg, #dc3545, #fd7e14); 
                           border: none; 
                           color: white; 
                           font-weight: 600; 
                           padding: 12px 24px; 
                           border-radius: 25px; 
                           transition: all 0.3s ease;
                           box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
                           text-transform: uppercase;
                           letter-spacing: 0.5px;"
                    id="{{ $specs_type }}-input-discard-btn"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(220, 53, 69, 0.4)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(220, 53, 69, 0.3)';"
                    onclick="document.getElementById('{{ $specs_type }}-input').value = ''; document.getElementById('{{ $specs_type }}-input').dispatchEvent(new Event('change'));">
                Discard
            </button>
        </div>
    </div>
</div>

<style>
/* Card hover effects */
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.4) !important;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

/* Card footer styling */
.card-footer {
    background: linear-gradient(135deg, rgba(108, 117, 125, 0.1) 0%, rgba(52, 58, 64, 0.1) 100%);
}

/* Responsive spacing */
@media (max-width: 768px) {
    .card {
        margin: 0 5px 20px 5px;
    }
}
</style>