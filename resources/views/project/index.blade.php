@extends('layouts.app')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project</h1>
        <a href="{{route('projects.create')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
   @if(count($projects) > 0)
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="40%">Project Name</th>
                            <th width="40%">Created By</th>
                            <th width="40%">Created Date</th>
                            <th width="40%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($projects as $project)
                           <tr>
                               <td>{{$project->project_name}}</td>
                               <td>{{$project->user->name ?? 'No Information Available'}}</td>
                               <td>{{$project->created_at}}</td>
                               <td>{{$project->ProjectStatus->status_name ?? 'No Information Available'}}</td>
                               <td style="display: flex">
                                  <a href="{{ route('projects.show',$project->project_id) }}" class="btn btn-primary m-2">
                                        <i class="fa fa-eye"></i>
                                  </a>
                                  <a href="" class="btn btn-primary m-2">
                                        <i class="fa fa-pen"></i>
                                   </a>
                                   <form method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>

                {{$projects->links()}}
            </div>
        </div>
    </div>
    @else
    <p>No Project Created Yet</p>
    @endif

</div>


@endsection