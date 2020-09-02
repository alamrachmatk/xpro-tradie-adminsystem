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
              <h3 class="box-title"><i class="fa fa-tag"> Work Orders </i></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <table id="example1" class="table table-bordered table-striped">
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
              </table> -->
              <div class="col-lg-3 col-xs-6">
                <div>
                  <a href="/workorderdetail">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>200</h3>
                        <p><b>ELECTRICIAN</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-wrench"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>150</h3>
                        <p><b>SECURITY</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-circle"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>160</h3>
                        <p><b>CLUMBING</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-hand-grab-o"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>135</h3>
                        <p><b>CARPENTRY</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-hand-paper-o"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>150</h3>
                        <p><b>SECURITY</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-asterisk"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>234</h3>
                        <p><b>ROOFING</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-bookmark-o"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>234</h3>
                        <p><b>GARDENING</b></p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-snowflake-o"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <div>
                <a href="/workorderdetail">
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>#</h3>
                        <p>ALL</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-reorder"></i>
                      </div>
                      <div class="small-box-footer">
                        List Data <i class="fa fa-arrow-circle-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

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