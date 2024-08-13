@extends('layouts.admin')

@section('content')


<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">TimeEntry</h4>
    </div>
    <div class="page-rightheader">
        <a href="{{route('time.index')}}"><button class="btn btn-outline-primary"><i class="fa fa-plus me-2"></i>
                Back</button>
        </a>
    </div>

</div>
<x-alert />

<!-- Start:: row-1 -->
<div class="row">
    <div class="col-xl-12">
        <form action="{{route('time.store')}}" method="POST">
            @csrf
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        TimeEntry
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="category" class="form-label">Select Project</label>
                            <select class="form-control" id="category" name="project_id" required>
                                <option value="" selected disabled>Select a Project</option>
                                @foreach($project as $val)
                                <option value="{{$val->id}}">{{$val->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="category" class="form-label">Select Task</label>
                            <select class="form-control" id="category" name="task_id" required>
                                <option value="" selected disabled>Select a Task</option>
                                @foreach($task as $val)
                                <option value="{{$val->id}}">{{$val->task_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-label" class="form-label">Hour</label>
                            <input type="text" class="form-control" id="input-label" name="hour">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-label" class="form-label">Date</label>
                            <input type="date" class="form-control" id="input-label" name="date">
                        </div>
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                            <label for="input-label" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="input-label" name="description"></textarea>
                        </div>

                  

                      

                        <div class="form-group mb-0 mt-4 row">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

    </div>
</div>
<!-- End:: row-1 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection
@push('scripts')
<!-- Alerts js-->
<script src="{{ asset('admin/assets/js/alerts.js') }}"></script>
<!-- <script src="{{ asset('admin/assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
<script src="{{ asset('admin/assets/js/form-editor.js') }}"></script> -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>


@endpush