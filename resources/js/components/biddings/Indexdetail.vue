<template>
    <div>
        <!--header-->
        <section class="content-header">
            <h3>
                Bidding Processing
            </h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Job Management</a></li>
                <li><a href="#">Bidding Processing</a></li>
            </ol>
        </section>
       <!--end header-->

       <!-- main content -->
       <section class="content">
        <div class="row">
                <div class="container-fluid">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">{{ this.$route.params.name }}</h4>
                        </div>

                    <div class="box-body">
                        <div class="text-center" v-if="spinnerGetAllData">
                                <b-spinner style="width: 4rem; height: 4rem;" variant="primary" label="Text Centered"></b-spinner>
                        </div>
                        <b-table
                            table
                            table-bordered
                            table-striped
                            ref="table"
                            :items="getAllBidding"
                            :fields="fieldBidding"
                        >
                        <template v-slot:cell(customer_name)="data">
                            <span>{{ data.item.customer.first_name }} {{ data.item.customer.last_name }}</span>
                        </template>
                        <template v-slot:cell(status)="data">
                            <b-badge pill class="badge badge-warning" v-if="data.item.status == '1'">READY</b-badge>
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
                                        <b-button size="sm" class="btn btn-raised btn-success btn-sm" @click="openBiddingModal(data.item)"  v-b-tooltip.hover title="Bidding">
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
                                            <h5>Detail Data Bidding Processing</h5>
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

                    <!-- Bidding modal -->
                    <b-modal
                        id="modal-bid"
                        class="modal modal-info"
                        title="XPRO Tradie - Bidding Processing"
                        size="lg"
                        :hide-footer="true"
                        @hidden="clearForm"
                        centered
                    >
                        <b-form @submit.prevent="bidding" enctype="multipart/form-data">
                            <b-form-input id="orderID"
                                v-model="form.orderID"
                                hidden>
                            </b-form-input>
                            <b-form-input id="companyID"
                                v-model="form.companyID"
                                hidden>
                            </b-form-input>
                            <b-form-group
                                label="Labor Time"
                                label-for="laborTimeInput">
                                <b-form-input id="laborTimeInput"
                                    v-model="form.laborTime"
                                    type="text"
                                    placeholder="Enter Labor Time"
                                    required>
                                </b-form-input>
                            </b-form-group>
                            <b-form-group
                                label="Price"
                                label-for="price">
                                <b-form-input id="price"
                                    v-model="form.price"
                                    type="text"
                                    placeholder="Enter Price"
                                    required>
                                </b-form-input>
                            </b-form-group>
                            <b-form-group
                                label="description"
                                label-for="description">
                                <b-form-input id="description"
                                    v-model="form.description"
                                    type="text"
                                    placeholder="Enter Description"
                                    required>
                                </b-form-input>
                            </b-form-group>
                            <div class="d-flex justify-content-end">
                            <div class="form-group">
                                <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                    <b-spinner small></b-spinner>
                                    Loading...
                                </b-button>
                                <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal"><i class="fa fa-pencil"></i>  BID</button>
                            </div>
                        </div>
                        </b-form>
                    </b-modal>
                <!-- End modal -->

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
            statusModal: false,
            form: {
                orderID: '',
                companyID: '',
                laborTime: '',
                price: '',
                description: '',
            },
            fieldBidding: [
                {
                    key : 'id'
                },
                {
                    key : 'name'
                },
                {
                    key: 'customer_name',
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
            spinnerGetAllData: false,
        }
    },
    methods: {
        openBiddingModal(item) {
            this.form.orderID = item.order_id;
            this.form.companyID = item.company_setting.id;
            this.$bvModal.show('modal-bid');
        },
        getAllBidding() {
            let url = 'http://localhost:8000/api/biddings';
            let promise = axios.get(
                url,{
                params: {
                    company_setting_id: this.$route.params.id
                }}
            )
            return promise.then((response) => {
                const bidding = response.data
                this.spinnerGetAllData = false;
                return (bidding.data)
                }).catch(error => {
                    console.log(error)
                    return 
                })
                this.$refs.table.refresh()
        },
        bidding() {
            this.progressModal = true;
            var data = new FormData()
            data.append('order_id', this.form.orderID);
            data.append('company_id', this.form.companyID);
            data.append('labor_time', this.form.laborTime);
            data.append('price', this.form.price);
            data.append('status', 1);
            data.append('description', this.form.description);

            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
            }

            let url = 'http://localhost:8000/api/biddings/create';
            this.axios.post(url, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-bid');
                    this.$refs.table.refresh()
                }).catch(error => {});
        },
        clearForm(evt) {
            this.form.orderID = '';
            this.form.companyID = '';
            this.form.laborTime = '';
            this.form.price = '';
            this.form.description = '';
        }
        },
        created() {
            this.spinnerGetAllData = true;
        }
    }
</script>
