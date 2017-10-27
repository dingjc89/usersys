@extends('admin.layout.master')
@section('footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var $a = $('<a>',{
            href:"{{$url}}",
        });
        loadGet($a,$('.ibox'));
    </script>
@stop

