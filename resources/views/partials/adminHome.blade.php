@extends('admin.welcome')


@section('content')

<div class="card" id="pie-charts">
        <div class="card-block">
        <h2 class="text-center">Overall analysis</h2>

        <div class="row">
            <div class="col-sm-6 col-6">
                <div class="round-char">

                    {!! $chart->container() !!}
                </div>
            </div>

            <div class="col-sm-6 col-6">

                <div class="round-char">

                    {!! $cherry->container() !!}
                </div>
            </div>
        </div>

        <div class="round-chart">
            {!! $bar->container()!!}
        </div>
        </div>
</div>
@endsection

