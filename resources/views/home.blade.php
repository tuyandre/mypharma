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
                    <a class="btn btn-circle btn-info text-white btn-lg" href="{{route('admin.pharmacy.index')}}">
                        <i class="fa fa-hospital"></i>
                    </a>
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
                    <a class="btn btn-circle btn-cyan text-white btn-lg" href="{{route('admin.patient.patient')}}">
                        <i class="fa fa-users"></i>
                    </a>
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
                    <a class="btn btn-circle btn-warning text-white btn-lg" href="{{route('admin.medecines.medecines')}}">
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                    </a>
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
                        <a class="btn btn-circle btn-danger text-white btn-lg" href="{{route('pharmacist.medecine.index')}}">
                            <i class="fa fa-medkit blue-text" aria-hidden="true"></i>
                        </a>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Medicines</h4>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <?php
                        $pharm=\App\Pharmacy::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first();
                        $medicines =\App\Medecine::where('pharmacy_id',$pharm->id)->get();
                        ?>
                        <div class="ml-auto">
                            <h2 class="display-7 mb-0">{{$medicines->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2 p-lg-3 material-card">
                <div class="p-lg-3 p-2">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-circle btn-cyan text-white btn-lg" href="javascript:void(0)">
                            <i class="fas fa-shopping-bag blue-text"></i>
                        </a>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Orders</h4>
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <?php
                            $ord=\App\Order::where('pharmacy_id',$pharm->id)->get();
                            ?>
                            <h2 class="display-7 mb-0">{{$ord->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2 p-lg-3 material-card">
                <div class="p-lg-3 p-2">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-circle btn-warning text-white btn-lg" href="javascript:void(0)">
                            <i class="fas fa-umbrella"></i>
                        </a>
                        <div class="ml-4" style="width: 38%;">
                            <h4 class="font-light">Our Insurance </h4>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <?php
                            $insurance=\App\Insurance::where('pharmacy_id',$pharm->id)->get();
                            ?>
                            <h2 class="display-7 mb-0">{{$insurance->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')



@endsection
