<template>
  <div>
    <!--begin header-->
    <section class="content-header">
      <h1>
        Work Orders
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="#"><i class="fa fa-dashboard"></i> Home</a>
        </li>
        <li><a href="#">Work Orders</a></li>
      </ol>
    </section>
    <!--end header-->
    <!-- main content -->
    <section class="content">
      <div class="row">
        <div class="container-fluid">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">
                <i class="fa fa-tag"> {{ this.$route.params.name }} </i>
              </h4>
            </div>
            <div class="box-body">
              <div class="text-center" v-if="spinnerGetAllData">
                <b-spinner
                  style="width: 4rem; height: 4rem;"
                  variant="primary"
                  label="Text Centered"
                ></b-spinner>
              </div>
              <b-table
                table
                table-bordered
                table-striped
                ref="table"
                :items="getAllWorkOrder"
                :fields="fieldWorkOrders"
              >
                <template v-slot:cell(job_name)="data">
                  <span>{{ data.item.new_order.name }}</span>
                </template>
                <template v-slot:cell(customer_name)="data">
                  <span
                    >{{ data.item.customer.first_name }}
                    {{ data.item.customer.last_name }}</span
                  >
                </template>
                <template v-slot:cell(due_date)="data">
                  <span>{{ data.item.new_order.due_date }}</span>
                </template>
                <template v-slot:cell(description)="data">
                  <span
                    v-if="data.item.new_order.description.length < 10"
                    >{{ data.item.new_order.description }}</span
                  >
                  <span v-else>
                    {{ data.item.new_order.description.substring(0,50)+"....." }}
                  </span>
                </template>
                <template v-slot:cell(status)="data">
                  <b-badge
                    pill
                    class="badge badge-danger"
                    v-if="data.item.status == '0'"
                    >CANCEL</b-badge
                  >
                  <b-badge
                    pill
                    class="badge badge-success"
                    v-if="data.item.status == '1'"
                    >READY</b-badge
                  >
                  <b-badge
                    pill
                    class="badge badge-warning"
                    v-if="data.item.status == '2'"
                    >PENDING</b-badge
                  >
                  <b-badge
                    pill
                    class="badge badge-info"
                    v-if="data.item.status == '3'"
                    >ONGOING</b-badge
                  >
                </template>
                <template v-slot:cell(action)="data">
                  <b-row align-v="center">
                    <b-col cols="*">
                      <b-button
                        size="sm"
                        class="btn btn-raised btn-info btn-sm"
                        @click.stop="data.toggleDetails"
                        v-b-tooltip.hover
                        title="Details"
                      >
                        <i class="fa fa-info-circle fa-sm"></i>
                      </b-button>
                    </b-col>
                  </b-row>
                </template>
                <template slot="row-details" slot-scope="data">
                  <div class="table-responsive">
                    <b-row>
                      <b-col>
                        <h5>Detail Data Customer</h5>
                        <table class="table">
                          <tr>
                            <th style="width: 50%;">First Name</th>
                            <td>{{ data.item.customer.first_name }}</td>
                          </tr>
                          <tr>
                            <th>Last Name</th>
                            <td>{{ data.item.customer.last_name }}</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>{{ data.item.customer.email }}</td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                            <td>{{ data.item.customer.phone }}</td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{ data.item.customer.address }}</td>
                          </tr>
                          <tr>
                            <th>Category</th>
                            <td>{{ data.item.customer.category }}</td>
                          </tr>
                          <tr>
                            <th>Company Name</th>
                            <td>{{ data.item.customer.company_name }}</td>
                          </tr>
                          <tr>
                            <th>ABN/CN Number</th>
                            <td>{{ data.item.customer.abn_cn_number }}</td>
                          </tr>
                          <tr>
                            <th>Driving Licence</th>
                            <td>
                              <img
                                :src="data.item.customer.driving_licence"
                                class="img-thumbnail"
                                alt="driving licence"
                                style="height: 170px;"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Photo ID</th>
                            <td>{{ data.item.customer.photo_id }}</td>
                          </tr>
                          <tr>
                            <th>Avatar</th>
                            <td>
                              <img
                                :src="data.item.customer.avatar"
                                class="rounded-circle"
                                alt="avatar"
                                style="height: 200px;"
                              />
                            </td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>
                              <b-badge
                                pill
                                class="badge badge-info"
                                v-if="data.item.customer.status == 'NEW'"
                                >NEW</b-badge
                              >
                              <b-badge
                                pill
                                class="badge badge-success"
                                v-if="data.item.customer.status == 'ACTIVE'"
                                >ACTIVE</b-badge
                              >
                              <b-badge
                                pill
                                class="badge badge-danger"
                                v-if="data.item.customer.status == 'BANNED'"
                                >BANNED</b-badge
                              >
                            </td>
                          </tr>
                          <tr>
                            <th>Created At</th>
                            <td>{{ data.item.created_at }}</td>
                          </tr>
                        </table>
                      </b-col>
                      <b-col>
                        <h5>Detail Data Work Order</h5>
                        <table class="table">
                          <tr>
                            <th style="width: 50%;">Name</th>
                            <td>{{ data.item.new_order.name }}</td>
                          </tr>
                          <tr>
                            <th>Company Settings</th>
                            <td>{{ data.item.company_setting.name }}</td>
                          </tr>
                          <tr>
                            <th>Due Date</th>
                            <td>{{ data.item.new_order.due_date }}</td>
                          </tr>
                          <tr>
                            <th>Budget</th>
                            <td>{{ data.item.new_order.budget }}</td>
                          </tr>
                          <tr>
                            <th>Description</th>
                            <td>{{ data.item.new_order.description }}</td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>
                              <b-badge
                                pill
                                class="badge badge-danger"
                                v-if="data.item.status == '0'"
                                >CANCEL</b-badge
                              >
                              <b-badge
                                pill
                                class="badge badge-success"
                                v-if="data.item.status == '1'"
                                >READY</b-badge
                              >
                              <b-badge
                                pill
                                class="badge badge-warning"
                                v-if="data.item.status == '2'"
                                >PENDING</b-badge
                              >
                              <b-badge
                                pill
                                class="badge badge-info"
                                v-if="data.item.status == '3'"
                                >ONGOING</b-badge
                              >
                            </td>
                          </tr>
                          <tr>
                            <th>Created At</th>
                            <td>{{ data.item.created_at }}</td>
                          </tr>
                        </table>
                      </b-col>
                    </b-row>
                  </div>
                </template>
              </b-table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end main content -->
  </div>
</template>

<script>
import config from "../../Config"

export default {
    data:function() {
        return {
            fieldWorkOrders: [
                {
                    key : 'id'
                },
                {
                    key: 'job_name',
                    label: 'Job Name'
                },
                {
                    key: 'customer_name',
                    label: 'Customer'
                },
                {
                    key: 'due_date',
                    label: 'Due Date'
                },
                {
                    key : 'created_at'
                },
                {
                    key : 'description'
                },
                {
                    key : 'status',
                    label : 'status'
                },
                'action'
            ],
            spinnerGetAllData: false,
        }
    },
    methods: {
        getAllWorkOrder() {
            let url = config.API_LOCATION + '/workorders';
            let promise = axios.get(
                url,{
                params: {
                    company_setting_id: this.$route.params.id
                }}
            )
            return promise.then((response) => {
                const workorders = response.data
                this.spinnerGetAllData = false;
                return (workorders.data)
                }).catch(error => {
                    console.log(error)
                    return 
                })
                this.$refs.table.refresh()
        },
        created() {
            this.spinnerGetAllData = true;
        }
    }
}
</script>