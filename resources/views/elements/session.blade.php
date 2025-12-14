@if ( session('message') ) 
   <script>
       (function(){
            toastr.options.closeDuration = 6000;
            toastr.options.closeButton = true;
            toastr.info('{{session('message')}}');
       })('jQuery');
   </script>
@endif
@if ( session('error') )
   <script>
       (function(){
            toastr.options.closeDuration = 6000;
            toastr.options.closeButton = true;
            toastr.error('{{session('error')}}');
       })('jQuery');
   </script>
@endif
@if ( session('warning') )
   <script>
       (function(){
            toastr.options.closeDuration = 6000;
            toastr.options.closeButton = true;
            toastr.warning('{{session('warning')}}');
       })('jQuery');
   </script>
@endif
