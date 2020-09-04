@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Order
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">System Installer</a></li>
    <li class="active">Companies</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h4 class="box-title">Companies</h4>
        </div>
         <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Phone Office</th>
              <th>Address</th>
              <th>Status</th>
              <th rowspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>PT. ABC</td>
              <td>abc@gmail.com</td>
              <td>08127384738</td>
              <td>02183748390</td>
              <td>Jakarta</td>
              <td><span class="label label-primary">Active</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>PT. DEF</td>
              <td>def@gmail.com</td>
              <td>08127384345</td>
              <td>02183748221</td>
              <td>Jakarta</td>
              <td><span class="label label-primary">Active</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection