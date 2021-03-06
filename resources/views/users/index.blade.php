<!-- Extend Main layout -->

@extends('layouts.app')
    @section('content')
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    User registry
                        {{-- @if(Gate::check('isAdmin') || Gate::check('isuserProtection')) --}}
                        <button class="btn btn-outline-success btn-sm" style="float:right" data-toggle="modal" data-target="#addUser">
                            <i class="fas fa-user-plus"></i> Add user</button>
                    {{-- @endif --}}
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped tabledata">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                {{-- <th>Age</th> --}}
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Department</th>
                                {{-- @if(Gate::check('isAdmin')|| Gate::check('isuserProtection')) --}}
                                <th>Actions</th>
                                {{-- @else
                                @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->staff_id}}</td>
                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->department}}</td>
                            {{-- @if(Gate::check('isAdmin')|| Gate::check('isuserProtection')) --}}
                            <td>
                                <a href="/users/{{$user->id}}"><i class="fa fa-eye" title="View user"></i></a>
                                <i class="fa fa-edit edituser text-success" id="{{$user->id}}" title="Edit user"></i>
                                <i class="fa fa-trash-alt text-danger deluser" id="{{$user->id}}"></i>
                            </td>
                            {{-- @else
                            @endif --}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{--
<div class="row mb-2">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                Data customization
            </div>
            <div class="card-body">
            <form id="casesFilterForm">
                @csrf
                <div class="form-row">
                    <div class="col-md-2">
                        <label>Gender:</label>
                        <select class="custom-select mr-sm-2" name="gender" id="gender">
                            <option value="" selected disabled>-Select Gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="NULL">Both</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Age:</label>
                        <input type="number" class="form-control" name="age" id="age">
                    </div>
                    <div class="col-md-2">
                        <label>School Status:</label>
                        <select class="custom-select mr-sm-2" name="sch_status" id="sch_status">
                            <option value="true" selected>In school</option>
                            <option value="false">Out of School</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>District:</label>
                        <input list="csDistrict" name="caseDistrict" id="caseDistrict" class="form-control">
                        <datalist id="csDistrict">
                            {{ getDistrict() }}
                        </datalist>
                    </div>
                    <div class="col-md-2">
                        <label>Start Period:</label>
                        <input type="date" name="caseStart" id="caseStart" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>End Period:</label>
                        <input type="date" name="caseEnd" id="caseEnd" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="btn-group mx-auto">
                        <button type="button" id="caseFilter" class="btn btn-outline-success mb-2">Search <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <h5 id="summaries"></h5>
                <div id="records-list">
                    <button type="button" class="btn btn-outline-success" id="export_cases" style="float:right; display:none">Export <i class="fa fa-file-excel"></i></button>
                </div>
                <!-- Loader here -->
                <div id="loading">
                    <img src="{{ asset("/files/loader.gif") }}" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-2">
            <div class="card-header">
                Visual customization
            </div>
            <div class="card-body mx-auto">
                <form class="form-inline" id="chartFilterForm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="chart_start" id="chart_start">
                    </div>

                    <div class="input-group mb-3 ml-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="chart_stop" id="chart_stop">
                    </div>
                    <button type="button" class="btn btn-outline-danger ml-3 mb-3" id="chartFilter">Process</button>
                    <span id="loaders">
                        <img src="{{ asset("/files/loader.gif") }}" class="mb-2">
                    </span>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endsection
