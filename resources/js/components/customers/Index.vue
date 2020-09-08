<template>
    <div>
        <section class="content-header">
        <h1>
            Customers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customers</a></li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="container-fluid">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Data Customers</h4>
                    <div class="pull-right">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-raised"
                            @click.prevent="addData()">
                            <i class="fa fa-pencil"></i> Create</button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <b-table
                        table
                        table-bordered 
                        table-striped
                        ref="table"
                        :items="getAllCustomers"
                        :fields="fieldsCustomer">
                        <template v-slot:cell(category)="data">
                            <span v-if="data.item.category == '1'">Company</span>
                            <span v-if="data.item.category == '2'">Housing</span>
                        </template>
                        <template v-slot:cell(status)="data">
                            <b-badge pill class="badge badge-info" v-if="data.item.status == '0'">NEW</b-badge>
                            <b-badge pill class="badge badge-success" v-if="data.item.status == '1'">ACTIVE</b-badge>
                            <b-badge pill class="badge badge-danger" v-if="data.item.status == '2'">BANNED</b-badge>
                        </template>
                        <template v-slot:cell(action)="data">
                            <b-row align-v="center">
                            <b-col cols="*">
                                <b-button size="sm" class="btn btn-raised btn-info btn-sm" @click.stop="data.toggleDetails" v-b-tooltip.hover title="Details">
                                    <i class="fa fa-info-circle fa-sm"></i>
                                </b-button>
                            </b-col>
                            <b-col cols="*">
                                <b-button size="sm" class="btn btn-raised btn-success btn-sm" @click="openEditModal(data.item.id)"  v-b-tooltip.hover title="Edit">
                                <i class="fa fa-pencil fa-sm"></i>
                                </b-button>
                            </b-col>
                            <b-col cols="*">
                                <b-button size="sm" class="btn btn-raised btn-danger btn-sm" @click="openDeleteModal(data.item.id)" v-b-tooltip.hover title="Delete">
                                <i class="fa fa-remove fa-sm"></i>
                                </b-button>
                            </b-col>
                            </b-row>
                        </template>
                        <template slot="row-details" slot-scope="data">
                            <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">First Name:</th>
                                    <td>{{ data.item.first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ data.item.last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ data.item.email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ data.item.phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ data.item.address }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>
                                        <span v-if="data.item.category == '1'">Company</span>
                                        <span v-if="data.item.category == '2'">Housing</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td>{{ data.item.company_name }}</td>
                                </tr>
                                <tr>
                                    <th>ABN/CN Number</th>
                                    <td>{{ data.item.abn_cn_number }}</td>
                                </tr>
                                <tr>
                                    <th>Driving Licence</th>
                                    <td><img src="/images/customers/1599541395b.jpeg" class="img-fluid" alt="driving licence" style="height: 150px;"></td>
                                </tr>
                                <tr>
                                    <th>Photo ID</th>
                                    <td>{{ data.item.photo_id }}</td>
                                </tr>
                                <tr>
                                    <th>Avatar</th>
                                    <td><img src="/images/customers/1599541395a.jpg" class="img-fluid" alt="avatar" style="height: 150px;"></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <b-badge pill class="badge badge-info" v-if="data.item.status == '0'">NEW</b-badge>
                                        <b-badge pill class="badge badge-success" v-if="data.item.status == '1'">ACTIVE</b-badge>
                                        <b-badge pill class="badge badge-danger" v-if="data.item.status == '2'">BANNED</b-badge>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ data.item.created_at }}</td>
                                </tr>
                            </table>
                            </div>
                        </template>
                    </b-table>
                </div>

                <!-- Create modal -->
                <b-modal
                    id="modal-create-customer"
                    class="modal modal-info"
                    title="XPRO Tradie - Create Customer"
                    size="lg"
                    :hide-footer="true"
                    centered
                    @hidden="clearForm"
                >
                    <b-form  @submit.prevent="customerStore" enctype="multipart/form-data">
                        <b-form-group
                            label="First Name"
                            label-for="firstNameInput">
                            <b-form-input id="firstNameInput"
                                v-model="form.firstName"
                                type="text"
                                placeholder="Enter Fisrt Name"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Last Name"
                            label-for="lastNameInput">
                            <b-form-input id="lastNameInput"
                                v-model="form.lastName"
                                type="text"
                                placeholder="Enter Last Name"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Email"
                            label-for="emailInput">
                            <b-form-input id="emailInput"
                                v-model="form.email"
                                type="email"
                                placeholder="Enter Email"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Phone"
                            label-for="phoneInput">
                            <b-form-input id="phoneInput"
                                v-model="form.phone"
                                type="text"
                                placeholder="Enter Phone"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Address"
                            label-for="addressInput">
                            <b-form-textarea
                                id="textarea"
                                v-model="form.address"
                                placeholder="Enter Address"
                                rows="5"
                                max-rows="6">
                            </b-form-textarea>
                        </b-form-group>
                       <b-form-group
                            label="Category"
                            label-for="categoryInput">
                            <b-form>
                                <b-form-select v-model="form.category" :options="optionsCategory" required></b-form-select>
                            </b-form>
                       </b-form-group>
                        <b-form-group
                            label="Company Name"
                            label-for="companyNameInput">
                            <b-form-input id="companyNameInput"
                                v-model="form.companyName"
                                type="text"
                                placeholder="Enter Company Name">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="ABN/CN Number"
                            label-for="abncnNumberInput">
                            <b-form-input id="abncnNumberInput"
                                v-model="form.abncnNumber"
                                type="text"
                                placeholder="Enter Company Name">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Driving Licence"
                            label-for="drivingLicenceInput">
                            <b-form-file id="drivingLicenceInput"
                                v-model="form.drivingLicence"
                                placeholder="upload image..."
                                v-on:change="onDrivingLicenceChange">
                            </b-form-file>
                            <div id="preview">
                                <img v-if="prevDrivingLicence" :src="prevDrivingLicence" />
                            </div>
                        </b-form-group>
                        <b-form-group
                            label="Photo ID"
                            label-for="photoIDInput">
                            <b-form-input id="photoIDInput"
                                v-model="form.photoID"
                                type="text"
                                placeholder="Enter Photo ID"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Avatar"
                            label-for="avatarInput">
                            <b-form-file id="avatarInput"
                                v-model="form.avatar"
                                placeholder="upload image..."
                                v-on:change="onAvatarChange">
                            </b-form-file>
                            <div id="preview">
                                <img v-if="prevAvatar" :src="prevAvatar" />
                            </div>
                        </b-form-group>
                        <b-form-group
                            label="Status"
                            label-for="statusInput">
                            <b-form>
                                <b-form-select v-model="form.status" :options="optionsStatus"></b-form-select>
                            </b-form>
                        </b-form-group>
                        <div class="d-flex justify-content-end">
                            <div class="form-group">
                                <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                    <b-spinner small></b-spinner>
                                    Loading...
                                </b-button>
                                <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal"><i class="fa fa-pencil"></i>  SAVE</button>
                                <button type="reset" class="btn btn-danger btn-raised"><i class="fa fa-undo"></i> RESET</button>
                            </div>
                        </div>
                    </b-form>
                </b-modal>
                <!-- End modal -->

                <!-- Edit modal -->
                <b-modal
                    id="modal-edit-customer"
                    class="modal modal-info"
                    title="XPRO Tradie - Edit Customer"
                    size="lg"
                    :hide-footer="true"
                    centered
                >
                    <b-form @submit.prevent="customerUpdate" enctype="multipart/form-data">
                        <b-form-input id="id"
                            v-model="form.id"
                            hidden>
                        </b-form-input>
                        <b-form-group
                            label="First Name"
                            label-for="firstNameInput">
                            <b-form-input id="firstNameInput"
                                v-model="form.firstName"
                                type="text"
                                placeholder="Enter Fisrt Name"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Last Name"
                            label-for="lastNameInput">
                            <b-form-input id="lastNameInput"
                                v-model="form.lastName"
                                type="text"
                                placeholder="Enter Last Name"
                                required>
                            </b-form-input>
                            <b-form-invalid-feedback>
                                required
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group
                            label="Email"
                            label-for="emailInput">
                            <b-form-input id="emailInput"
                                v-model="form.email"
                                type="text"
                                placeholder="Enter Email"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Phone"
                            label-for="phoneInput">
                            <b-form-input id="phoneInput"
                                v-model="form.phone"
                                type="text"
                                placeholder="Enter Phone"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Address"
                            label-for="addressInput">
                            <b-form-textarea
                                id="textarea"
                                v-model="form.address"
                                placeholder="Enter Address"
                                rows="5"
                                max-rows="6">
                            </b-form-textarea>
                        </b-form-group>
                       <b-form-group
                            label="Category"
                            label-for="categoryInput"> 
                            <b-form>
                                <b-form-select v-model="form.category" :options="optionsCategory" class="custom-select" required></b-form-select>
                            </b-form>
                       </b-form-group>
                        <b-form-group
                            label="Company Name"
                            label-for="companyNameInput">
                            <b-form-input id="companyNameInput"
                                v-model="form.companyName"
                                type="text"
                                placeholder="Enter Company Name">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="ABN/CN Number"
                            label-for="abncnNumberInput">
                            <b-form-input id="abncnNumberInput"
                                v-model="form.abncnNumber"
                                type="text"
                                placeholder="Enter Company Name">
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Driving Licence"
                            label-for="drivingLicenceInput">
                            <b-form-file id="drivingLicenceInput"
                                v-model="form.drivingLicence"
                                placeholder="upload image..."
                                v-on:change="onDrivingLicenceChange">
                            </b-form-file>
                            <img src="/images/customers/1599541395b.jpeg" class="img-fluid" alt="driving licence" style="height: 150px;">
                        </b-form-group>
                        <b-form-group
                            label="Photo ID"
                            label-for="photoIDInput">
                            <b-form-input id="photoIDInput"
                                v-model="form.photoID"
                                type="text"
                                placeholder="Enter Photo ID"
                                required>
                            </b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Avatar"
                            label-for="avatarInput">
                            <b-form-file id="avatarInput"
                                v-model="form.avatar"
                                placeholder="upload image..."
                                v-on:change="onAvatarChange">
                            </b-form-file>
                            <img src="/images/customers/1599541395a.jpg" class="img-fluid" alt="driving licence" style="height: 150px;">
                        </b-form-group>
                        <b-form-group
                            label="Status"
                            label-for="statusInput">
                            <b-form>
                                <b-form-select v-model="form.status" :options="optionsStatus"></b-form-select>
                            </b-form>
                        </b-form-group>
                        <div class="d-flex justify-content-end">
                            <div class="form-group">
                                <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                    <b-spinner small></b-spinner>
                                    Loading...
                                </b-button>
                                <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal"><i class="fa fa-pencil"></i>  UPDATE</button>
                                <button type="reset" class="btn btn-danger btn-raised"><i class="fa fa-undo"></i> RESET</button>
                            </div>
                        </div>
                    </b-form>
                </b-modal>
                <!-- End modal -->

                 <!-- Delete modal -->
                <b-modal
                    id="modal-delete-customer"
                    title="Delete Customer"
                    size="md"
                    class="modal-danger"
                    :hide-footer="true"
                    centered>
                    <p>Are you sure want to delete customer [{{ form.id }}] - [{{ form.firstName }}] [{{ form.lastName }}]</p>
                    <div class="d-flex justify-content-end">
                        <div class="form-group">
                            <b-button class="btn btn-primary btn-raised" v-if="progressModal">
                                <b-spinner small></b-spinner>
                                Loading...
                            </b-button>
                            <button type="submit" class="btn btn-primary btn-raised" v-if="!progressModal" @click.prevent="customerDelete()"><i class="fa fa-pencil"></i>  DELETE</button>
                            <!-- <button type="reset" class="btn btn-danger btn-raised"><i class="fa fa-undo"></i> CANCEL</button> -->
                        </div>
                    </div>
                </b-modal>
                
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
    data: function () {
        return {
            dataCustomers: [],
            dataCustomerID: {},
            form: {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                address: '',
                category: null,
                companyName:'',
                abncnNumber:'',
                drivingLicence:'',
                photoID:'',
                avatar:'',
                status:'',
            },
            progressModal: false,
            isBusy: false,
            optionsCategory: [
                { value: null, text: 'Please select an category' },
                { value: 1, text: 'Company' },
                { value: 2, text: 'Housing' },
            ],
            optionsStatus: [
                { value: '', text: 'Please select an status' },
                { value: 0, text: 'New' },
                { value: 1, text: 'Approved' },
                { value: 2, text: 'Ban' },
            ],
            prevDrivingLicence: null,
            prevAvatar: null,
            validation: [],
            fieldsCustomer: [
                {
                    key: 'id'
                },
                {
                    key: 'first_name'
                },
                {
                    key: 'last_name'
                },
                {
                    key: 'email'
                },
                {
                    key: 'phone'
                },
                {
                    key: 'category'
                },
                'Status',
                'Action'
            ],
        }
    },
    methods: {
        addData() {
            this.$bvModal.show('modal-create-customer')
        },
        onDrivingLicenceChange(e) {
            this.form.drivingLicence = e.target.files[0];
            this.prevDrivingLicence = URL.createObjectURL(this.form.drivingLicence);
        },
        onAvatarChange(e) {
            this.form.avatar = e.target.files[0];
            this.prevAvatar = URL.createObjectURL(this.form.avatar);
        },
        openEditModal(id) {
            this.clearForm();
            this.getCustomerID(id);
            this.$bvModal.show('modal-edit-customer');
        },
        openDeleteModal(id) {
            this.getCustomerID(id);
            this.$bvModal.show('modal-delete-customer');
        },
        clearForm(evt) {
            this.form.id = '';
            this.form.firstName = '';
            this.form.lastName = '';
            this.form.email = '';
            this.form.phone = '';
            this.form.address = '';
            this.form.category = null;
            this.form.companyName = '';
            this.form.abncnNumber = '';
            this.form.drivingLicence = '';
            this.form.photoID = '';
            this.form.avatar = '';
            this.form.status = '';
            this.prevDrivingLicence = null;
            this.prevAvatar = null;
        },
        getCustomerID(id) {
            let uri = `http://localhost:8000/api/customers/${id}`;
            this.axios.get(uri).then((response) => {
                this.dataCustomerID = response.data.data;
                this.form.id = this.dataCustomerID.id
                this.form.firstName = this.dataCustomerID.first_name
                this.form.lastName = this.dataCustomerID.last_name
                this.form.email = this.dataCustomerID.email
                this.form.phone = this.dataCustomerID.phone
                this.form.address = this.dataCustomerID.address
                this.form.category = this.dataCustomerID.category
                this.form.companyName = this.dataCustomerID.company_name
                this.form.abncnNumber = this.dataCustomerID.abn_cn_number
                this.form.drivingLicence = this.dataCustomerID.driving_licence
                this.form.photoID = this.dataCustomerID.photo_id
                this.form.avatar = this.dataCustomerID.avatar
                this.form.status = this.dataCustomerID.status
            });
        },
        getAllCustomers() {
            let uri = 'http://localhost:8000/api/customers';
            let promise = axios.get(
                uri
            )
            return promise.then((response) => {
                const customers = response.data
                return (customers.data)
                }).catch(error => {
                console.log(error)
                return []
                })
                this.$refs.table.refresh()
        },
        customerStore() {
            this.progressModal = true;
            var data = new FormData()
            data.append('first_name', this.form.firstName);
            data.append('last_name', this.form.lastName);
            data.append('email', this.form.email);
            data.append('phone', this.form.phone);
            data.append('address', this.form.address);
            data.append('category', this.form.category);
            data.append('company_name', this.form.companyName);
            data.append('abn_cn_number', this.form.abncnNumber);
            data.append('driving_licence', this.form.drivingLicence);
            data.append('photo_id', this.form.photoID);
            data.append('avatar', this.form.avatar);
            data.append('status', this.form.status);

            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
            }

            let uri = 'http://localhost:8000/api/customers/store';
            this.axios.post(uri, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-create-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
             },
        customerUpdate() {
            this.progressModal = true;
            var data = new FormData()
            data.append('id', this.form.id)
            data.append('first_name', this.form.firstName)
            data.append('last_name', this.form.lastName)
            data.append('email', this.form.email)
            data.append('phone', this.form.phone)
            data.append('address', this.form.address)
            data.append('category', this.form.category)
            data.append('company_name', this.form.companyName)
            data.append('abn_cn_number', this.form.abncnNumber)
            data.append('driving_licence', this.form.drivingLicence)
            data.append('photo_id', this.form.photoID)
            data.append('avatar', this.form.avatar)
            data.append('status', this.form.status)

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let uri = 'http://localhost:8000/api/customers/update';
            this.axios.post(uri, data, config)
                .then((response) => {
                    this.clearForm();
                    this.progressModal = false;
                    this.$bvModal.hide('modal-edit-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
        },
        customerDelete() {
            this.progressModal = true;
            var data = new FormData()
            data.append('id', this.form.id)
            data.append('deleted', 1)

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let uri = 'http://localhost:8000/api/customers/delete';
            this.axios.post(uri, data, config)
                .then((response) => {
                    this.clearForm();
                    this.progressModal = false;
                    this.$bvModal.hide('modal-delete-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
        },
    },
}
</script>

<style>
    .form-group label {
        color: black;
        font-weight: 600;
    }
    .modal-content .modal-header {
        background-color: #00c0ef !important;
        padding-bottom: 20px;
    }
    #preview {
        display: block;
        justify-content: center;
        align-items: center;
    }

    #preview img {
        max-width: 30%;
        max-height: 30%;
    }
</style>