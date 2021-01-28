<template>
    <div>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Customers Information</h3>

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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered At</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in userAccounts" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.fname | upText}} {{user.lname | upText}}</td>
                        <td>{{user.email}}</td>
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
        <div class="modal fade" id="addCust" tabindex="-1" role="dialog" aria-labelledby="addCust" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="addCust">Add New Customer</h5>
                        <h5 class="modal-title" v-show="editMode" id="addCust">Update Customer Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateUser() : createUser()">
                    <div class="modal-body">
                        <!--  First Name  -->
                        <div class="form-group">
                            <input v-model="userForm.fname" type="text" name="fname" placeholder="First Name"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('fname') }">
                            <has-error :form="userForm" field="fname"></has-error>
                        </div>
                        <!--  First Name  -->
                        <!--  Last Name  -->
                        <div class="form-group">
                            <input v-model="userForm.lname" type="text" name="lname" placeholder="Last Name"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('lname') }">
                            <has-error :form="userForm" field="lname"></has-error>
                        </div>
                        <!--  Last Name  -->
                        <!--  Email Name  -->
                        <div class="form-group">
                            <input v-model="userForm.email" type="email" name="email" placeholder="Email Address"
                                class="form-control" :class="{ 'is-invalid': userForm.errors.has('email') }">
                            <has-error :form="userForm" field="email"></has-error>
                        </div>
                        <!--  Email Name  -->
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
                    fname: '',
                    lname: '',
                    email: ''
                })
            }
        },
        methods: {
            editModal(user){
                this.editMode = true;
                this.userForm.reset();
                $('#addCust').modal('show');
                this.userForm.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.userForm.reset();
                $('#addCust').modal('show');
            },
            updateUser(id){
                this.$Progress.start();
                //console.log('Its Updating fine!');
                this.userForm.put('api/customer/'+this.userForm.id)
                .then(() => {
                    $('#addCust').modal('hide');
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
                            this.userForm.delete('api/customer/'+id).then(() => {
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
            loadUsers() {
                axios.get("api/customer").then(({data}) => (this.userAccounts = data.data));
            },
            createUser() {
                this.$Progress.start();
                this.userForm.post('api/customer')
                .then(()=>{
                    $('#addCust').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Customer Registered!'
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
            }
        },
        created() { 
            this.loadUsers();
            //setInterval(() => this.loadUsers(), 5000);
        },
        mounted() {
            console.log('Management component mounted.')
        }
    }
</script>