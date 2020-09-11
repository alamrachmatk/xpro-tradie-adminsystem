<template>
    <div>
        <section class="content-header">
        <h1>
            New Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">New Orders</a></li>
        </ol>
        </section>
       <!--end header-->

       <!-- main content -->
       <section class="content">
        <div class="row">
                <div class="container-fluid">
                    <div class="box">
                        <div class="box-header">
                            <h4>Data New Order</h4>
                        </div>

                    <div class="box-body">
                        <b-table
                            table
                            table-bordered
                            table-striped
                            ref="table"
                            :items="getAllNewOrders"
                            :fields="fieldNewOrders"
                        >
                        <template v-slot:cell(Customername)="data">
                            <span>{{ data.item.customer.first_name }} {{ data.item.customer.last_name }}</span>
                        </template>
                        <template v-slot:cell(status)="data">
                            <b-badge pill class="badge badge-info" v-if="data.item.status == '0'">WAITING APPROVAL</b-badge>
                            <b-badge pill class="badge badge-success" v-if="data.item.status == '1'">APPROVE</b-badge>
                            <b-badge pill class="badge badge-danger" v-if="data.item.status == '2'">REJECT</b-badge>
                        </template>
                        <template v-slot:cell(description)="data">
                        <span v-if="data.item.description.length < 10">{{ data.item.description }}</span>
                        <span v-else> {{ data.item.description.substring(0,50)+"....." }} </span>
                        </template>
                        <template v-slot:cell(action)="data">
                                <b-row align-v="center">
                                    <b-col cols="*">
                                        <b-button size="sm" class="btn btn-raised btn-info btn-sm" @click.stop="data.toggleDetails" v-b-tooltip.hover title="Details">
                                            <i class="fa fa-info-circle fa-sm"></i>
                                        </b-button>
                                    </b-col>
                                    <b-col cols="*">
                                        <b-button size="sm" class="btn btn-raised btn-warning btn-sm" v-b-tooltip.hover @click="openStatusModal(data.item.id)" title="Approve/Reject" v-if="data.item.status == 0">
                                            <i class="fa fa-warning fa-sm"></i>
                                        </b-button>
                                        <b-button size="sm" class="btn btn-raised btn-danger btn-sm" v-b-tooltip.hover @click="openStatusModal(data.item.id)" title="Reject" v-if="data.item.status == 1">
                                            <i class="fa fa-ban fa-sm"></i>
                                        </b-button>
                                        <b-button size="sm" class="btn btn-raised btn-success btn-sm" v-b-tooltip.hover @click="openStatusModal(data.item.id)" title="Approve" v-if="data.item.status == 2">
                                            <i class="fa fa-check fa-sm"></i>
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
                                                <th style="width:50%">First Name</th>
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
                                                <td><img :src="data.item.customer.driving_licence" class="img-thumbnail" alt="driving licence" style="height: 170px;"></td>
                                            </tr>
                                            <tr>
                                                <th>Photo ID</th>
                                                <td>{{ data.item.customer.photo_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Avatar</th>
                                                <td><img :src="data.item.customer.avatar" class="rounded-circle" alt="avatar" style="height: 200px;"></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    <b-badge pill class="badge badge-info" v-if="data.item.customer.status == 'NEW'">NEW</b-badge>
                                                    <b-badge pill class="badge badge-success" v-if="data.item.customer.status == 'ACTIVE'">ACTIVE</b-badge>
                                                    <b-badge pill class="badge badge-danger" v-if="data.item.customer.status == 'BANNED'">BANNED</b-badge>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{ data.item.created_at }}</td>
                                            </tr>
                                            </table>
                                        </b-col>
                                        <b-col>
                                            <h5>Detail Data New Order</h5>
                                            <table class="table">
                                            <tr>
                                                <th style="width:50%">Name</th>
                                                <td>{{ data.item.name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Company Settings</th>
                                                <td>{{ data.item.company_setting.name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Due Date</th>
                                                <td>{{ data.item.due_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Budget</th>
                                                <td>{{ data.item.budget }}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ data.item.description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    <b-badge pill class="badge badge-info" v-if="data.item.status == '0'">WAITING APPROVAL</b-badge>
                                                    <b-badge pill class="badge badge-success" v-if="data.item.status == '1'">APPROVE</b-badge>
                                                    <b-badge pill class="badge badge-danger" v-if="data.item.status == '2'">REJECT</b-badge>
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

                    <b-modal
                        id="modal-reject-neworder"
                        title="Reject New Order"
                        size="md"
                        centered
                        :hide-footer="true"
                        @hidden="clearForm"
                    >
                    <p>Are you sure want to {{ this.form.status == '1' ? 'reject' : 'approve' }} <b>[{{ form.id }}] {{ form.name }}</b></p>
                        <div class="d-flex justify-content-end">
                            <div class="form-group">
                                <div v-if="form.status == 0">
                                    <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                        <b-spinner small></b-spinner>
                                        Loading...
                                    </b-button>
                                    <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal" @click.prevent="newOrderStatus(1)"><i class="fa fa-check"></i>  APPROVE</button>
                                    <button type="submit" class="btn btn-danger btn-raised" v-if="!progressModal" @click.prevent="newOrderStatus(2)"><i class="fa fa-ban"></i>  REJECT</button>
                                </div>
                                <div v-if="form.status == 1">
                                <b-button class="btn btn-danger btn-raised" v-if="progressModal">
                                    <b-spinner small></b-spinner>
                                    Loading...
                                </b-button>
                                <button type="submit" class="btn btn-danger btn-raised" v-if="!progressModal" @click.prevent="newOrderStatus(2)"><i class="fa fa-ban"></i>  REJECT</button>
                                </div>
                                <div v-if="form.status == 2">
                                    <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                        <b-spinner small></b-spinner>
                                        Loading...
                                    </b-button>
                                <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal" @click.prevent="newOrderStatus(1)"><i class="fa fa-check"></i>  APPROVE</button>
                                </div>
                            </div>
                        </div>
                    </b-modal>
                    </div> 
                </div>
            </div>
       </section>
       <!-- end main content -->
       
   </div> 
</template>

<script>
export default {
    data:function(){
        return {
            $dataNewOrderID: {},
            form: {
                id: '',
                name: ''
            },
            fieldNewOrders: [
                {
                    key : 'id'
                },
                {
                    key : 'name'
                },
                {
                    key: 'Customername',
                    label: 'Customer'
                },
                {
                    key : 'due_date'
                },
                {
                    key : 'budget'
                },
                'Description',
                'Status',
                'Action'
            ],
            progressModal: false,
        }
    },
    methods: {
        openStatusModal(id) {
            console.log('ID', id);
            this.banModal = true;
            this.getNewOrderID(id);
            this.$bvModal.show('modal-reject-neworder');
        },
        getNewOrderID(id) {
            let url = `http://localhost:8000/api/neworders/${id}`;
            this.axios.get(url).then((response) => {
                console.log(response);
                this.$dataNewOrderID = response.data.data;
                console.log(this.$dataNewOrderID);
                this.form.id = this.$dataNewOrderID.id;
                this.form.name = this.$dataNewOrderID.name;
                this.form.status = this.$dataNewOrderID.status;
            });
        },
        getAllNewOrders() {
            let uri = 'http://localhost:8000/api/neworders';
            let promise = axios.get(
                uri
            )
            return promise.then((response) => {
                const neworders = response.data
                return (neworders.data)
                }).catch(error => {
                    console.log(error)
                    return 
                })
                this.$refs.table.refresh()
            },
        newOrderStatus(status) {
            console.log(status)
            this.progressModal = true;
            var data = new FormData();
            data.append('status' , status);
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
            }
            
            let url =  `http://localhost:8000/api/neworders/reject/${this.form.id}`;
            this.axios.post(url, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-reject-neworder');
                    this.$refs.table.refresh()
                });
        },
        clearForm(evt) {
            this.form.id = '';
            this.form.name = '';
            this.form.status = '';
        }
        }
    }
</script>
