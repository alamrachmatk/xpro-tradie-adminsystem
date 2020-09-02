@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Order
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Order</a></li>
    <li class="active">History Order</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">History Order</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Telp</th>
              <th>Email</th>
              <th>Service</th>
              <th>Cleaning Date</th>
              <th>Status</th>
              <th rowspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Bayu Siahaan</td>
              <td>08127384738</td>
              <td>bayu@gmail.com</td>
              <td>Cuci Kasur single</td>
              <td>2020-08-22</td>
              <td><span class="label label-primary">Complete</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Andri Jamil</td>
              <td>08157384930</td>
              <td>andri@gmail.com</td>
              <td>Pembasmian Hama</td>
              <td>2020-08-24</td>
              <td><span class="label label-danger">Pending</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Bayu Siahaan</td>
              <td>08127384738</td>
              <td>bayu@gmail.com</td>
              <td>Cuci Kasur single</td>
              <td>2020-08-22</td>
              <td><span class="label label-primary">Complete</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Andri Jamil</td>
              <td>08157384930</td>
              <td>andri@gmail.com</td>
              <td>Pembasmian Hama</td>
              <td>2020-08-24</td>
              <td><span class="label label-danger">Pending</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Bayu Siahaan</td>
              <td>08127384738</td>
              <td>bayu@gmail.com</td>
              <td>Cuci Kasur single</td>
              <td>2020-08-22</td>
              <td><span class="label label-primary">Complete</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Andri Jamil</td>
              <td>08157384930</td>
              <td>andri@gmail.com</td>
              <td>Pembasmian Hama</td>
              <td>2020-08-24</td>
              <td><span class="label label-danger">Pending</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Bayu Siahaan</td>
              <td>08127384738</td>
              <td>bayu@gmail.com</td>
              <td>Cuci Kasur single</td>
              <td>2020-08-22</td>
              <td><span class="label label-primary">Complete</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Andri Jamil</td>
              <td>08157384930</td>
              <td>andri@gmail.com</td>
              <td>Pembasmian Hama</td>
              <td>2020-08-24</td>
              <td><span class="label label-danger">Pending</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Bayu Siahaan</td>
              <td>08127384738</td>
              <td>bayu@gmail.com</td>
              <td>Cuci Kasur single</td>
              <td>2020-08-22</td>
              <td><span class="label label-primary">Complete</span></td>
              <td>
                <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>Andri Jamil</td>
              <td>08157384930</td>
              <td>andri@gmail.com</td>
              <td>Pembasmian Hama</td>
              <td>2020-08-24</td>
              <td><span class="label label-danger">Pending</span></td>
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