@extends('Master')
@section('title', $Categorie . ' Products')
@section('content')

<style>
  .product-card {
    background: linear-gradient(145deg, #2d3748, #1a202c);
    border: 1px solid #4a5568;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .product-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    border-color: #63b3ed;
  }

  .product-image {
    position: relative;
    overflow: hidden;
    height: 280px;
  }

  .product-image img {
    width: 100%;
    height: 100%;
    object-fit: {{ $Categorie == 'Consoles' ? 'contain' : 'cover' }};
    transition: transform 0.3s ease;
  }

  .product-card:hover .product-image img {
    transform: scale(1.1);
  }

  .product-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .product-card:hover .product-image::after {
    opacity: 1;
  }

  .product-content {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .product-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #f7fafc;
    margin-bottom: 0.75rem;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .product-description {
    color: #a0aec0;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .product-price {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    margin: 0 -1.5rem 1.5rem -1.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    text-align: center;
    border-top: 1px solid #4a5568;
  }

  .product-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
  }

  .btn-primary-custom {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .btn-primary-custom:hover {
    background: linear-gradient(135deg, #3182ce 0%, #2c5282 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(66, 153, 225, 0.4);
    color: white;
    text-decoration: none;
  }

  .action-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .view-icon {
    background: rgba(72, 187, 120, 0.2);
    color: #48bb78;
    border: 1px solid #48bb78;
  }

  .view-icon:hover {
    background: #48bb78;
    color: white;
    transform: scale(1.1);
  }

  .edit-icon {
    background: rgba(237, 137, 54, 0.2);
    color: #ed8936;
    border: 1px solid #ed8936;
  }

  .edit-icon:hover {
    background: #ed8936;
    color: white;
    transform: scale(1.1);
  }

  .delete-icon {
    background: rgba(245, 101, 101, 0.2);
    color: #f56565;
    border: 1px solid #f56565;
  }

  .delete-icon:hover {
    background: #f56565;
    color: white;
    transform: scale(1.1);
  }

  .admin-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
  }

  .page-header {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem 0;
  }

  .page-title {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
  }

  .page-subtitle {
    color: #a0aec0;
    font-size: 1.1rem;
  }

  .products-grid {
    padding: 0 2rem;
  }

  @media (max-width: 768px) {
    .products-grid {
      padding: 0 1rem;
    }
    
    .product-actions {
      flex-direction: column;
      gap: 0.75rem;
    }
    
    .admin-actions {
      justify-content: center;
    }
  }

  .brand-filter {
    background: rgba(45, 55, 72, 0.8);
    padding: 1.5rem;
    border-radius: 12px;
    backdrop-filter: blur(10px);
  }

  .brand-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    transition: all 0.3s ease;
    font-size: 0.9rem;
  }

  .brand-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
  }

  .brand-btn.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-color: transparent;
  }

  .no-products-container {
    background: rgba(45, 55, 72, 0.9);
    padding: 2rem;
    border-radius: 12px;
    backdrop-filter: blur(10px);
    max-width: 400px;
    margin: 0 auto;
    animation: fadeIn 0.5s ease-in;
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  .no-products-container h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .no-products-container p {
    font-size: 1.1rem;
  }
</style>

<div class="page-header">
  <h1 class="page-title">
    @if($Categorie == 'Consoles')
      Our Premium Consoles
    @elseif($Categorie == 'Components')
      High-Performance Components
    @elseif($Categorie == 'Accescoires')
      Essential Accessories
    @elseif($Categorie == 'Setup')
      Complete Gaming Setups
    @else
      Our Products
    @endif
  </h1>
  <p class="page-subtitle">Discover our carefully curated collection of {{ strtolower($Categorie) }}</p>
</div>

<!-- Brand Filter Section -->
<div class="container mb-4">
  <div class="brand-filter">
    <h5 class="text-white mb-3">Filter by Brand:</h5>
    <div class="d-flex flex-wrap gap-2">
      <button class="brand-btn active" data-brand="all">All Brands</button>
      <button class="brand-btn" data-brand="asus">ASUS</button>
      <button class="brand-btn" data-brand="msi">MSI</button>
      <button class="brand-btn" data-brand="gigabyte">GIGABYTE</button>
      <button class="brand-btn" data-brand="amd">AMD</button>
      <button class="brand-btn" data-brand="nvidia">NVIDIA</button>
      <button class="brand-btn" data-brand="intel">Intel</button>
      <button class="brand-btn" data-brand="aorus">AORUS</button>
      <button class="brand-btn" data-brand="kingston">KINGSTON</button>
      <button class="brand-btn" data-brand="toughram">TOUGHRAM</button>
      <button class="brand-btn" data-brand="lexar">LEXAR</button>
      <button class="brand-btn" data-brand="samsung">Samsung</button>
      <button class="brand-btn" data-brand="setup game">SETUP GAME</button>
    </div>
  </div>
</div>

<div class="products-grid">
  <div class="row row-cols-1 row-cols-md-{{ $Categorie == 'Consoles' ? '2' : '3' }} row-cols-lg-{{ $Categorie == 'Consoles' ? '3' : '4' }} g-4">
    @foreach ($produits as $p)
    <div class="col">
      <div class="product-card">
        <div class="product-image">
          <img src="{{ $p->Img }}" alt="Image of {{ $p->Titre }}" loading="lazy">
        </div>
        
        <div class="product-content">
          <h5 class="product-title">{{ $p->Titre }}</h5>
          <p class="product-description">{{ $p->Contenu }}</p>
        </div>
        
        <div class="product-price">
          {{ $p->Price }}
        </div>
        
        <div class="product-actions">
          <a href="/produits/{{ $p->id }}" class="btn-primary-custom">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
              <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
            </svg>
            Buy Now
          </a>
          
          <div class="admin-actions">
            <a href="/produits/{{ $p->id }}" class="action-icon view-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
              </svg>
            </a>
            
            @if(Auth::check() && Auth::user()->role === App\Models\User::ROLE_ADMIN)
              <a href="{{ route('produits.edit', $p) }}" class="action-icon edit-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                </svg>
              </a>
              
              <form action="{{ route('produits.destroy', $p->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="action-icon delete-icon" 
                        onclick="return confirm('Are you sure you want to delete this product?')"
                        style="border: none; background: rgba(245, 101, 101, 0.2);">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                  </svg>
                </button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- No Products Message -->
<div id="no-products-message" class="text-center py-5" style="display: none;">
  <div class="no-products-container">
    <h3 class="text-white mb-2">NO PRODUCTS ARE IN THIS PAGE</h3>
    <p class="text-gray-400">LOOK IN OTHER PAGINATION</p>
  </div>
</div>

<div class="d-flex justify-content-center mt-5 mb-4">
  {{ $produits->links('vendor.pagination.custom') }}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const brandButtons = document.querySelectorAll('.brand-btn');
  const productCards = document.querySelectorAll('.product-card');
  const paginationLinks = document.querySelectorAll('.pagination a');
  const noProductsMessage = document.getElementById('no-products-message');

  brandButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      brandButtons.forEach(btn => btn.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');

      const selectedBrand = this.dataset.brand;
      let visibleProducts = 0;

      productCards.forEach(card => {
        const productContent = card.querySelector('.product-description').textContent.toLowerCase();
        
        if (selectedBrand === 'all' || productContent.includes(selectedBrand.toLowerCase())) {
          card.style.display = 'block';
          visibleProducts++;
        } else {
          card.style.display = 'none';
        }
      });

      // Show/hide no products message
      if (visibleProducts === 0) {
        noProductsMessage.style.display = 'block';
      } else {
        noProductsMessage.style.display = 'none';
      }
    });
  });

  // Store the selected brand in localStorage when changing pages
  paginationLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const activeBrand = document.querySelector('.brand-btn.active');
      if (activeBrand) {
        localStorage.setItem('selectedBrand', activeBrand.dataset.brand);
      }
    });
  });

  // Restore the selected brand when page loads
  const savedBrand = localStorage.getItem('selectedBrand');
  if (savedBrand) {
    const brandButton = document.querySelector(`.brand-btn[data-brand="${savedBrand}"]`);
    if (brandButton) {
      brandButton.click();
    }
    localStorage.removeItem('savedBrand');
  }
});
</script>

@endsection
