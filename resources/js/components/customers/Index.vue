<template>
	<div>
		<!--header-->
		<section class="content-header">
			<h3>
        Customers
      </h3>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-dashboard"></i> Home
					</a>
				</li>
				<li>
					<a href="#">Customers</a>
				</li>
			</ol>
		</section>
		<!--end header-->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="container-fluid">
					<div class="box">
						<div class="box-header">
							<b-row>
								<b-col cols="auto" class="mr-auto p-8">
									<button
                    type="submit"
                    class="btn btn-primary btn-raised"
                    @click.prevent="addData()"
                    >
										<i class="fa fa-pencil"></i> Create
                  
									</button>
								</b-col>
								<b-col cols="auto" class="p-8">
									<b-form inline @submit.prevent>
										<b-form-group
                        label="Rows per page:"
                        label-class="pr-2"
                        label-for="rowsSelect"
                        label-size="sm">
											<b-form-select id="rowsSelect"
                          size="sm"
                          :plain="true"
                          :options="pageOptions"
                          v-model="perPage"
                          value="10"></b-form-select>
										</b-form-group>
									</b-form>
								</b-col>
								<b-col cols="auto" class="p-8">
									<b-pagination
                      align="right"
                      size="sm"
                      :total-rows="totalRows"
                      :per-page="perPage"
                      v-model="currentPage"
                      prev-text="Prev"
                      next-text="Next"/>
								</b-col>
							</b-row>
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
							<b-table
                table
                table-bordered
                table-striped
                ref="table"
                :items="getAllCustomers"
                :fields="fieldsCustomer"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :current-page="currentPage"
                :per-page="perPage">
								<template v-slot:cell(category)="data">
									<span v-if="data.item.category == '1'">Company</span>
									<span v-if="data.item.category == '2'">Housing</span>
								</template>
								<template v-slot:cell(status)="data">
									<b-badge
                    pill
                    class="badge badge-info"
                    v-if="data.item.status == '0'"
                    >NEW</b-badge
                  >
									<b-badge
                    pill
                    class="badge badge-success"
                    v-if="data.item.status == '1'"
                    >ACTIVE</b-badge
                  >
									<b-badge
                    pill
                    class="badge badge-danger"
                    v-if="data.item.status == '2'"
                    >BANNED</b-badge
                  >
								</template>
								<template v-slot:cell(action)="data">
									<b-row align-v="center">
										<b-col cols="*">
											<b-button
                        size="sm"
                        class="btn btn-raised btn-info btn-sm mr-1"
                        @click.stop="data.toggleDetails"
                        v-b-tooltip.hover
                        title="Details"
                      >
												<i class="fa fa-info-circle fa-sm"></i>
											</b-button>
										</b-col>
										<b-col cols="*">
											<b-button
                        size="sm"
                        class="btn btn-raised btn-success btn-sm mr-1"
                        @click="openEditModal(data.item)"
                        v-b-tooltip.hover
                        title="Edit"
                      >
												<i class="fa fa-pencil fa-sm"></i>
											</b-button>
										</b-col>
										<b-col cols="*">
											<b-button
                        size="sm"
                        class="btn btn-raised btn-danger btn-sm mr-1"
                        @click="openDeleteModal(data.item)"
                        v-b-tooltip.hover
                        title="Delete"
                      >
												<i class="fa fa-remove fa-sm"></i>
											</b-button>
										</b-col>
									</b-row>
								</template>
								<template slot="row-details" slot-scope="data">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<th style="width: 50%;">First Name:</th>
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
												<td>
													<img
                            :src="data.item.driving_licence"
                            class="img-thumbnail"
                            alt="driving licence"
                            style="height: 170px;"
                          />
												</td>
											</tr>
											<tr>
												<th>Photo ID</th>
												<td>{{ data.item.photo_id }}</td>
											</tr>
											<tr>
												<th>Avatar</th>
												<td>
													<img
                            :src="data.item.avatar"
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
                            v-if="data.item.status == 'NEW'"
                            >NEW</b-badge
                          >
													<b-badge
                            pill
                            class="badge badge-success"
                            v-if="data.item.status == 'ACTIVE'"
                            >ACTIVE</b-badge
                          >
													<b-badge
                            pill
                            class="badge badge-danger"
                            v-if="data.item.status == 'BANNED'"
                            >BANNED</b-badge
                          >
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
							<b-form
                @submit.prevent="customerStore"
                enctype="multipart/form-data"
              >
								<b-form-group label="First Name" label-for="firstNameInput">
									<b-form-input
                    id="firstNameInput"
                    v-model="form.firstName"
                    type="text"
                    placeholder="Enter Fisrt Name"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Last Name" label-for="lastNameInput">
									<b-form-input
                    id="lastNameInput"
                    v-model="form.lastName"
                    type="text"
                    placeholder="Enter Last Name"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Email" label-for="emailInput">
									<b-form-input
                    id="emailInput"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter Email"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Phone" label-for="phoneInput">
									<b-form-input
                    id="phoneInput"
                    v-model="form.phone"
                    type="text"
                    placeholder="Enter Phone"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Address" label-for="addressInput">
									<b-form-textarea
                    id="textarea"
                    v-model="form.address"
                    placeholder="Enter Address"
                    rows="5"
                    max-rows="6"
                  ></b-form-textarea>
								</b-form-group>
								<b-form-group label="Category" label-for="categoryInput">
									<b-form>
										<b-form-select
                      v-model="form.category"
                      :options="optionsCategory"
                      required
                    ></b-form-select>
									</b-form>
								</b-form-group>
								<b-form-group label="Company Name" label-for="companyNameInput">
									<b-form-input
                    id="companyNameInput"
                    v-model="form.companyName"
                    type="text"
                    placeholder="Enter Company Name"
                  ></b-form-input>
								</b-form-group>
								<b-form-group
                  label="ABN/CN Number"
                  label-for="abncnNumberInput"
                >
									<b-form-input
                    id="abncnNumberInput"
                    v-model="form.abncnNumber"
                    type="text"
                    placeholder="Enter Company Name"
                  ></b-form-input>
								</b-form-group>
								<b-form-group
                  label="Driving Licence"
                  label-for="drivingLicenceInput"
                >
									<b-form-file
                    id="drivingLicenceInput"
                    v-model="form.drivingLicence"
                    placeholder="upload image..."
                    v-on:change="onDrivingLicenceChange"
                  ></b-form-file>
									<div id="preview">
										<img v-if="prevDrivingLicence" :src="prevDrivingLicence" />
									</div>
								</b-form-group>
								<b-form-group label="Photo ID" label-for="photoIDInput">
									<b-form-input
                    id="photoIDInput"
                    v-model="form.photoID"
                    type="text"
                    placeholder="Enter Photo ID"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Avatar" label-for="avatarInput">
									<b-form-file
                    id="avatarInput"
                    v-model="form.avatar"
                    placeholder="upload image..."
                    v-on:change="onAvatarChange"
                  ></b-form-file>
									<div id="preview">
										<img v-if="prevAvatar" :src="prevAvatar" />
									</div>
								</b-form-group>
								<b-form-group label="Status" label-for="statusInput">
									<b-form>
										<b-form-select
                      v-model="form.status"
                      :options="optionsStatus"
                    ></b-form-select>
									</b-form>
								</b-form-group>
								<div class="d-flex justify-content-end">
									<div class="form-group">
										<b-button
                      class="btn btn-primary btn-raised"
                      v-if="progressModal"
                    >
											<b-spinner small></b-spinner>
                      Loading...
                    
										</b-button>
										<button
                      type="submit"
                      class="btn btn-primary btn-raised"
                      v-if="!progressModal"
                    >
											<i class="fa fa-pencil"></i> SAVE
                    
										</button>
										<button type="reset" class="btn btn-danger btn-raised">
											<i class="fa fa-undo"></i> RESET
                    
										</button>
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
              @hidden="clearForm"
              centered
            >
							<b-form
                @submit.prevent="customerUpdate"
                enctype="multipart/form-data"
              >
								<b-form-input id="id" v-model="form.id" hidden></b-form-input>
								<b-form-group label="First Name" label-for="firstNameInput">
									<b-form-input
                    id="firstNameInput"
                    v-model="form.firstName"
                    type="text"
                    placeholder="Enter Fisrt Name"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Last Name" label-for="lastNameInput">
									<b-form-input
                    id="lastNameInput"
                    v-model="form.lastName"
                    type="text"
                    placeholder="Enter Last Name"
                    required
                  ></b-form-input>
									<b-form-invalid-feedback>
                    required
                  </b-form-invalid-feedback>
								</b-form-group>
								<b-form-group label="Email" label-for="emailInput">
									<b-form-input
                    id="emailInput"
                    v-model="form.email"
                    type="text"
                    placeholder="Enter Email"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Phone" label-for="phoneInput">
									<b-form-input
                    id="phoneInput"
                    v-model="form.phone"
                    type="text"
                    placeholder="Enter Phone"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Address" label-for="addressInput">
									<b-form-textarea
                    id="textarea"
                    v-model="form.address"
                    placeholder="Enter Address"
                    rows="5"
                    max-rows="6"
                  ></b-form-textarea>
								</b-form-group>
								<b-form-group label="Category" label-for="categoryInput">
									<b-form>
										<b-form-select
                      v-model="form.category"
                      :options="optionsCategory"
                      class="custom-select"
                      required
                    ></b-form-select>
									</b-form>
								</b-form-group>
								<b-form-group label="Company Name" label-for="companyNameInput">
									<b-form-input
                    id="companyNameInput"
                    v-model="form.companyName"
                    type="text"
                    placeholder="Enter Company Name"
                  ></b-form-input>
								</b-form-group>
								<b-form-group
                  label="ABN/CN Number"
                  label-for="abncnNumberInput"
                >
									<b-form-input
                    id="abncnNumberInput"
                    v-model="form.abncnNumber"
                    type="text"
                    placeholder="Enter Company Name"
                  ></b-form-input>
								</b-form-group>
								<b-form-group
                  label="Driving Licence"
                  label-for="drivingLicenceInput"
                >
									<b-form-file
                    id="drivingLicenceInput"
                    v-model="form.drivingLicence"
                    placeholder="upload image..."
                    v-on:change="onDrivingLicenceChange"
                  ></b-form-file>
									<img
                    :src="form.drivingLicence"
                    class="img-thumbnail"
                    alt="driving licence"
                    style="height: 170px;"
                  />
								</b-form-group>
								<b-form-group label="Photo ID" label-for="photoIDInput">
									<b-form-input
                    id="photoIDInput"
                    v-model="form.photoID"
                    type="text"
                    placeholder="Enter Photo ID"
                    required
                  ></b-form-input>
								</b-form-group>
								<b-form-group label="Avatar" label-for="avatarInput">
									<b-form-file
                    id="avatarInput"
                    v-model="form.avatar"
                    placeholder="upload image..."
                    v-on:change="onAvatarChange"
                  ></b-form-file>
									<img
                    :src="form.avatar"
                    class="rounded-circle"
                    alt="driving licence"
                    style="height: 200px;"
                  />
								</b-form-group>
								<b-form-group label="Status" label-for="statusInput">
									<b-form>
										<b-form-select
                      v-model="form.status"
                      :options="optionsStatus"
                    ></b-form-select>
									</b-form>
								</b-form-group>
								<div class="d-flex justify-content-end">
									<div class="form-group">
										<b-button
                      class="btn btn-primary btn-raised"
                      v-if="progressModal"
                    >
											<b-spinner small></b-spinner>
                      Loading...
                    
										</b-button>
										<button
                      type="submit"
                      class="btn btn-primary btn-raised"
                      v-if="!progressModal"
                    >
											<i class="fa fa-pencil"></i> UPDATE
                    
										</button>
										<button type="reset" class="btn btn-danger btn-raised">
											<i class="fa fa-undo"></i> RESET
                    
										</button>
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
              @hidden="clearForm"
              centered
            >
							<p>
                Are you sure want to delete customer [{{ form.id }}] - [{{ form.firstName
                }}] [{{ form.lastName }}]
              </p>
							<div class="d-flex justify-content-end">
								<div class="form-group">
									<b-button
                    class="btn btn-primary btn-raised"
                    v-if="progressModal"
                  >
										<b-spinner small></b-spinner>
                    Loading...
                  
									</b-button>
									<button
                    type="submit"
                    class="btn btn-primary btn-raised"
                    v-if="!progressModal"
                    @click.prevent="customerDelete()"
                  >
										<i class="fa fa-pencil"></i> DELETE
                  
									</button>
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
import BubbleChart from '../dashboard/BubbleChart'
import config from "../../Config"

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
                drivingLicence:null,
                photoID:'',
                avatar:'',
                status:'',
            },
            oldForm: {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                address: '',
                category: null,
                companyName:'',
                abncnNumber:'',
                drivingLicence: null,
                photoID:'',
                avatar: null,
                status:'',
            },
            pageOptions: ['10', '50', '100', '500'],
            currentPage: 1,
            perPage: 10,
            totalRows: 0,
            progressModal: false,
            sortBy: 'id',
            sortDesc: true,
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
            fieldsCustomer: [
                {
                    key: 'id',
                    sortable: true
                },
                {
                    key: 'first_name',
                    sortable: true
                },
                {
                    key: 'last_name',
                    sortable: true
                },
                {
                    key: 'email',
                    sortable: true
                },
                {
                    key: 'phone',
                    sortable: true
                },
                {
                    key: 'category',
                    sortable: true
                },
                {
                    key: 'status',
                    sortable: true
                },
                'Action'
            ],
            prevDrivingLicence: null,
            prevAvatar: null,
            validation: [],
             spinnerGetAllData: false,
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
        openEditModal(item) {
            this.form.id = item.id;
            this.form.firstName = item.first_name;
            this.form.lastName = item.last_name;
            this.form.email = item.email;
            this.form.phone = item.phone;
            this.form.address = item.address;
            this.form.category = item.category;
            this.form.companyName = item.company_name;
            this.form.abncnNumber = item.abn_cn_number;
            this.form.drivingLicence = item.driving_licence;
            this.form.photoID = item.photo_id;
            this.form.avatar = item.avatar;
            this.form.status = item.status; 

            this.oldForm.firstName = item.first_name;
            this.oldForm.lastName = item.last_name;
            this.oldForm.email = item.email;
            this.oldForm.phone = item.phone;
            this.oldForm.address = item.address;
            this.oldForm.category = item.category;
            this.oldForm.companyName = item.company_name;
            this.oldForm.abncnNumber = item.abn_cn_number;
            this.oldForm.drivingLicence = item.driving_licence;
            this.oldForm.photoID = item.photo_id;
            this.oldForm.avatar = item.avatar;
            this.oldForm.status = item.status; 
            this.$bvModal.show('modal-edit-customer');
        },
        openDeleteModal(item) {
            this.form.id = item.id;
            this.form.firstName = item.first_name;
            this.form.lastName = item.last_name;
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
        getAllCustomers() {
            let url = config.API_LOCATION + '/customers?sortby=' + this.sortBy + '&sortdesc=' + this.sortDesc + '&limit=' + this.perPage + '&page=' + this.currentPage;
            let promise = axios.get(
                url
            )
            return promise.then((response) => {
                const customers = response.data
                this.totalRows = customers.meta.total
                this.spinnerGetAllData = false;
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

            let url = config.API_LOCATION + '/customers/store';
            this.axios.post(url, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-create-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
             },
        customerUpdate() {
            this.progressModal = true;
            var data = new FormData()
            if (this.form.firstName != this.oldForm.firstName) {
                data.append('first_name', this.form.firstName);
            }
            if (this.form.lastName != this.oldForm.lastName) {
                data.append('last_name', this.form.lastName);
            }
            if (this.form.email != this.oldForm.email) {
                data.append('email', this.form.email);
            }
            if (this.form.phone != this.oldForm.phone) {
                data.append('phone', this.form.phone);
            }
            if (this.form.address != this.oldForm.address) {
                data.append('address', this.form.address);
            }
            if (this.form.category != this.oldForm.category) {
                data.append('category', this.form.category);
            }
            if (this.form.companyName != this.oldForm.companyName) {
                data.append('company_name', this.form.companyName);
            }
            if (this.form.abncnNumber != this.oldForm.abncnNumber) {
                data.append('abn_cn_number', this.form.abncnNumber);
            }
            if (this.form.drivingLicence != this.oldForm.drivingLicence) {
                data.append('driving_licence', this.form.drivingLicence);
            }
            if (this.form.photoID != this.oldForm.photoID) {
                data.append('photo_id', this.form.photoID);
            }
            if (this.form.avatar != this.oldForm.avatar) {
                data.append('avatar', this.form.avatar);
            }
            if (this.form.status != this.oldForm.status) {
                data.append('status', this.form.status);
            }
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let url = config.API_LOCATION + `/customers/update/${this.form.id}`;
            this.axios.post(url, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-edit-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
        },
        customerDelete() {
            this.progressModal = true;
            var data = new FormData()
            data.append('deleted', 1)

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let url = config.API_LOCATION + `/customers/delete/${this.form.id}`;
            this.axios.post(url, data, config)
                .then((response) => {
                    this.progressModal = false;
                    this.$bvModal.hide('modal-delete-customer');
                    this.$refs.table.refresh()
                }).catch(error => {});
        },
    },
    created() {
        this.spinnerGetAllData = true;
    }
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