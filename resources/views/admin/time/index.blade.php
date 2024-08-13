@extends('layouts.admin')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">TIme Entry list</h4>
    </div>
    <div class="page-rightheader">
        <a href="{{route('time.create')}}"><button class="btn btn-outline-primary"><i class="fa fa-plus me-2"></i>
                Add New</button>
        </a>
    </div>
</div>
<x-alert />

<!-- Page Header Close -->
<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    TimeEntry List
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>Slno</th>
                                <th>Project Name</th>
                                <th>Task Name</th>
                                <th>Hours</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($result as $val)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$val->entryproject->project_name}}</td>
                                <td>{{$val->entrytask->task_name}}</td>
                                <td>{{$val->hour}}</td>
                                <td>{{$val->date}}</td>
                                <td>{{$val->description}}</td>


                               
                                <td>
                                    <form method="post" action="{{route('time.destroy',$val->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{route('time.edit',$val->id)}}" class="btn bg-success-transparent"><i class="ri-edit-line"></i></a>

                                        <button type="submit" class="btn bg-danger-transparent"><i class="fe fe-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->
<!-- End::app-content -->


@endsection


<!-- Internal Scripts :: Datatable -->
@push('scripts')

<!-- INTERNAL Data tables -->
<script src="{{asset('admin/assets/plugins/datatables/DataTables/js/jquery.dataTables.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/JSZip/jszip.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('admin/assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{asset('admin/assets/js/datatables.js') }}"></script>


@endpush