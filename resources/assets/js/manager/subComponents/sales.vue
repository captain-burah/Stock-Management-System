<template>
    <div>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Sale Management</h3>

            <div class="card-tools">
                <button class="btn btn-success" @click="newModal">
                <!-- data-toggle="modal" data-target="#addUser" -->
                Add New
                <i class="fas fa-user-plus fa-fw"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 200px;">
            <table class="table table-head-fixed table-hover">
                <thead>
                    <tr>
                        <th>Cashier_ID</th>
                        <th>Sale Occurence</th>
                        <th>Stock Sold</th>
                        <th>Customer_ID</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sale in saleAccounts" :key="sale.id">
                        <td>{{sale.cashier_id}}</td>
                        <td>{{sale.saleTime}}</td>
                        <td>{{sale.stock_id}}</td>
                        <td>{{sale.custoemr_id}}</td>
                        <td>{{sale.quantity}}</td>
                        <td>{{sale.total_price| myDate}}</td>
                        <td>
                            <a href="#" @click="editModal(sale)">
                                <i class="fa fa-edit"></i>
                            </a>
                            /
                            <a href="#" @click="deleteUser(sale.id)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal -->
        <div class="modal fade" id="addSale" tabindex="-1" role="dialog" aria-labelledby="addSale" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="addSale">Add New Sale</h5>
                        <h5 class="modal-title" v-show="editMode" id="addSale">Update Sale Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <!--  Cashier ID  -->
                        <div class="form-group">
                            <label class="text-dark ml-1">Name of Cashier</label>
                                <select class="form-control" v-model="userForm.cashier_id" name="cashier_id"
                                :class="{ 'is-invalid': userForm.errors.has('cashier_id') }">
                                    <option v-for="cashier in cashierAccounts" :key="cashier.id" :value="cashier.id">
                                      Cashier id: {{cashier.id}} {{cashier.fname}} {{cashier.lname}}
                                    </option>
                                </select>
                            <has-error :form="userForm" field="cashier_id"></has-error>
                        </div>
                        <!--  Cashier ID  -->
                        <!--  Stock ID  -->
                        <div class="form-group">
                            <label class="text-dark ml-1">Stock Sold</label>
                            <select class="form-control" v-model="userForm.stock_id" name="stock_id"
                            :class="{ 'is-invalid': userForm.errors.has('stock_id') }">
                                <option v-for="stock in stockAccounts" :key="stock.id" :value="stock.id">
                                  Stock id: {{stock.id}} {{stock.name}}
                                </option>
                            </select>
                            <has-error :form="userForm" field="stock_id"></has-error>
                        </div>
                        <!--  Stock ID  -->
                        <!--  Customer ID  -->
                        <div class="form-group">
                            <label class="text-dark ml-1">Customer Name</label>
                            <select class="form-control" v-model="userForm.customer_id" name="customer_id"
                            :class="{ 'is-invalid': userForm.errors.has('customer_id') }">
                                <option v-for="customer in customerAccounts" :key="customer.id" :value="customer.id">
                                  Customer id: {{customer.id}} {{customer.fname}} {{customer.lname}}
                                </option>
                            </select>
                            <has-error :form="userForm" field="customer_id"></has-error>
                        </div>
                        <!--  Customer ID  -->
                        <!--  Quantity  -->
                        <div class="form-group">
                            <div class="row ml-1">
                                <label class="">Quantity: </label>
                                <label class="border border-dark px-4 mx-2">{{userForm.quantity}}</label>
                            </div>
                            <button class="btn btn-success" type="button" v-on:click="calculateAdd" >Add Quanitity</button>
                            <button class="btn btn-danger" type="button" v-on:click="calculateSub" >Remove Quanitity</button>
                        </div>
                        <!--  Quantity  -->
                        <!--  Unit Price  -->
                        <div class="form-group row">
                            <label class="text-dark col-md-4 text-left ml-1">Unit Price</label>
                            <h4 class="text-dark col-md-6 text-right">LKR {{stockUnitPrice}}</h4>
                        </div>
                        <!--  Unit Price  -->
                        <!--  Total Price  -->
                        <div class="form-group row">
                            <label class="text-dark col-md-4 text-left ml-1">Total Price</label>
                            <h4 class="text-dark col-md-6 text-right">LKR {{price}}</h4>
                        </div>
                        <!--  Total Price  -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            //when ever we use a component or data fetched inside the 
            //TEMPLATE then we declare them inside the return statement
            return {
                editMode: true,
                price: 0,
                stockUnitPrice: 0,
                saleAccounts: {},
                stockAccounts: {},
                cashierAccounts: {},
                customerAccounts: {},
                stockInfo: {},
                userForm: new Form({
                    cashier_id: '',
                    stock_id: '',
                    customer_id: '',
                    quantity: '',
                    total_price: ''
                })
            }
        },
        methods: {
            editModal(user){
                this.editMode = true;
                this.userForm.reset();
                this.loadAllAccounts();
                $('#addSale').modal('show');
                this.userForm.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.userForm.reset();
                this.loadAllAccounts();
                $('#addSale').modal('show');
            },
            updateUser(id){
                this.$Progress.start();
                //console.log('Its Updating fine!');
                this.userForm.put('api/sale/'+this.userForm.id)
                .then(() => {
                    $('#addSale').modal('hide');
                    //success
                    swal.fire(
                        'Update!',
                        'Information has been updated.',
                        'success'
                    )
                    setTimeout(function(){this.loadUsers()}.bind(this), 1000);
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            //Send request to server
                            this.userForm.delete('api/sale/'+id).then(() => {
                                swal.fire(
                                'Deleted!',
                                'User account deleted.',
                                'success'
                                )
                            setTimeout(function(){this.loadUsers()}.bind(this), 1000);
                            }).catch(() => {
                                swal("Failed!", "There was something wrong.", "Warning");
                            });
                        }
                    })
            },


            //---  Loading data from the back-end
            loadUsers() {
                axios.get("api/sale").then(({data}) => (this.saleAccounts = data.data));
            },
            loadAllAccounts() {
                axios.get("api/stock").then(({data}) => (this.stockAccounts = data.data));
                axios.get("api/customer").then(({data}) => (this.customerAccounts = data.data));
                axios.get("api/cashier").then(({data}) => (this.cashierAccounts = data.data));
            },


            createUser() {
                this.$Progress.start();
                this.userForm.post('api/sale')
                .then(()=>{
                    $('#addSale').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Store Keeper Registered!'
                    });
                    setTimeout(function(){this.loadUsers()}.bind(this), 1500);
                    this.$Progress.finish();
                })
                .catch(()=>{
                    Toast.fire({
                        icon: 'error',
                        title: 'Failled to Register!'
                    });
                    setTimeout(function(){this.loadUsers()}.bind(this), 1500);
                })
            },
            calculateAdd(){
                this.userForm.quantity++;
                let query = this.userForm.stock_id;
                axios.get('api/findStock?q=' + query)
                .then((data) => {
                    this.stockInfo = data.data;
                    //console.log(this.stockInfo.unit_price);
                    //console.log(this.stockInfo.unit_price * 10);
                    this.stockUnitPrice = this.stockInfo.unit_price;
                    this.price = this.stockInfo.unit_price * this.userForm.quantity;
                    this.userForm.total_price = this.price;
                })
                .catch(() => {
                    console.log('server shits');
                });
            },
            calculateSub() {
                this.userForm.quantity--;
                let query = this.userForm.stock_id;
                axios.get('api/findStock?q=' + query)
                .then((data) => {
                    this.stockInfo = data.data;
                    //console.log(this.stockInfo.unit_price);
                    //console.log(this.stockInfo.unit_price * 10);
                    this.stockUnitPrice = this.stockInfo.unit_price;
                    this.price = this.stockInfo.unit_price * this.userForm.quantity;
                    this.userForm.total_price = this.price;
                })
                .catch(() => {
                    console.log('server shits');
                });
            },

        },
        created() { 
            this.loadUsers();
            this.loadAllAccounts();
            //setInterval(() => this.loadUsers(), 5000);
        },
    }
</script>