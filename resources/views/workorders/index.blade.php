@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Order</a></li>
        <li class="active">Browse Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Work Order</h3>
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
                  <th>Post Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Alam Rachmat</td>
                  <td>08127362589</td>
                  <td>alamrk.informatic@gmail.com</td>
                  <td>Daily Cleaning - Bed Room</td>
                  <td>2020-08-22</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Dadang Sutrisno</td>
                  <td>08157384930</td>
                  <td>dadang@gmail.com</td>
                  <td>Pembasmian Hama</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-primary">New</span></td>
                  <td>
                    <button size="sm" class="label label-warning" title="Details" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Indah Kuari</td>
                  <td>08128394033</td>
                  <td>indah@gmail.com</td>
                  <td>Cuci Bantal & Sofa</td>
                  <td>2020-08-24</td>
                  <td><span class="label label-danger">Cancel</span></td>
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