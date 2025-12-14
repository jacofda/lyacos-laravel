@if( $element->media()->where('mime','image')->exists() )
    <table class="table table-sm table-bordered mt-5 image-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>alt</th>
                <th>type</th>
                <th class="text-center">preview</th>
                <th>size</th>
                <th></th>
                <th class="d-none"></th>
            </tr>
        </thead>
        <tbody class="popup-gallery">
            @foreach($element->media()->where('mime','image')->orderBy('media_order', 'ASC')->get() as $file)
                <tr>
                    <td class="align-middle text-center handler">{{$loop->iteration}}</td>
                    <td class="align-middle text-center">
                        <form method="POST" action="{{url('admin/media/update')}}" class="col-sm-12 form-description">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$file->id}}">
                            <div class="input-group">
                                <input type="text" name="description" class="form-control" value="{{$file->description}}" />
                                <button class="btn btn-primary" id="{{$file->id}}"><i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type{{$file->id}}"  value="normal" id="{{$file->id}}" @if($file->type=="normal") checked @endif>
                                normal
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type{{$file->id}}"  value="cover" id="{{$file->id}}" @if($file->type=="cover") checked @endif>
                                cover
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type{{$file->id}}"  value="background" id="{{$file->id}}" @if($file->type=="background") checked @endif>
                                background
                            </label>
                        </div>
                    </td>
                    <td class="align-middle text-center image-to-pop">
                        <a class="image-popup" href="{{ asset('storage/'.$directory.'/display/'.$file->filename)}}" >
                            <img src="{{ asset('storage/'.$directory.'/thumb/'.$file->filename)}}">
                        </a>
                    </td>
                    <td><small>{{$file->size}}</small></td>
                    <td class="align-middle text-center">
                        <form method="POST" action="{{url('admin/media/delete')}}"}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" value="{{$file->id}}">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" style="width: 20px;height: 25px;padding-top: 4px;"></i> </button>
                        </form>
                    </td>
                    <td class="d-none">{{$file->id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix"></div><hr><div class="clearfix"></div>
@endif


@if( $element->media()->where('mime','doc')->exists() )
    <table class="table table-sm table-bordered mt-5 doc-table">
        <thead>
            <tr>
                <th class="text-center"></th>
                <th class="text-center">preview</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($element->media()->where('mime','doc')->get() as $file)
                <tr>
                    <td class="align-middle text-center">
                        <form method="POST" action="{{url('admin/media/update')}}" class="col-sm-12 form-description">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$file->id}}">
                            <div class="input-group">
                                <input type="text" name="description" class="form-control" value="{{$file->description}}" />
                                <button class="btn btn-primary" id="{{$file->id}}"><i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </td>
                    <td class="align-middle text-center">
                        <a class="btn btn-sm btn-primary" target="_BLANK" href="{{ asset('storage/app/public/'.$directory.'/docs/'.$file->filename)}}" >
                            <i class="fa fa-disk"></i>{{$file->filename}}
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        <form method="POST" action="{{url('admin/media/delete')}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" value="{{$file->id}}">
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash" style="width: 20px;height: 25px;padding-top: 4px;"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix"></div><hr><div class="clearfix"></div>
@endif
