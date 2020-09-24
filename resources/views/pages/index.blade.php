@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card shadow-sm h-100">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Homes</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$homes->count()}}</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-home fa-2x text-primary"></i>
						</div>
					</div>
				</div>
				<a class="card-footer text-secondary border-bottom-primary small" href="/homes">
					<span class="float-left">View Details</span>
					<span class="float-right">
					<span class="fas fa-arrow-circle-right"></span>
					</span>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card shadow-sm h-100">
				<div class="card-body">
					<div class="row align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Children</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$children->count()}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-child fa-2x text-success"></i>
					</div>
					</div>
				</div>
				<a class="card-footer text-secondary border-bottom-success small" href="/children">
					<span class="float-left">View Details</span>
					<span class="float-right">
					<span class="fas fa-arrow-circle-right"></span>
					</span>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card shadow-sm h-100">
				<div class="card-body">
					<div class="row align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Visitors</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$visitors->count()}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-layer-group fa-2x text-danger"></i>
					</div>
					</div>
				</div>
				<a class="card-footer text-secondary border-bottom-danger small" href="/visitors">
					<span class="float-left">View Details</span>
					<span class="float-right">
					<span class="fas fa-arrow-circle-right"></span>
					</span>
				</a>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card shadow-sm h-100">
				<div class="card-body">
					<div class="row align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Guardians</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{$guardians->count()}}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-comments fa-2x text-info"></i>
					</div>
					</div>
				</div>
				<a class="card-footer text-secondary border-bottom-info small" href="/guardians">
					<span class="float-left">View Details</span>
					<span class="float-right">
					<span class="fas fa-arrow-circle-right"></span>
					</span>
				</a>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! $genderchart->container() !!}
                    {!! $genderchart->script() !!}
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                    {!! $healthchart->container() !!}
                    {!! $healthchart->script() !!}
                </div>
                </div>
            </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">My Area Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Summary Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 659px; height: 320px;" width="659" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
