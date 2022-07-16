@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">

      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
                <div class="card radius-10 overflow-hidden bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Orders</p>
                                <h5 class="mb-0 text-white">{{ \App\Models\Order::where('status', 2)->get()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white">	<i class='bx bx-cart font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart1"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Suppliers</p>
                                <h5 class="mb-0 text-white">{{ \App\Models\Supplier::where('is_approved', 1)->get()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart2"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">Total Users</p>
                                <h5 class="mb-0 text-dark">{{ \App\Models\User::get()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-dark">	<i class='bx bx-group font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart3"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total products</p>
                                <h5 class="mb-0 text-white">{{ \App\Models\Product::where('status', 1)->get()->count() }}</h5>
                            </div>
                            <div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart4"></div>
                </div>
            </div>
      </div><!--end row-->


      <!--end row-->


      <!--end row-->
    </div>
</div>
@endsection
