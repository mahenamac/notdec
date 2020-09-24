@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <span class="shell rounded-circle">
                            <img src="{{ asset("/images/$child->picture") }}" alt="{{$child->name}}" class="rounded-circle" width="150">
                            <div class="overlay rounded-circle">
                                <i class="fa fa-camera text" id="{{$child->id}}"></i>
                            </div>
                        </span>
                      <div class="mt-3">
                    <h4>{{$child->name}}</h4>
                        <p class="text-secondary mb-1">{{$child->admission_number}}</p>
                        <p class="text-muted font-size-sm">{{$child->gender}}, {{$child->birthdate}}</p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><i class="fa fa-globe"></i> Home Address</h6>
                        <span class="text-secondary">
                            {{$child->village}} Village, {{$child->distric}} District
                            {{$child->parish}} Parish, {{$child->sub_county}} Subcounty
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-map-pin"></i> Github</h6>
                    <span class="text-secondary"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-map-pin"></i> Twitter</h6>
                    <span class="text-secondary">{{$child->clan}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-map-pin"></i> Admission date</h6>
                    <span class="text-secondary">{{$child->admission_date}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="fas fa-map-pin"></i> Admission Period</h6>
                    <span class="text-secondary">{{$child->duration}} {{$child->duration_type}}</span>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$child->name}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Birthdate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$child->birthdate}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$child->guardian->contact}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Guardian</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$child->guardian->name}}
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$child->guardian->address}}
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
