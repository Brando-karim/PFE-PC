@php
use App\Models\PCPartSpecs;
@endphp

@extends('Master')
@section('title', 'New PC Build')
@section('content')
<style>
    .admin-btn {
        min-width: 90px;
        height: fit-content;
        padding: 0px;
    }

    /* Enhanced Button Styles with Modern Design */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        border: none;
        color: white;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(17, 153, 142, 0.3);
    }

    .btn-gradient-info {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(23, 162, 184, 0.3);
    }

    .btn-gradient-warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        color: white;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);
    }

    .action-btn {
        position: relative;
        overflow: hidden;
        transform: translateY(0);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .action-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .action-btn:hover:before {
        left: 100%;
    }

    /* NEW ANIMATION ENHANCEMENTS */
    
    /* Page Load Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(128, 0, 238, 0.7);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(128, 0, 238, 0);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0,0,0);
        }
        40%, 43% {
            transform: translate3d(0, -15px, 0);
        }
        70% {
            transform: translate3d(0, -8px, 0);
        }
        90% {
            transform: translate3d(0, -3px, 0);
        }
    }

    /* Container Animation */
    .container {
        animation: fadeInUp 0.8s ease-out;
    }

    /* Title Animation */
    h1 {
        animation: slideInLeft 0.6s ease-out 0.2s both;
        position: relative;
        overflow: hidden;
    }

    h1::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(45deg, #5c32a3, #7b4cbf);
        animation: expandWidth 1s ease-out 0.8s both;
    }

    @keyframes expandWidth {
        to {
            width: 100%;
        }
    }

    /* Enhanced Form Input with Modern Design */
    .form-control {
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 15px 20px;
        font-size: 1.1rem;
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        box-shadow: 
            inset 0 2px 4px rgba(0,0,0,0.06),
            0 1px 3px rgba(0,0,0,0.04);
        position: relative;
        overflow: hidden;
        animation: slideInRight 0.6s ease-out 0.4s both;
    }

    .form-control::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        transition: left 0.6s ease;
        z-index: -1;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 
            0 0 0 3px rgba(102, 126, 234, 0.1),
            0 8px 25px rgba(102, 126, 234, 0.15),
            inset 0 2px 4px rgba(0,0,0,0.06);
        transform: translateY(-2px);
        background: #ffffff;
    }

    .form-control:focus::before {
        left: 100%;
    }

    .form-control::placeholder {
        color: #adb5bd;
        transition: color 0.3s ease;
    }

    .form-control:focus::placeholder {
        color: #6c757d;
    }

    /* Enhanced Section Headers with Decorations */
    .section-header {
        animation: pulse 2s infinite;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #8B5CF6 100%);
        background-size: 300% 300%;
        animation: shimmerBackground 4s ease-in-out infinite, slideInLeft 0.8s ease-out both;
        border-radius: 20px !important;
        box-shadow: 
            0 10px 30px rgba(102, 126, 234, 0.3),
            0 5px 15px rgba(0,0,0,0.1),
            inset 0 1px 0 rgba(255,255,255,0.2);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .section-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        animation: slideAcross 3s ease-in-out infinite;
    }

    @keyframes slideAcross {
        0%, 100% { left: -100%; }
        50% { left: 100%; }
    }

    .section-header::after {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffd93d, #ff6b6b);
        background-size: 400% 400%;
        border-radius: 22px;
        z-index: -1;
        animation: gradientRotate 4s ease infinite;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .section-header:hover::after {
        opacity: 1;
    }

    @keyframes gradientRotate {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes shimmerBackground {
        0%, 100% { background-position: 0% 50%; }
        25% { background-position: 100% 25%; }
        50% { background-position: 100% 100%; }
        75% { background-position: 0% 75%; }
    }

    /* Cards Container Animation */
    .cards-container {
        animation: slideInRight 0.8s ease-out 0.6s both;
    }

    .cards-container .row > * {
        animation: fadeInUp 0.6s ease-out both;
    }

    .cards-container .row > *:nth-child(1) { animation-delay: 0.1s; }
    .cards-container .row > *:nth-child(2) { animation-delay: 0.2s; }
    .cards-container .row > *:nth-child(3) { animation-delay: 0.3s; }
    .cards-container .row > *:nth-child(4) { animation-delay: 0.4s; }
    .cards-container .row > *:nth-child(5) { animation-delay: 0.5s; }
    .cards-container .row > *:nth-child(6) { animation-delay: 0.6s; }

    /* Enhanced Selected Component Card */
    .selected-component {
        animation: slideInLeft 0.6s ease-out 0.3s both;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 25px;
        padding: 25px;
        box-shadow: 
            0 15px 35px rgba(102, 126, 234, 0.2),
            0 5px 15px rgba(0,0,0,0.1),
            inset 0 1px 0 rgba(255,255,255,0.2);
        position: relative;
        overflow: hidden;
    }

    .selected-component::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: rotate 4s linear infinite;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .selected-component:hover::before {
        opacity: 1;
    }

    .selected-component:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 
            0 25px 50px rgba(102, 126, 234, 0.3),
            0 15px 35px rgba(0,0,0,0.15),
            inset 0 1px 0 rgba(255,255,255,0.3);
    }

    .selected-component .card {
        background: rgba(255,255,255,0.95) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2) !important;
        border-radius: 20px !important;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
        position: relative;
        z-index: 2;
    }

    /* Button Submit Area */
    .submit-area {
        animation: fadeInUp 0.8s ease-out 1s both;
    }

    .submit-area .action-btn {
        position: relative;
    }

    .submit-area .action-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255,255,255,0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
    }

    .submit-area .action-btn:hover::after {
        width: 300px;
        height: 300px;
    }

    /* Loading Animation for Dynamic Content */
    .loading {
        position: relative;
        overflow: hidden;
    }

    .loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmer 1.5s infinite;
    }

    /* Enhanced Card Styles */
    .interactive-card {
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        box-shadow: 
            0 8px 32px rgba(0,0,0,0.08),
            0 2px 8px rgba(0,0,0,0.04),
            inset 0 1px 0 rgba(255,255,255,0.9);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .interactive-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #5c32a3, #7b4cbf, #9b59b6, #5c32a3);
        background-size: 200% 100%;
        opacity: 0;
        transition: opacity 0.3s ease;
        animation: shimmer 3s linear infinite;
    }

    .interactive-card:hover::before {
        opacity: 1;
    }

    .interactive-card:hover {
        transform: translateY(-12px) scale(1.03);
        box-shadow: 
            0 25px 50px rgba(123, 76, 191, 0.15),
            0 15px 35px rgba(0,0,0,0.1),
            0 5px 15px rgba(123, 76, 191, 0.1),
            inset 0 1px 0 rgba(255,255,255,1);
        border-color: rgba(123, 76, 191, 0.2);
    }

    /* Glass morphism effect for cards */
    .interactive-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .interactive-card:hover::after {
        opacity: 1;
    }

    /* Card content styling */
    .interactive-card .card {
        background: transparent !important;
        border: none !important;
        position: relative;
        z-index: 2;
    }

    .interactive-card .card-img-top {
        transition: all 0.4s ease;
        border-radius: 15px;
        margin: 15px;
        width: calc(100% - 30px);
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .interactive-card:hover .card-img-top {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .interactive-card .card-body {
        position: relative;
        padding: 20px !important;
    }

    .interactive-card .card-title {
        font-weight: 600;
        color: #000000;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .interactive-card:hover .card-title {
        color: #000000;
    }

    .interactive-card .card-text {
        color: #6c757d;
        line-height: 1.6;
        transition: color 0.3s ease;
    }

    .interactive-card:hover .card-text {
        color: #495057;
    }

    /* Pagination Animation */
    .pagination {
        animation: fadeInUp 0.6s ease-out 0.8s both;
    }

    .pagination .page-link {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .pagination .page-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #5c32a3, #7b4cbf);
        transition: left 0.3s;
        z-index: -1;
    }

    .pagination .page-link:hover::before {
        left: 0;
    }

    .pagination .page-link:hover {
        color: white;
        transform: scale(1.1);
    }

    /* Stagger Animation for Sections */
    .pc-section {
        animation: fadeInUp 0.8s ease-out both;
    }

    .pc-section:nth-child(1) { animation-delay: 0.1s; }
    .pc-section:nth-child(2) { animation-delay: 0.2s; }
    .pc-section:nth-child(3) { animation-delay: 0.3s; }
    .pc-section:nth-child(4) { animation-delay: 0.4s; }
    .pc-section:nth-child(5) { animation-delay: 0.5s; }

    /* Success Animation (for when items are selected) */
    @keyframes successPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(40, 167, 69, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
        }
    }

    .success-selected {
        animation: successPulse 0.8s ease-out;
        border: 2px solid #28a745 !important;
    }

    /* Micro-interactions */
    .btn:active {
        transform: scale(0.95);
    }

    /* Responsive animations */
    @media (max-width: 768px) {
        .container {
            animation-duration: 0.6s;
        }
        
        h1, .form-control, .section-header {
            animation-duration: 0.4s;
        }
    }

    /* Smooth scroll for better UX */
    html {
        scroll-behavior: smooth;
    }

    /* Focus animations for accessibility */
    *:focus {
        outline: 2px solid #7b4cbf;
        outline-offset: 2px;
        transition: outline 0.2s ease;
    }
</style>
<div class="container">
    @include('flash')
    <h1>New PC Build</h1>
    <form method="POST" action="{{ route('pcbuilds.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" class="form-control fs-3 mt-5" required>
        @foreach($build_articles as $type => $articles)
            @php $type_name = str_replace(" ", "_", $type); @endphp
            <div class="pc-section">
                <input type="hidden" name="{{ $type_name }}" id="{{ $type_name }}-input">
                <h2 class="fw-bold text-light mt-4 mb-4 p-3 rounded-4 section-header">
                    {{ ucwords($type) }}:
                </h2>
                <div class='d-flex flex-sm-row flex-column gap-5'>
                    <div style="min-width: 320px;" class="selected-component">
                        @include('pcbuilds.components.selected', [
                            'specs_type' => $type_name,
                            'icon' => PCPartSpecs::TYPE_ICONS[$type]
                        ])
                    </div>
                    <div class="cards-container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
                        @foreach ($articles as $article)
                            <div class="interactive-card">
                                @include('pcbuilds.components.article', [
                                    'article' => $article,
                                    'specs_type' => $type_name,
                                ])
                            </div>
                        @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $articles->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById("{{ $type_name }}-input")
                        .addEventListener("change", function (event) {
                            for (let article of document.getElementsByClassName("{{ $type_name }}-selected-btn")) {
                                article.style.display = "none";
                            }
                            for (let article of document.getElementsByClassName("{{ $type_name }}-select-btn")) {
                                article.style.display = "block";
                            }

                            if (event.target.value) {
                                const article = document.getElementById(
                                    `{{ $type_name }}-article-${event.target.value}`
                                );
                                article.getElementsByClassName("{{ $type_name }}-selected-btn")[0].style.display = "block";
                                article.getElementsByClassName("{{ $type_name }}-select-btn")[0].style.display = "none";

                                // Selected Article
                                let found = false;
                                @foreach ($articles as $article)
                                if (!found && "{{ $article->id }}" == event.target.value) {
                                    found = true;
                                    let img = document.getElementById("{{ $type_name }}-input-article-img");
                                    img.src = "{{ $article->Img }}";
                                    img.alt = "Image of {{ $article->Titre }}";
                                    document.getElementById("{{ $type_name }}-input-article-titre").innerHTML = "{{ $article->Titre }}";
                                    document.getElementById("{{ $type_name }}-input-article-price").innerHTML = "{{ $article->Price }}";
                                    document.getElementById("{{ $type_name }}-input-price-ul").style.display = "block";
                                    document.getElementById("{{ $type_name }}-input-discard-btn").style.display = "block";
                                }
                                @endforeach
                            }
                            else {
                                document.getElementById("{{ $type_name }}-input-article-img").src = "{{ asset(PCPartSpecs::TYPE_ICONS[$type]) }}";
                                document.getElementById("{{ $type_name }}-input-article-titre").innerHTML = "";
                                document.getElementById("{{ $type_name }}-input-article-price").innerHTML = "";
                                document.getElementById("{{ $type_name }}-input-price-ul").style.display = "none";
                                document.getElementById("{{ $type_name }}-input-discard-btn").style.display = "none";
                            }
                        });
            </script>
        @endforeach
        <div class="d-flex justify-content-end gap-4 submit-area">
            <input type="submit" value="Save" class="btn btn-gradient-info action-btn">
            <input type="submit" value="Save & Order" name="order" class="btn btn-gradient-primary action-btn">
        </div>
    </form>
</div>
@endsection