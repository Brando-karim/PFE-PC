@extends('Master')
@section('title', 'PC Parts Specifications')
@section('content')
<div class="container">
    <style>
        .admin-btn {
            min-width: 90px;
            height: fit-content;
            padding: 0px;
        }
    </style>

    @include('flash')

    <h1>Pc Parts Specifications</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-5 gy-4">
        @foreach ($pcpartspecs as $specs)
            <div class="col d-flex flex-column gap-4">
                <div class="d-flex gap-4">
                    <div>
                        <img src="{{ $specs->get_icon() }}" width="64" height="64">
                    </div>
                    <div>
                        <div>
                            <strong>{{ $specs->name }}</strong>
                        </div>
                        <div>Type: {{ $specs->type }}</div>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <form action="{{ route('pcpartspecs.destroy',  $specs->id) }}"
                          method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger admin-btn"
                                value="delete">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="30" viewBox="0,0,256,256">
                                <g fill="#eb0808" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z"></path></g></g>
                            </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <h2>Specs:</h2>
                    @foreach ($specs->get_details() as $name => $value)
                    <div class="ps-4">
                        <strong>{{ $name }}:</strong> {{ $value }}
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    <div>
</div>
@endsection
