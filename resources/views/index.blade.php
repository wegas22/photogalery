<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            padding: 20px;
            font-family: sans-serif;
            background: #f2f2f2;
        }
        img {
            width: 100%; /* need to overwrite inline dimensions */
            height: auto;
        }
        h2 {
            margin-bottom: .5em;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 1em;
        }


        /* hover styles */
        .location-listing {
            position: relative;
        }

        .location-image {
            line-height: 0;
            overflow: hidden;
        }

        .location-image img {
            filter: blur(0px);
            transition: filter 0.3s ease-in;
            transform: scale(1.1);
        }

        .location-title {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            z-index: 1;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity .5s;
            background: rgba(90,0,10,0.4);
            color: white;

            /* position the text in t’ middle*/
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .location-listing:hover .location-title {
            opacity: 1;
        }

        .location-listing:hover .location-image img {
            filter: blur(2px);
        }


        /* for touch screen devices */
        @media (hover: none) {
            .location-title {
                opacity: 1;
            }
            .location-image img {
                filter: blur(2px);
            }
        }
    </style>
</head>
<body>
<div><a href="/home">Авторизация</a></div>
<div class="child-page-listing">

    <h2>Фотогалерея</h2>
    <div class="grid-container">
        @foreach($item as $value)
                <article id="{{$value->id}}" class="location-listing">
                    <a class="location-title" href="#"> {{$value->title}} </a>
                    <div class="location-image">
                        <a href="#">
                            <img width="300" height="169"
                                 src="{{$value->url}}"
                                 alt="{{$value->alt}}">
                        </a>
                    </div>
                </article>
        @endforeach
    </div>
</div>
</body>
</html>
