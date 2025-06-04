<div class="col mb-4">
    <div class="card h-100 bg-dark shadow-lg border-0" style="color: white; transition: transform 0.3s ease, box-shadow 0.3s ease; margin: 0 10px;">
        <div class="position-relative overflow-hidden" style="border-radius: 0.375rem 0.375rem 0 0;">
            <img src="{{ $article->Img }}" alt="Image of {{ $article->Titre }}"
                 class="card-img-top" 
                 style="height: 180px; object-fit: cover; transition: transform 0.3s ease;">
            <div class="position-absolute top-0 end-0 m-2">
                <span class="badge bg-primary">New</span>
            </div>
        </div>
        
        <div class="card-body d-flex flex-column">
            <h3 class="card-title fw-bold mb-3" style="color: #000000; font-size: 1.25rem; line-height: 1.4;">
                {{ $article->Titre }}
            </h3>
            <div class="mt-auto">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-muted small">Price</span>
                    <span class="h5 mb-0 text-success fw-bold">{{ $article->Price }}</span>
                </div>
            </div>
        </div>
        
        <div class="card-footer bg-transparent border-0 p-3" id="{{ $specs_type }}-article-{{ $article->id }}">
            <div class="rounded-pill px-4 py-2 text-center {{ $specs_type }}-selected-btn"
                style="color: #ffffff; border: none; background: linear-gradient(45deg, #28a745, #20c997); display: none; font-weight: 600; box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);">
                ✓ Selected
            </div>
            <button type="button" class="btn w-100 {{ $specs_type }}-select-btn custom-select-btn"
                    style="background: linear-gradient(45deg, #007bff, #6610f2); 
                           border: none; 
                           color: white; 
                           font-weight: 600; 
                           padding: 12px 24px; 
                           border-radius: 25px; 
                           transition: all 0.3s ease;
                           box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
                           text-transform: uppercase;
                           letter-spacing: 0.5px;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0, 123, 255, 0.4)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 123, 255, 0.3)';"
                    onclick="document.getElementById('{{ $specs_type }}-input').value = '{{ $article->id }}'; document.getElementById('{{ $specs_type }}-input').dispatchEvent(new Event('change'));">
                Select Article
            </button>
        </div>
    </div>
</div>

<style>
/* Card spacing and hover effects */
.card {
    margin: 0 15px 30px 15px;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.4) !important;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

/* Custom button styling */
.custom-select-btn {
    position: relative;
    overflow: hidden;
}

.custom-select-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.custom-select-btn:hover::before {
    left: 100%;
}

.custom-select-btn:active {
    transform: translateY(1px) !important;
    box-shadow: 0 2px 10px rgba(0, 123, 255, 0.5) !important;
}

/* Selected button styling */
.{{ $specs_type }}-selected-btn {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
    50% {
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.6);
    }
    100% {
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
}

/* Card footer styling */
.card-footer {
    background: linear-gradient(135deg, rgba(108, 117, 125, 0.1) 0%, rgba(52, 58, 64, 0.1) 100%);
}

/* Badge styling */
.badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
}

/* Row spacing adjustment */
.row {
    margin: 0 -15px;
}

/* Responsive spacing */
@media (max-width: 768px) {
    .card {
        margin: 0 5px 20px 5px;
    }
}
</style>