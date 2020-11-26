<!DOCTYPE html>
<html>
    <head>
        <!-- Stylesheet not being referenced properly? 
        <link rel="stylesheet" href="/css/app.css"/>
        -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <style>
            * {
                font-family: 'Open Sans', sans-serif;
            }

            h1 {
                text-align: center;
            }

            h3 {
                color: #005BFF
            }

            label {
                text-align: right;
            }

            table {
                width: 100%;
            }

            tr:nth-child(even) {
                background-color: #f5f5f5;
            }

            .selectable:hover {
                background-color: #e6e6e6;
            }

            th, td {
                padding: 15px;
            }

            th {
                font-size: 150%;
                height: 30px;
            }

            td {
                text-align: center;
            }

            .button {
                background-color:#2b68c4;
                color: #ffffff;
                border: 3px;
                border-color: #000000;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 4px;
                margin-left: 5px;
                margin-right: 5px;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            .button:hover {
                background-color:#214e92;
            }

            .center {
                margin: auto;
                width: 50%;
                text-align: center;
            }

            .form-grid-container {
                display: grid;
                grid-row-gap: 3px;
            }

            .form-grid-middle {
                grid-column: 2 / 3;
            }
            
            .form-grid-right {
                grid-column: 3 / 3;
            }

            input {
                width: 100%;
            }

            .row {
                white-space: nowrap;
            }

            .row > div {
                width: auto;
                height: auto;
                display: inline-block;
            }

        </style>
    </head>

    <body>
        <div id="app">
            <shopping-cart></shopping-cart>
            <router-view></router-view>
        </div>
    </body>

    <script src="{{ mix('js/app.js') }}">
    </script>
</html>