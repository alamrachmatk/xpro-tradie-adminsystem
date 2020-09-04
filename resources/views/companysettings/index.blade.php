@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        System Installer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">System Installer</a></li>
        <li class="active">Company Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Company Settings</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Electrician</td>
                  <td>-</td>
                  <td><span class="label label-primary">Active</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Security</td>
                  <td>-</td>
                  <td><span class="label label-primary">Active</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Climbing</td>
                  <td>-</td>
                  <td><span class="label label-danger">No Actice</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Carpentry</td>
                  <td>-</td>
                  <td><span class="label label-danger">No Active</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Security</td>
                  <td>-</td>
                  <td><span class="label label-primary">Active</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Roofing</td>
                  <td>-</td>
                  <td><span class="label label-primary">Active</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="details">
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