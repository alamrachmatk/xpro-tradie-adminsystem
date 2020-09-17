<template>
  <div>
    <!--header-->
    <section class="content-header">
      <h3>
        Job Management
      </h3>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li><a href="#">Job Management</a></li>
        <li><a href="#">Work Orders</a></li>
      </ol>
    </section>
    <!--end header-->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="container-fluid">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">
                <i class="fa fa-tag"> Work Orders </i>
              </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="text-center" v-if="spinnerGetAllData">
                <b-spinner
                  style="width: 4rem; height: 4rem;"
                  variant="primary"
                  label="Text Centered"
                ></b-spinner>
              </div>
              <div class="row">
                <div
                  class="col-lg-3 col-md-6 col-sm-6 col-xs-12"
                  :key="index"
                  v-for="(item, index) in dataCompanySetting"
                >
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>150</h3>
                      <h5>{{ item.name }}</h5>
                    </div>
                    <router-link
                      :to="{ name: 'workorderdetails', params: {id: item.id, name: item.name } }"
                    >
                      <div class="icon">
                        <i class="fa fa-user-circle"></i>
                      </div>
                    </router-link>
                    <div class="small-box-footer">
                      List Data <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
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
  </div>
</template>

<script>
export default {
    data:function() {
        return {
            dataCompanySetting: {},
            spinnerGetAllData: false,
        }
    },
    methods: {
        getAllCompanySettings() {
            let uri = 'http://localhost:8000/api/companysettings';
            let promise = axios.get(
                uri
            )
            return promise.then((response) => {
                const companysettings = response.data;
                this.dataCompanySetting = companysettings.data;
                this.spinnerGetAllData = false;
                return (companysettings.data)
                }).catch(error => {
                    console.log(error)
                    return 
            })
        },
    },
    created() {
        this.spinnerGetAllData = true;
        this.getAllCompanySettings();
    }
}
</script>