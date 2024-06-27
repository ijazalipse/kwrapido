<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from "@inertiajs/vue3";

defineProps({    
    tasks: {
        type: Array,
        default: () => [],
    },
});

const headers = ["First Name", "Last Name","Email", "Phone", "Actions"];

const form = useForm({});

const deleteTask = (id) => {
    form.delete(`tasks/${id}`);
};
</script>

<template>
    <AuthenticatedLayout>
    
        <div>
            <h1>My Tasks</h1>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th v-for="header in headers" :key="header">
                                            {{ header }}
                                        </th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="task in tasks" :key="task.id">
                                        <td>{{ task.first_name }}</td>
                                        <td>{{ task.last_name }}</td>
                                        <td>{{ task.email }}</td>
                                        <td>{{ task.phone }}</td>
                                        <td>
                                            <button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button>
                                        |
                                            <a :href="`tasks/${task.id}/edit`" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <Link class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="tasks/create">Create new Task</Link>




    </AuthenticatedLayout>

</template>



