<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    
    <link href="{{ URL::asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet" >
    <link href="{{ URL::asset('fontawesome/css/all.css') }}" rel="stylesheet" >
    <link href="{{ URL::asset('datatables/datatables.min.css') }}" rel="stylesheet" >
    <link href="{{ URL::asset('css/jquery-ui.css') }}" rel="stylesheet" >
    <link href="{{ URL::asset('bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" >

    <title>Modena || {{ $title }}</title>
  </head>
  <body>
    @include('partial.navbar')
    
    <div class="container mt-4">
        @yield('container')
    </div>

    
    <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-autocomplete.min.js') }}"></script>
    <script src="{{ URL::asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script lang="javascript">
      $(document).ready(function() {
        $('.datatables').DataTable();

        $("body").on("change","#postalcode_id",function(){
            subdistrict=$('option:selected', this).attr("subdistrict");
            district=$('option:selected', this).attr("district");
            city=$('option:selected', this).attr("city");
            province=$('option:selected', this).attr("province");
            $("#subdistrict_name").val(subdistrict);
            $("#district_name").val(district);
            $("#city_name").val(city);
            $("#province_name").val(province);
           // alert(subdistrict);
        })
        
      } );


    </script>
    @yield('pagespecificscripts')

  </body>
</html>