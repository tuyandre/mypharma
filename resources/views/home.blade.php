@extends('backend.shared.master')

@section('title','Home')
@section('css')

@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role=="Admin")
    <div class="card-group">
        <div class="card p-2 p-lg-3 material-card">
            <div class="p-lg-3 p-2">
                <div class="d-flex align-items-center">
                    <button class="btn btn-circle btn-info text-white btn-lg" href="{{route('admin.pharmacy.index')}}">
                        <i class="fa fa-hospital"></i>
                    </button>
                    <?php
                    $p=\App\Pharmacy::all();
                    ?>
                    <div class="ml-4" style="width: 38%;">
                        <h4 class="font-light">Total Pharmacies</h4>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                        </div>
                    </div>
                    <div class="ml-auto">

                        <h2 class="display-7 mb-0">{{$p->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-2 p-lg-3 material-card">
            <div class="p-lg-3 p-2">
                <div class="d-flex align-items-center">
                    <button class="btn btn-circle btn-cyan text-white btn-lg" href="{{route('admin.patient.patient')}}">
                        <i class="fa fa-users"></i>
                    </button>
                    <div class="ml-4" style="width: 38%;">
                        <h4 class="font-light">Total Patients</h4>
                        <div class="progress">
                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                        </div>
                    </div>
                    <?php
                    $pat=\App\User::where('role','=','Patient')->get();
                    ?>
                    <div class="ml-auto">
                        <h2 class="display-7 mb-0">{{$pat->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-2 p-lg-3 material-card">
            <div class="p-lg-3 p-2">
                <div class="d-flex align-items-center">
                    <button class="btn btn-circle btn-warning text-white btn-lg" href="{{route('admin.medecines.medecines')}}">
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                    </button>
                    <div class="ml-4" style="width: 38%;">
                        <h4 class="font-light">Total Medicines</h4>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                        </div>
                    </div>
                    <?php
                    $med=\App\Medecine::all();
                    ?>
                    <div class="ml-auto">
                        <h2 class="display-7 mb-0">{{$med->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

        <div class="card-group">
            <div class="card p-2 p-lg-3 material-card">
                <div class="p-lg-3 p-2">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-circle btn-danger text-white btn-lg" href="javascript:void(0)">
                            <i class="ti-clipboard"></i>
                        </button>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Medicines</h4>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <h2 class="display-7 mb-0">23</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2 p-lg-3 material-card">
                <div class="p-lg-3 p-2">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-circle btn-cyan text-white btn-lg" href="javascript:void(0)">
                            <i class="ti-wallet"></i>
                        </button>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Orders</h4>
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <h2 class="display-7 mb-0">76</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2 p-lg-3 material-card">
                <div class="p-lg-3 p-2">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-circle btn-warning text-white btn-lg" href="javascript:void(0)">
                            <i class="fas fa-dollar-sign"></i>
                        </button>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Insurance Earnings</h4>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <h2 class="display-7 mb-0">83</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')



@endsection
