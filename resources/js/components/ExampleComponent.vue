<template>
    <section class="pt-16 pb-16">
        <div class="justify-center mx-auto">

            <h3 class="text-md text-center mb-8 text-teal-800">
                TEST CRUD
            </h3>

            <form @submit.prevent="save">
                <div class="grid gap-6 mb-6 md:grid-cols-2 px-4 md:px-0">
                    <div>
                        <label for="first_name"  class="title-preinput">First Name</label>
                        <input type="text" id="first_name" v-model="employee.first_name"   placeholder="John" required>
                    </div>

                    <div>
                        <label for="first_name" class="title-preinput">Last name</label>
                        <input type="text" id="first_name" v-model="employee.last_name"  placeholder="John" required>
                    </div>

                    <div>
                        <label for="first_name" class="title-preinput">Address</label>
                        <input type="text" id="first_name" v-model="employee.address" placeholder="John" required>
                    </div>

                    <div>
                        <label for="first_name" class="title-preinput">Mobile</label>
                        <input type="text" id="first_name" v-model="employee.mobile"  placeholder="John" required>
                    </div>
                </div>

                <button type="submit" class="px-6 py-2 bg-teal-500 rounded-lg text-white mx-auto block">Kirim</button>

            </form>

        </div>
    </section>

    <section>      
        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 mx-auto">
                <thead class="text-xs uppercase bg-teal-500 text-white">
                    <tr>
                       
                        <th scope="col">
                            First Name
                        </th>
                        <th scope="col">
                            Last Name
                        </th>
                        <th scope="col">
                            Address
                        </th>
                        <th scope="col">
                            Mobile
                        </th>
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody v-if="result.length > 0">
                    <tr v-for="employee in result" v-bind:key="employee.id" class="bg-white border-b">
                        <th class="whitespace-nowrap">
                            {{ employee.first_name }}
                        </th>
                        <td>{{ employee.last_name }}</td>
                        <td>{{ employee.address }}</td>
                        <td>{{ employee.mobile }}</td>
                        <td class="gap-2 flex ">
                            <!-- <router-link :to='{name:"employeeEdit",params:{id:employee.id}}' class="bg-teal-500 px-6 py-2 rounded-lg text-white">Edit</router-link> -->
                   
                            <button type="button" @click="editEmployee(employee)" class="bg-teal-500 px-6 py-2 rounded-lg text-white"  >Edit</button>
                            <button type="button" @click="deleteEmployee(employee.id)" class="bg-teal-500 px-6 py-2 rounded-lg text-white"  >Delete</button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                        <tr>
                            <td class="flex justify-center text-center  text-md font-semibold">not employee found.</td>
                        </tr>
                </tbody>
            
            </table>
        </div>

    </section>
</template>

<script>

import axios from 'axios';

export default {
    name:"Employee",
    data(){
        return {
            result:{},
            employee:{
                id:'',
                first_name:'',
                last_name:'',
                address:'',
                mobile:'',
            }
        }
    },
    mounted(){
        this.EmployeeLoad()
        console.log("mounted() called.......")
    },
    methods:{   
        async EmployeeLoad(){
            var page = "/api/employee";
            await axios.get(page).then(
                ({data})=>{
                    console.log(data);
                    this.result= data;
                }
            )
        },

        save(){
            if(this.employee.id == '')
            {
                this.createEmployee();
            }else{
                this.updateEmployee();
            }
        },

        async createEmployee(){
            await axios.post('/api/save',this.employee).then(response=>{
                this.$router.push({name:"Employee"}),
                this.EmployeeLoad()
            }).catch(error=>{
                console.log(error)
            })
        },

        editEmployee(employee)
        {
            this.employee = employee;
        },

        async updateEmployee(){
            var editRecord = "/api/update/"+this.employee.id;
            if(confirm("Are you sure to update this employee ?")){
                await axios.put(editRecord, this.employee).then(
                    ({data}) => {
                        this.employee.first_name = '';
                        this.employee.last_name = '';
                        this.employee.address = '';
                        this.employee.mobile = '';
                    },
                    this.EmployeeLoad(),
                    // window.refresh()
                )
            }
        },

        async deleteEmployee(id){
            if(confirm("Are you sure to delete this employee ?")){
            
                await axios.delete(`/api/destroy/${id}`).then(response=>{
                    this.EmployeeLoad()
                    // console.log(a);
                }).catch(error=>{
                    console.log(error)
                })

            }
        },
    }
}
</script>

