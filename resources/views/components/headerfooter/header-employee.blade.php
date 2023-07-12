<div class="nav">
    <form action="/logout" method="post">
        @csrf
        <button class="logout-button" type="submit" style="cursor:pointer; height:79px;font-family: 'Open Sans', sans-serif;">LOGOUT</button>
    <div class="content-margin">


        <div class="nav-header">
            <div class="nav-title"  style="display:flex">
                <a style="text-decoration: none" href="{{route('employe')}}">
                    <h1 style="margin :15px 15px; font-family: 'Fugaz One', cursive;"><span id="yellow">Riad</span> <span id="red">Baraka</span></h1>
                </a>
                {{-- <h1 style="margin :15px 15px; font-family: 'Fugaz One', cursive;"><span id="yellow">Riad</span> <span id="red">Baraka</span></h1> --}}
                {{-- <img src="/images/24chicken-logo.png" id="logo"> --}}
                {{-- <p>Hello, <span id="red">{{ auth()->user()->firstname }}</span>!</p> --}}
            </div>
        </div>

        <div class="nav-btn">
            <label for="nav-check">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </label>
        </div>

        <div class="nav-links">
            {{-- <a href="{{ url('employee') }}">Orders</a> --}}
        </div>
    </div>
    </form>
</div>
