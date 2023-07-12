<div class="nav">
    <div class="content-margin">
        <input type="checkbox" id="nav-check">

        <div class="nav-header">
            <div class="nav-title">
                <a style="text-decoration: none" href="../landing">
                    <h1 style="margin-top:0; font-family: 'Fugaz One', cursive;"><span id="yellow">Riad</span> <span id="red">Baraka</span></h1>
                </a>
                {{-- <img src="../images/24chicken-logo.png" id="logo"> --}}
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
            <a href="{{route("landing")}}">Home</a>
            <a href="{{route("menu")}}">Menu</a>
            <a href="{{route('accont.edit')}}">Account</a>
            <form action="/logout" method="post">
                @csrf
                <button class="logout-button" type="submit" style="cursor:pointer; height:79px;font-family: 'Open Sans', sans-serif;">LOGOUT</button>
            </form>

        </div>

    </div>
</div>
