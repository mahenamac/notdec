@extends('layouts.app')
    @section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#homes">Homes</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#groups">Groups</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#titles">Titles</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activities">Activities</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="homes">
                    <div class="card-body">
                        <i class="fas fa-plus-circle text-primary mb-2" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addHome" title="Add Homes"></i>
                        @if($homes->count()<1)
                            <p>No homes found...</p>
                        @else
                        <table class="table table-sm  table-striped">
                            <thead><th>Homes</th><th>Due Date</th><th>Status</th><th></th></thead>
                                <tbody>
                                    @foreach($homes as $home)
                                    <tr>
                                        <td>{{$home->home_name}}</td>
                                        <td>{{$home->home_date}}</td>
                                        <td>{{$home->home_status}}</td>
                                        <td>
                                            <i class="fa fa-edit text-success editHome" id="{{$home->id}}"></i>
                                            <i class="fa fa-trash-alt text-danger delHome" id="{{$home->id}}"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="departments">
                    <div class="card-body">
                        <i class="fas fa-plus-circle text-primary icon-lg" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addDepartment" title="Add departments"></i>
                        @if($departments->count()<1)
                            <p>No departments found...</p>
                        @else
                            <div class="table-responsive" id="departmentsBody">
                                <table class="table table-sm table-striped">
                                    <thead><th>Departments</th><th>Users</th><th></th></thead>
                                    <tbody>
                                        @foreach(App\Department::all() as $department)
                                            <tr>
                                                <td>{{$department->name}} - {{$department->code}}</td>
                                                <td>{{$department->users->count()}}</td>
                                                <td>
                                                    <a href="departments/{{$department->id}}"><i class="fa fa-eye viewDepartment" title="View department"></i></a>
                                                    <i class="fa fa-edit text-success editDepartment" id="{{$department->id}}" title="Edit department"></i>
                                                    <i class="fa fa-trash-alt text-danger delDepartment" id="{{$department->id}}" title="Delete department"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="groups">
                    <div class="card-body">
                        <i class="fas fa-plus-circle text-primary mb-2" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addGroup" title="Add groups"></i>
                        @if($groups->count()<1)
                            <p>No User groups found...</p>
                        @else
                            <table class="table table-sm table-striped">
                                <thead><th>Groups</th><th>Retirement</th><th>Users</th><th></th></thead>
                                <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->name}}</td>
                                            <td>{{$group->age}} Years</td>
                                            <td>{{$group->users->count()}}</td>
                                            <td>
                                                <i class="fa fa-edit text-success editGroup" id="{{$group->id}}"></i>
                                                <i class="fa fa-trash-alt text-danger delGroup" id="{{$group->id}}"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="titles">
                    <div class="card-body">
                        <i class="fas fa-plus-circle text-primary mb-2" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addTitle" title="Add titles"></i>
                        @if($titles->count()<1)
                            <p>No titles found...</p>
                        @else
                            <table class="table table-sm table-striped">
                                <thead><th>Titles</th><th>Users</th><th></th></thead>
                                <tbody>
                                    @foreach($titles as $title)
                                        <tr>
                                            <td>{{$title->name}}</td>
                                            <td>{{$title->users->count()}}</td>
                                            <td>
                                                <i class="fa fa-edit text-success editTitle" id="{{$title->id}}" title="Edit title"></i>
                                                <i class="fa fa-trash-alt text-danger delTitle" id="{{$title->id}}" title="Delete title"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="activities">
                    <div class="card-body">
                        <i class="fas fa-plus-circle text-primary" aria-hidden="true" style="float:right;" data-toggle="modal" data-target="#addActivity" title="Add Ativities"></i>
                        @if($activities->count()<1)
                        <p>No activities found...</p>
                        @else
                        <table class="table table-sm  table-striped">
                            <thead><th>Activities</th><th>Partners</th><th></th></thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                    <tr>
                                        <td>{{$activity->name}}</td>
                                        <td>{{$activity->partners->count()}}</td>
                                        <td>
                                            <i class="fa fa-edit text-success editActivity" id="{{$activity->id}}"></i>
                                            <i class="fa fa-trash-alt text-danger delActivity" id="{{$activity->id}}"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
