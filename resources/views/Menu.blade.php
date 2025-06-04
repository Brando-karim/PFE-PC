<header class="header active" data-header>
  <div class="container">

    <a href="/" class="logo">
      <img src="/img/Logo.png" width="110" height="53" alt="unigine home">
    </a>
    <li class="nav-item" style="margin-top: 2%; position: relative;margin-left: 2%">
      <form id="localeForm" action="{{ url('/') }}" method="get">
          <select id="locale" name="lang" onchange="changeLocale()"
                  style="border: 2px solid #007BFF;
                         border-radius: 8px;
                         padding: 5px 10px;
                         background: #f8f9fa;
                         color: #333;
                         font-weight: bold;
                         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                         cursor: pointer;
                         transition: all 0.3s ease;">
              <option value="ar" {{ App::getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
              <option value="fr" {{ App::getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
              <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>English</option>
          </select>
      </form>
  </li>

    <nav class="navbar" data-navbar>
      <ul class="navbar-list">

        <li class="navbar-item">
          <a href="/" class="navbar-link" data-nav-link>{{trans('home.nav1')}}</a>
        </li>


        <li class="navbar-item">
          <a href="/Produits/Components" class="navbar-link" data-nav-link>{{trans('home.nav2')}}</a>
        </li>

        <li class="navbar-item">
          <a href="/Produits/Consoles" class="navbar-link" data-nav-link>{{trans('home.nav3')}}</a>
        </li>



        <li class="navbar-item">
          <a href="/Produits/Accescoires" class="navbar-link" data-nav-link>{{trans('home.nav4')}}</a>
        </li>
        <li class="navbar-item">
          <a href="/Produits/Setup" class="navbar-link" data-nav-link>{{trans('home.nav5')}}</a>
        </li>
        <li class="navbar-item">
          <a href="/chatbot" class="navbar-link" data-nav-link>Chatbot</a>
        </li>
        @if(Auth::check())
      @if(Auth::user()->role === App\Models\User::ROLE_ADMIN)
      <li class="navbar-item">
      <a href="/dashboard" class="navbar-link" data-nav-link>{{trans('home.navA')}}</a>

      </li>
      <li class="navbar-item">
        <a href="/email-form" class="navbar-link" >Send Email</a>
      </li>
    @elseif(Auth::user()->role === App\Models\User::ROLE_USER)

      <li class="navbar-item">
      <a href="/dashboard" class="navbar-link" data-nav-link>{{trans('home.navCc')}}</a>
      </li>
      <li class="navbar-item">
      <a href="/cart" class="navbar-link" data-nav-link>{{trans('home.navCs')}}</a>
      </li>
    @endif

      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="form-inline"> @csrf
        <button type="submit" class="btn navbar-link">{{trans('home.Deconnect')}}</button>
        </form>
      </li>
    @else

        <li class="nav-item">
          <a class="navbar-link " href="/register">{{trans('home.navU')}}</a>
        </li>
        <li class="nav-item ">
          <a class="navbar-link btn " href="/login">{{trans('home.navAll')}}</a>
        </li>
  @endif
      </ul>
  </div>
  </nav>



  </ul>
  </nav>



  <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
    <span class="line line-1"></span>
    <span class="line line-2"></span>
    <span class="line line-3"></span>
  </button>

  </div>
</header>
<br>
<br>
<br>
<br>
<br>
<br>

<script>
    function changeLocale() {
        document.getElementById('localeForm').submit();
    }
</script>
