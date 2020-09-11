<template>
   <div>
       <!-- header -->
       <section class="content-header">
           <h1>
               New Orders
           </h1>
           <ol>
               <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li> 
               <li><a href="">New Orders</a></li>
           </ol>
       </section>
       <!--end header-->

       <!-- main content -->
       <div class="row">
            <div class="container-fluid">
                <div class="box">
                    <div class="box-header">
                        <h4>Data New Order</h4>
                        <div class="pull-right">
                            <button
                                type="submit"
                                class="btn btn-primary btn-raised">
                                <i class="fa fa-pencil"></i> Create
                            </button>
                        </div>
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
                        <b-badge pill class="badge badge-success" v-if="data.item.status == '1'">APPROVE</b-badge>
                    </template>
                    <template v-slot:cell(description)="data">
                       <span v-if="data.item.description.length < 10">{{ data.item.description }}</span>
                       <span v-else> {{ data.item.description.substring(0,35)+"....." }} </span>
                    </template>
                    <template v-slot:cell(action)="data">
                            <b-row align-v="center">
                            <b-col cols="*">
                                <b-button size="sm" class="btn btn-raised btn-info btn-sm" @click.stop="data.toggleDetails" v-b-tooltip.hover title="View">
                                    <i class="fa fa-info-circle fa-sm"></i>
                                </b-button>
                            </b-col>
                            <b-col cols="*">
                                <b-button size="sm" class="btn btn-raised btn-warning btn-sm" @click="openDeleteModal(data.item.id)" v-b-tooltip.hover title="Ban">
                                <i class="fa fa-ban fa-sm"></i>
                                </b-button>
                            </b-col>
                            </b-row>
                        </template>
                    </b-table>
                </div>
                


                </div> 
            </div>
       </div>
       <!-- end main content -->
       
   </div> 
</template>

<script>
export default {
    data:function(){
        return {
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
        }
    },
    methods: {
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
            }
        }
    }
</script>
