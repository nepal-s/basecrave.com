@extends('backend.layouts.app')
<!------ Include the above in your HEAD tag ---------->
<style>
    textarea.form-control {
    width: 100%;
    height: 200px!important;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
    }
    </style>
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Modal Create</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Modal Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('notifyModels') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('notifyModels.update', $notifyModel->id) }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $notifyModel->title }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control"
                                          placeholder="Write remarks here *" style="width: 100%; height: 80%;" required>{{ $notifyModel->remarks }}</textarea>
                            </div>
                        </div>
                        @if($notifyModel->image)
                            <div class="col-md-12">
                                <input type="file" id="image" class="btn btn-primary" name="image" accept="image/*" >
                                @if($banner->banner_image)
                                            <img id="image_preview"
                                                 src="{{asset('images').'/'.$notifyModel->image }}" height="100px"
                                                 width="100px" style="float:right;">@endif
                            </div>
                            @else
                            <div class="col-md-12">
                                <input type="file" id="image" class="btn btn-primary" name="image" accept="image/*" required>
                            </div>
                            @endif
                        <div class="form-group">
                            <label for="status" class="col-md-12">Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{(($notifyModel->status=='active') ? 'selected' : '')}}>Active</option>
                                <option value="inactive" {{(($notifyModel->status=='inactive') ? 'selected' : '')}}>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#description').ckeditor({})
    </script>
@endsection



