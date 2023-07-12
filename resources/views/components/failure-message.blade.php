@if(session()->has('failure'))
    <style>
        .flash-failure{
            margin-top: 5px;
            text-align: center;
            width: 10rem;
            background:#D62525 50%;
            color: white;
            padding: 3px;
            border-radius: 10px;
            font-size:14px;
            margin:0 auto;
        }
    </style>

    <div class="flash-failure">
        <p>{{ session('failure') }}</p>
    </div>
@endif
