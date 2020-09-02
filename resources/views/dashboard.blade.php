@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Task Cleaning</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Type Cleaning</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>OR9842</td>
                <td>Jasa Pembasmi Rayap</td>
                <td><span class="label label-success">Complete</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">25 August 2020</div>
                </td>
              </tr>
              <tr>
                <td>OR1848</td>
                <td>Jasa Cuci Karpet & Sofa</td>
                <td><span class="label label-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">26 August 2020</div>
                </td>
              </tr>
              <tr>
                <td>OR7429</td>
                <td>Daily Cleaning Bed Room</td>
                <td><span class="label label-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">27 August 2020</div>
                </td>
              </tr>
                </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Cleaning</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
      <!-- Chat box -->
      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-comments-o"></i>

          <h3 class="box-title">Message</h3>
        </div>
        <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          <div class="item">
            <img src="{{url('template/dist/img/user4-128x128.jpg')}}" alt="user image" class="online">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                Sinta
              </a>
              Halo pak .. makasih banget udah membersihkan rayap di rumah saya.
              cekatan cleaningnya. dapat diandalkan
            </p>
            <!-- /.attachment -->
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="{{url('template/dist/img/user3-128x128.jpg')}}" alt="user image" class="offline">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                Astri
              </a>
              Pak tgl 22 feb 2020 untuk jadwal jam 08.30 kok ga datang ? 
              kok malah di undur tanggal 24.
              tolonggg dong jangan secara sepihak kalau di undur!!
            </p>
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="{{url('template/dist/img/user-160x160.jpg')}}" alt="user image" class="offline">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                Alam
              </a>
              Pak sekedar saran. jujur pelayanannya mengecewakan. lantai masih sangat berdebu.
            </p>
          </div>
          <!-- /.item -->
        </div>
        <!-- /.chat -->
        <div class="box-footer">
          <div class="input-group">
            <input class="form-control" placeholder="Type message...">

            <div class="input-group-btn">
              <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box (chat box) -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
  @endsection