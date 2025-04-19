@extends('Master')
@section('title',$Categorie.' Products')
@section('content')
<style>
  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
</style>
<h1 align='center'>    {{
  $Categorie == 'Consoles' ? '-- Our Consoles --' :
  ($Categorie == 'Games' ? '-- Our Games --' :
  ($Categorie == 'Accescoires' ? 'Our Accescoires' : "Our Setup's"))
}}</h1>
<div class="row row-cols-1 row-cols-md-{{ $Categorie == 'Consoles' ? 2 : 4 }} g-4 p-5" >

@foreach ($produits as $p) 
    
<div class="col ">
  <div class="card h-100 bg-dark" style="color: white ">
      <img src="{{ $p->Img }}" alt="Image of {{ $p->Titre }}" class="card-img-top" alt="..." style="height:414px; {{ $Categorie == 'Consoles' ? 'object-fit:contain' : 'object-fit:cover' }};">
      <div class="card-body">
          <h5 class="card-title">{{ $p->Titre }}</h5>
          <p class="card-text">{{ $p->Contenu }}</p>
      </div>
      <ul class="list-group list-group-flush">
          <li class="list-group-item bg-dark" style="color: white">{{ $p->Price }}</li>
      </ul>
      <div class="card-body d-flex justify-content-between align-items-center">
          <button class="btn">
              <a href="/produits/{{$p->id}}" class="card-link">Buy</a>
          </button>

          {{-- View Button --}}
          <a href="/produits/{{$p->id}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 795 614">
              <path fill="currentColor" 
              d="M397.25 278c38 0 69 31 69 69s-31 68-69 68s-68-30-68-68s30-69 68-69zm0-170c226 0 389 212 389 212c11 14 11 39 0 53c0 0-163 212-389 212s-389-212-389-212c-11-14-11-39 0-53c0 0 163-212 389-212zm0 410c94 0 171-77 171-171s-77-171-171-171s-171 77-171 171s77 171 171 171z"/>
            </svg>        </a>
          
      </div>
     
      <div class="card-body d-flex  align-items-center  justify-content-between">
        @if(Auth::check() && Auth::user()->role === App\Models\User::ROLE_ADMIN)
              {{-- Delete Button --}}
            <form action="{{ route('produits.destroy',  $p->id) }}" method="POST">                 
              @csrf 
                @method('delete') 
                <button type="submit" class="btn btn-danger" value="delete" > 
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256">
              <g fill="#eb0808" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z"></path></g></g>
              </svg>     
                </button> 
              </form>
              
                        {{-- Modify Button --}}
          <a href="{{route('produits.edit', $p)}}">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25la" viewBox="0,0,256,256">
              <g fill="#44cb3d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M43.125,2c-1.24609,0 -2.48828,0.48828 -3.4375,1.4375l-0.8125,0.8125l6.875,6.875c-0.00391,0.00391 0.8125,-0.8125 0.8125,-0.8125c1.90234,-1.90234 1.89844,-4.97656 0,-6.875c-0.95312,-0.94922 -2.19141,-1.4375 -3.4375,-1.4375zM37.34375,6.03125c-0.22656,0.03125 -0.4375,0.14453 -0.59375,0.3125l-32.4375,32.46875c-0.12891,0.11719 -0.22656,0.26953 -0.28125,0.4375l-2,7.5c-0.08984,0.34375 0.01172,0.70703 0.26172,0.95703c0.25,0.25 0.61328,0.35156 0.95703,0.26172l7.5,-2c0.16797,-0.05469 0.32031,-0.15234 0.4375,-0.28125l32.46875,-32.4375c0.39844,-0.38672 0.40234,-1.02344 0.01563,-1.42187c-0.38672,-0.39844 -1.02344,-0.40234 -1.42187,-0.01562l-32.28125,32.28125l-4.0625,-4.0625l32.28125,-32.28125c0.30078,-0.28906 0.39063,-0.73828 0.22266,-1.12109c-0.16797,-0.38281 -0.55469,-0.62109 -0.97266,-0.59766c-0.03125,0 -0.0625,0 -0.09375,0z"></path></g></g>
              </svg>          </a>
              @endif
              
              
              


      </div>
    
      
  </div>
</div>
      @endforeach
</div>
<div class="d-flex justify-content-center mt-4">
  {{ $produits->links('vendor.pagination.custom') }}
</div>
@endsection