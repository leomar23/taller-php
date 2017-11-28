<script type="text/javascript" src="{{url('js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
{{--<script type="text/javascript" src="{{url('js/bootstrap-checkbox-radio.js')}}"></script>--}}
<script type="text/javascript" src="{{url('js/adminlte.js')}}"></script>
<!--  Plugin    -->
<script type="text/javascript" src="{{url('js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/script.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jsvalidation.js')}}"></script>
<script type="text/javascript">

    //MENSAJES DE SESION DE ALERTAS
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'success') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif


    function beforeDel(id){
        if (confirm("@lang('messages.delete_message_text')")) {
            $( "#form-item-"+id).submit();
        }
    };

</script>