@section('scripts')
<script>
    (function(){

        Dropzone.options.dropzoneForm = {
            paramName: "file",
            maxFilesize: 10,
            dictDefaultMessage: "<strong>Clicca per caricare i files. (jpg, png, pdf, doc, xls, etc ...)</strong>",
            sending: function(file, xhr, formData) {
                formData.append("mediable_id", "{{$element->id}}");
                formData.append("mediable_type", "App\\Models\\{{$element->class}}");
                formData.append("directory", "{{$element->directory}}");
            },
            init: function () {
                this.on('queuecomplete', function () {
                   //location.reload();
                });
            },
        };

    $('.popup-gallery tr td').magnificPopup({delegate: 'a',type: 'image',tLoading: 'Loading image #%curr%...',mainClass: 'mfp-img-mobile',gallery: {enabled: true,navigateByImgClick: true,preload: [0,1] },image: {tError: '<a href="%url%">The image #%curr%</a> errorrrrrr',titleSrc: function(item) {return item.el.attr('title') + '<small>{{ config('app.name') }}</small>';}}});

        $('.form-description button').on('click', function(e){
            e.preventDefault();
            var arr = {
                '_token': '{{csrf_token()}}',
                'id': $(this).attr('id'),
                'description': $(this).siblings('input[name=description]').val()
            }
            $.post( "{{url('admin/media/update')}}", arr, function(data){
                toastr.info(data);
            });
        });

        $('.form-check').on('change', function(){
            var arr = {
                '_token': '{{csrf_token()}}',
                'id': $(this).find('input:checked').attr('id'),
                'type': $(this).find('input:checked').val()
            }
            $.post( "{{url('admin/media/type')}}", arr, function(data){
                toastr.info(data);
            });
        });

        $('.image-table').sortable({
            containerSelector: 'table',
            itemPath: '> tbody',
            itemSelector: 'tr',
            placeholder: '<tr class="placeholder"/>',
            handle: 'td.handler',

            onDrop: function ($item, container, _super) {
                var tableData = $('.table tbody tr');
                var arr = {
                    '_token': '{{csrf_token()}}',
                    'media_order': []
                }
                $.each(tableData, function(index, value){
                    id = $(value).children('td:last-child').text();
                    arr.media_order.push(id);
                });
                $.post( "{{url('admin/media/order')}}", arr, function( data ) {
                  toastr.info(data);
                });
                _super($item, container);
            }
        });

    })(jQuery);
</script>
@stop
