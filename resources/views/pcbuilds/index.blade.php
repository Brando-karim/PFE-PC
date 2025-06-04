@php
    use App\Models\User;

    $role = Auth::user()->role;
    $title = ($role === User::ROLE_USER ? 'Your' : 'Manage') . ' PC Builds';
@endphp

@extends('Master')
@section('title', $title)
@section('content')
<style>
    .admin-btn {
        min-width: 90px;
        height: fit-content;
        padding: 0px;
    }

    /* Button Enhancements */
    .btn-gradient-primary {
        background: linear-gradient(45deg, #5c32a3, #7b4cbf);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-gradient-success {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-gradient-info {
        background: linear-gradient(45deg, #17a2b8, #20c997);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-gradient-warning {
        background: linear-gradient(45deg, #ffc107, #fd7e14);
        border: none;
        color: white;
        transition: all 0.3s ease;
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

    /* Enhanced Card Styling */
    .col {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow: hidden;
        border: 1px solid #e5e7eb;
        position: relative;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .col:nth-child(1) { animation-delay: 0.1s; }
    .col:nth-child(2) { animation-delay: 0.2s; }
    .col:nth-child(3) { animation-delay: 0.3s; }
    .col:nth-child(4) { animation-delay: 0.4s; }
    .col:nth-child(5) { animation-delay: 0.5s; }
    .col:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .col:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }

    /* Card Header */
    .col .d-flex:first-child {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        align-items: flex-start;
        position: relative;
    }

    .col .d-flex:first-child::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #2563eb, #7c3aed, #16a34a);
        background-size: 200% 100%;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* Card Image */
    .col img {
        border-radius: 0.75rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        border: 2px solid #e5e7eb;
        padding: 0.5rem;
        background: white;
        transition: all 0.3s ease;
    }

    .col:hover img {
        transform: rotate(5deg) scale(1.1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    /* Card Title */
    .col strong {
        font-size: 1.375rem;
        font-weight: 700;
        color: #111827;
        display: block;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Order Status Badge */
    .col:has(form button[value="0"]) {
        border-left: 4px solid #d97706;
        position: relative;
    }

    .col:has(form button[value="0"])::after {
        content: 'ORDERED';
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #d97706, #f59e0b);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
        animation: pulse 2s infinite;
        box-shadow: 0 4px 6px -1px rgba(217, 119, 6, 0.3);
    }

    @keyframes pulse {
        0%, 100% { 
            opacity: 1; 
            transform: scale(1);
        }
        50% { 
            opacity: 0.8; 
            transform: scale(1.05);
        }
    }

    /* User Badge */
    .col div:contains("User:") {
        background: linear-gradient(135deg, #0891b2, #06b6d4);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: inline-block;
        box-shadow: 0 2px 4px -1px rgba(8, 145, 178, 0.3);
    }

    /* Waiting Order Status */
    .col div:contains("Waiting Order...") {
        background: linear-gradient(135deg, rgba(217, 119, 6, 0.1), rgba(245, 158, 11, 0.1));
        color: #d97706;
        border: 1px solid rgba(217, 119, 6, 0.2);
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        position: relative;
        overflow: hidden;
    }

    .col div:contains("Waiting Order...")::before {
        content: '⏰';
        animation: bounce 1s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    /* Action Buttons Container */
    .col .d-flex.gap-3 {
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        border-top: 1px solid #e5e7eb;
        justify-content: flex-end;
    }

    /* Enhanced Button Styles */
    .btn-danger {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
        color: white;
        border: none;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        box-shadow: 0 2px 4px -1px rgba(220, 53, 69, 0.3);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #fd7e14, #dc3545);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px -3px rgba(220, 53, 69, 0.4);
    }

    .admin-btn[value="1"] {
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: white;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px -1px rgba(22, 163, 74, 0.3);
    }

    .admin-btn[value="1"]:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px -3px rgba(22, 163, 74, 0.4);
    }

    .admin-btn[value="0"] {
        background: linear-gradient(135deg, #d97706, #c2410c);
        color: white;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px -1px rgba(217, 119, 6, 0.3);
    }

    .admin-btn[value="0"]:hover {
        background: linear-gradient(135deg, #c2410c, #9a3412);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px -3px rgba(217, 119, 6, 0.4);
    }

    /* Products Section */
    .col > div:last-child {
        padding: 1.5rem;
        background: white;
    }

    .col h2 {
        font-size: 1.125rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
    }

    .col h2::before {
        content: '🔧';
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .col h2::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 30%;
        height: 2px;
        background: linear-gradient(90deg, #2563eb, #7c3aed);
        border-radius: 1px;
    }

    /* Product Items */
    .col .ps-4 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
        margin-left: 0;
        padding-left: 0;
        transition: all 0.2s ease;
    }

    .col .ps-4:hover {
        background: linear-gradient(135deg, #f9fafb, #f3f4f6);
        padding-left: 0.5rem;
        border-radius: 0.25rem;
    }

    .col .ps-4:last-of-type {
        border-bottom: none;
    }

    /* Total Price */
    .col div[align="right"] {
        background: linear-gradient(135deg, #16a34a, #22c55e);
        color: white;
        padding: 1rem;
        border-radius: 0.75rem;
        text-align: center;
        margin-top: 1rem;
        font-weight: 700;
        font-size: 1.125rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(22, 163, 74, 0.3);
    }

    .col div[align="right"]::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .col div[align="right"]::after {
        content: '💰';
        position: absolute;
        top: 0.5rem;
        right: 0.75rem;
        font-size: 1.2rem;
        animation: bounce 2s infinite;
    }

    /* SVG Icon Enhancement */
    .col svg {
        transition: all 0.3s ease;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }

    .btn-danger:hover svg {
        transform: scale(1.1) rotate(10deg);
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
    }

    /* Card Glow Effect on Hover */
    .col::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(124, 58, 237, 0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        border-radius: 1rem;
    }

    .col:hover::before {
        opacity: 1;
    }
</style>
<div class="container">
    @include('flash')

    <h1>{{ $title }}</h1>
    <div class="mt-4 d-flex gap-4">
        <a href="{{ route('pcbuilds.create') }}" class="btn btn-gradient-primary btn-lg action-btn">
            <i class="fas fa-plus-circle me-2"></i>
            New PC Build
        </a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-5 gy-4">
        @foreach ($pcbuilds as $build)
            <div class="col d-flex flex-column gap-4">
                <div class="d-flex gap-4">
                    <div>
                        <img src="{{ asset('img/icons/pc-build.png') }}"
                             width="64" height="64">
                    </div>
                    <div>
                        @if ($role === User::ROLE_ADMIN && $build->user)
                        <div>User: {{ $build->user->name }}</div>
                        @endif
                        <strong>{{ $build->name }}</strong>
                        @if ($build->is_ordered)
                        <div class="d-flex gap-4">
                            <div>Waiting Order...</div>
                            @if ($role === User::ROLE_USER)
                            <form action="{{ route('pcbuilds.update',  $build->id) }}"
                                  method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" name="order" class="btn admin-btn px-4 py-1"
                                        value="0">
                                    Cancel Order
                                </button>
                            </form>
                            @endif
                        </div>
                        @elseif ($role === User::ROLE_USER)
                        <form action="{{ route('pcbuilds.update',  $build->id) }}"
                              method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" name="order" class="btn admin-btn px-4 py-1"
                                    value="1">
                                Order Now
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <form action="{{ route('pcbuilds.destroy',  $build->id) }}"
                          method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger admin-btn"
                                value="delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <h2>Products:</h2>
                    @foreach ($build->articles as $article)
                    <div class="ps-4">
                        <strong>{{ $article->Titre }}:</strong>
                        {{ $article->Price }}
                    </div>
                    @endforeach
                    <div align="right">
                        <strong>Current Total Price:</strong>
                        {{ $build->totalPrice() . ' DH' }}
                    </div>
                </div>
            </div>
        @endforeach
    <div>
</div>
@endsection