@extends('Master')
@section('title','Console Verse')
@section("content")

<div class="containervbn">
    <div class="top-row">
        <div class="aorus-chassis">
            <div class="chassis-content">
                <h2>AORUS C50X GAMING CHASSIS</h2>
                <h1>{{trans('home.p1')}}</h1>
                <a href="#" class="shop-now">{{trans('home.shop')}}→</a>
            </div>
        </div>
        <div class="gaming-collection">
            <div>
                <h2>{{trans('home.p2')}}</h2>
                <h1>{{trans('home.p3')}} </h1>
            </div>
            <a href="#" class="shop-now">{{trans('home.discover')}} →</a>
        </div>
    </div>
    <div class="bottom-row">
        <div class="rtx-40">
            <h2>{{trans('home.nvidia')}}</h2>
            <h1>GEFORCE RTX 50 SERIES</h1>
            <div class="price">$899.99</div>
            <a href="#" class="shop-now">{{trans('home.shop')}}→</a>
        </div>
        <div class="aorus-elite">
            <h2>{{trans('home.ao')}}</h2>
            <h1>AORUS MOUSE,KEYBOARD</h1>
            <div class="price">$199.99</div>
            <a href="#" class="shop-now">{{trans('home.shop')}} →</a>
        </div>
    </div>
    <h1 class="trending">{{trans('home.trend')}}</h1>
    <div class="containervb">

        <div class="product-grid">
            <!-- Product 1 -->
          @foreach ($produits as $p )
            
          
            <div class="product-card">
                <div class="product-category">{{ $p->Categorie }}</div>
                <img class="product-image" src="{{ $p->Img }}" alt="Cyberpunk PS4">
                <h3 class="product-title">{{ $p->Titre }}</h3>
                <div class="product-reviews">★★★★★ 5 reviews</div>
                <div class="product-price">{{ $p->Price }}</div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
      {{ $produits->links('vendor.pagination.custom') }}
    </div>
    <div class="power-supply-section">
        <div class="power-supply-content">
            <h2>ASUS OVERPOWER SETUP</h2>
            <h1>{{trans('home.your')}}<br>{{trans('home.power')}}</h1>
            <div class="original-price">$4999.99</div>
            <a href="#" class="shop-now">{{trans('home.shop')}}→</a>
        </div>
    </div>
</div>
</div>

      <!-- 
        - #NEWS
      -->
      <section class="section news" aria-label="our latest news" id="news" >
        <div class="container">

          <p class="section-subtitle" data-reveal="bottom">{{trans('home.mind')}}</p>

          <h2 class="h2 section-title" data-reveal="bottom">
            {{trans('home.head')}} <span class="span">{{trans('home.lines')}}</span>
          </h2>

          <p class="section-text" data-reveal="bottom">
            {{trans('home.desc')}}
          </p>

          <ul class="news-list">

            <li data-reveal="bottom">
              <div class="news-card">

                <figure class="card-banner img-holder" style="--width: 600; --height: 400;">
                  <img src="https://www.techpowerup.com/gallery/4772/1_550px.jpg" width="600" height="400" loading="lazy"
                    alt="Innovative Business All Over The World." class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-tag">{{trans('home.nav5')}}</a>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <time class="card-meta-text" datetime="2022-01-01">FEB 11 2024</time>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                      <p class="card-meta-text">Arthur Morgan</p>
                    </li>

                  </ul>

                  <h3 class="h3">
                    <a href="#" class="card-title">{{trans('home.cardT1')}}</a>
                  </h3>

                  <p class="card-text">
                    {{trans('home.card')}}
                  </p>

                  <a href="#" class="link has-before">{{trans('home.read')}}</a>

                </div>

              </div>
            </li>

            <li data-reveal="bottom">
              <div class="news-card">

                <figure class="card-banner img-holder" style="--width: 600; --height: 400;">
                  <img src="https://cdn1.epicgames.com/b30b6d1b4dfd4dcc93b5490be5e094e5/offer/RDR2476298253_Epic_Games_Wishlist_RDR2_2560x1440_V01-2560x1440-2a9ebe1f7ee202102555be202d5632ec.jpg" width="600" height="400" loading="lazy"
                    alt="How To Start Initiating An Startup In Few Days." class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-tag">{{trans('home.nav2')}}</a>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <time class="card-meta-text" datetime="2022-01-01">Jan 10 2025</time>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                      <p class="card-meta-text">Lucas Hood</p>
                    </li>

                  </ul>

                  <h3 class="h3">
                    
                    <a href="#" class="card-title"></a>
                  </h3>

                  <p class="card-text">
                    {{trans('home.card')}}
                  </p>

                  <a href="#" class="link has-before">{{trans('home.read')}}</a>

                </div>

              </div>
            </li>

            <li data-reveal="bottom">
              <div class="news-card">

                <figure class="card-banner img-holder" style="--width: 600; --height: 400;">
                  <img src="https://i.ytimg.com/vi/jsKqfuROno8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDNWXt2A18ywRwQA2SVC8BGmgs8Pw" width="600" height="400" loading="lazy"
                    alt="Financial Experts Support Help You To Find Out." class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-tag">{{trans('home.nav3')}}</a>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <time class="card-meta-text" datetime="2022-01-01">Jan 01 2025</time>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                      <p class="card-meta-text">Walter White</p>
                    </li>

                  </ul>

                  <h3 class="h3">
                    <a href="#" class="card-title">{{trans('home.cardT2')}}</a>
                  </h3>

                  <p class="card-text">
                    {{trans('home.card')}}
                  </p>

                  <a href="#" class="link has-before">{{trans('home.read')}}</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>


@endsection