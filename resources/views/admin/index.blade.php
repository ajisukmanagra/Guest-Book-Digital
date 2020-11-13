@extends('layouts/app')
@section('dashboard', 'active')
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU KEPALA SEKOLAH</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_1 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU TATA USAHA</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_2 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU KESISWAAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_3 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU KURIKULUM</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_4 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU HUMAS/HUBDIN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_5 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU KETUA JURUSAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_6 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">TAMU WALI KELAS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $tamu_7 }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection