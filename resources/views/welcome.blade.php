<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    </div>
    <div class="jumbotron">
        <form method="POST" action="{{route('calculate')}}">
            @csrf
            <div>
                <h1>SuperFreighter shiping</h1>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="email">Destination</label>
                    <select name="destination" class="form-control" require>
                        <option value="air">select destination </option>
                        <option value="uk">UK</option>
                        <option value="us">US</option>
                    </select>
                </div>
                <div class="col">
                    <label>Mode of transport</label>
                    <select name="mode" class="form-control" aria-label="Default select example">
                        <option value="air">select mode of transport </option>
                        <option value="air">Air</option>
                        <option value="water">Water</option>
                    </select>
                </div>
                <div class="col">
                    <label>Weight of items in Kg</label>

                    <input name="weight" type="text" class="form-control" placeholder="Last name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="row mt-3 " style="width: 100px;">
                <input type="submit" class="form-control btn btn-primary" placeholder="submit">
            </div>
        </form>
    </div>
</body>

</html>