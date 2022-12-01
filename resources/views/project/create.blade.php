@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Project</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="projectname">Project Name</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name" name="project_name">
        </div>
    </div>
    <div class="form-group">
        <label for="projectdedscription">Project Description</label>
        <textarea class="form-control" rows="3" name="project_description"></textarea>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="startDate">Start Date</label>
            <input type="date" class="form-control" name="start_date">
        </div>
        <div class="form-group col-md-6">
            <label for="endDate">End Date</label>
            <input type="date" class="form-control" name="end_date">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputStatus">Status</label>
            <select  class="form-control" name="project_status">
                <option selected disabled>Please Select Status</option>
                @foreach ($status as $status)
                <option value="{{$status->status_id}}">{{$status->status_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
@endsection