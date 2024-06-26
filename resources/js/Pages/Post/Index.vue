<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from "@inertiajs/vue3";

defineProps({
    posts: {
        type: Array,
        default: () => [],
    },
});

const headers = ["title", "body", "actions"];

const form = useForm({});

const deletePost = (id) => {
    form.delete(`posts/${id}`);
};
</script>

<template>
    <AuthenticatedLayout>
    
        <div>
            <h1>My Posts</h1>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="post in posts" :key="post.id">
                                        <td>{{ post.title }}</td>
                                        <td>{{ post.body }}</td>
                                        <td>
                                            <button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>
                                        </td>
                                        <td>
                                            <a :href="`posts/${post.id}/edit`" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <Link class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="posts/create">Create new Post</Link>




    </AuthenticatedLayout>

</template>



