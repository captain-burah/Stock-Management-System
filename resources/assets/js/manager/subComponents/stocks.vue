<template>
    <div>
        <h2 class="p-2 text-dark">Warehouse Information</h2>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Stock Management</h3>

            <div class="card-tools">
                <button class="btn btn-success" @click="newModal">
                <!-- data-toggle="modal" data-target="#addUser" -->
                Add New
                <i class="fas fa-user-plus fa-fw"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 400px;">
            <table class="table table-head-fixed table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>size</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Category</th>
                        <th>Product Brand</th>
                        <th>Unit Price</th>
                        <th>Imported At</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in userAccounts" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name | upText}}</td>
                        <td>{{user.size}}</td>
                        <td>{{user.quantity}}</td>
                        <td>{{user.color}}</td>
                        <td>{{user.category}}</td>
                        <td>{{user.brand_id}}</td>
                        <td>{{user.unit_price}}</td>
                        <td>{{user.created_at | myDate}}</td>
                        <td>
                            <a href="#" @click="editModal(user)">
                                <i class="fa fa-edit"></i>
                            </a>
                            /
                            <a href="#" @click="deleteUser(user.id)">
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
        <div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="addStock" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="addStock">Add New Stock Info</h5>
                        <h5 class="modal-title" v-show="editMode" id="addStock">Update Stock Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <!--  Name  -->
                        <div class="form-group">
                            <input v-model="userForm.name" type="text" name="name" placeholder="Product Name"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('name') }">
                            <has-error :form="userForm" field="name"></has-error>
                        </div>
                        <!--  Name  -->
                        <!--  Size  -->
                        <div class="form-group">
                            <input v-model="userForm.size" type="text" name="size" placeholder="Size"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('size') }">
                            <has-error :form="userForm" field="size"></has-error>
                        </div>
                        <!--  Size  -->
                        <!--  Quantity  -->
                        <div class="form-group">
                            <input v-model="userForm.quantity" type="text" name="quantity" placeholder="Quantity"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('quantity') }">
                            <has-error :form="userForm" field="quantity"></has-error>
                        </div>
                        <!--  Quantity  -->
                        <!--  Product Color  -->
                        <div class="form-group">
                            <input v-model="userForm.color" type="text" name="color" placeholder="Product Color"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('color') }">
                            <has-error :form="userForm" field="color"></has-error>
                        </div>
                        <!--  Product Color  -->
                        <!--  Category  -->
                        <div class="form-group">
                            <label class="text-dark ml-1">Product Category</label>
                            <select class="form-control" v-model="userForm.category" name="category" placeholder="Product Category"
                            :class="{ 'is-invalid': userForm.errors.has('category') }">
                                <option>Category...</option>
                                <option value="Enamel Paint">Enamel Paint</option>
                                <option value="Oil Paint">Oil Paint</option>
                                <option value="Emulsion Paint">Emulsion Paint</option>
                                <option value="Cement Paint">Cement Paint</option>
                                <option value="Bituminous Paint">Bituminous Paint</option>
                                <option value="Plastic Paint">Plastic Paint</option>
                                <option value="Anti-Corrosive Paint">Anti-Corrosive Paint</option>
                                <option value="Cellulose Paint">Cellulose Paint</option>
                                <option value="Latex Paint">Latex Paint</option>
                                <option value="Acrylic Paint">Acrylic Paint</option>
                                <option value="Primer Paint">Primer Paint</option>
                            </select>
                            <has-error :form="userForm" field="category"></has-error>
                        </div>
                        <!--  Category  -->
                        <!--  Brand  -->
                        <div class="form-group">
                            <input v-model="userForm.brand_id" type="text" name="brand_id" placeholder="Product Brand"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('brand_id') }">
                            <has-error :form="userForm" field="brand_id"></has-error>
                        </div>
                        <!--  Brand  -->
                        <!--  Unit Price  -->
                        <div class="form-group">
                            <input v-model="userForm.unit_price" type="text" name="unit_price" placeholder="Unit Price"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('unit_price') }">
                            <has-error :form="userForm" field="unit_price"></has-error>
                        </div>
                        <!--  Unit Price  -->
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
                userAccounts: {},
                userForm: new Form({
                    id: '',
                    name: '',
                    size: '',
                    quantity: '',
                    color: '',
                    category: '',
                    brand_id: '',
                    unit_price: ''
                })
            }
        },
        methods: {
            editModal(user){
                this.editMode = true;
                this.userForm.reset();
                $('#addStock').modal('show');
                this.userForm.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.userForm.reset();
                $('#addStock').modal('show');
            },
            updateUser(id){
                this.$Progress.start();
                //console.log('Its Updating fine!');
                this.userForm.put('api/stock/'+this.userForm.id)
                .then(() => {
                    $('#addStock').modal('hide');
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
                            this.userForm.delete('api/stock/'+id).then(() => {
                                swal.fire(
                                'Deleted!',
                                'Stock deleted.',
                                'success'
                                )
                            setTimeout(function(){this.loadUsers()}.bind(this), 1000);
                            }).catch(() => {
                                swal("Failed!", "There was something wrong.", "Warning");
                            });
                        }
                    })
            },
            loadUsers() {
                axios.get("api/stock").then(({data}) => (this.userAccounts = data.data));
            },
            createUser() {
                this.$Progress.start();
                this.userForm.post('api/stock')
                .then(()=>{
                    $('#addStock').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Stock Added!'
                    });
                    setTimeout(function(){this.loadUsers()}.bind(this), 1500);
                    this.$Progress.finish();
                })
                .catch(()=>{
                    Toast.fire({
                        icon: 'error',
                        title: 'Failled to Add Stock!'
                    });
                    setTimeout(function(){this.loadUsers()}.bind(this), 1500);
                })
            }
        },
        created() { 
            this.loadUsers();
            //setInterval(() => this.loadUsers(), 5000);
        },
    }
</script>