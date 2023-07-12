@if(session()->has('success'))
    <style>
        .flash-success{
            margin-top: 5px;
            text-align: center;
            width: 10rem;
            background:#78c1ff 50%;
            color: white;
            padding: 3px;
            border-radius: 10px;
            font-size:12px;
            margin:0 auto;
            margin-top: 10px;
        }
    </style>

    <div class="flash-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
