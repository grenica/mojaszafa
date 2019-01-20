<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moja szafa</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
      .modal-mask {
        position: fixed;
        background-color: #745A5A;
        left: 0;
        right: 0;
        width: 550px;
        height: 450px;
        z-index: 9998;
        background-color: rgba(0, 0, 0, .4);
        display: table;
      }
    </style>
</head>
<body>
    <div id="app">
      {{-- <div class="container">
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-info" name="button">buttonek</button>
          </div>
        </div>
        <div class="modal-mask" >
          <h3>test</h3>
        </div>
      </div> --}}
      <div class="rodzic">
        
        <div class="modal-mask">

        </div>
      </div>


    </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
