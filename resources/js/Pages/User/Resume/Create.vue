<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { onMounted } from 'vue';
import { initDropdowns } from 'flowbite'
import { ref } from 'vue';
defineProps({
    canResetPassword: Boolean,
    status: String,
    categories: Object
});


const form = useForm({
    jobTitle:'',
    resumeDetails: '',
});
const submit = () => {
    form.post(route('user.resume.store')
    );
};
onMounted(() => {
    initDropdowns();
})
</script>

<template>

    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Create Resume</h2>
        </template>
         <div class="py-12">
            <div class=" min-h-screen mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" shadow-md sm:rounded-lg">
                         <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                                <form class="m-1" @submit.prevent="submit">
                                    <InputLabel for="name" value="Job Title" />
                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.jobTitle"
                                            autofocus
                                            autocomplete="jobTitle"
                                        />
                                        <InputError class="mt-2" :message="form.errors.jobTitle" />
                                    <InputLabel for="jobDescription" value="Write Your CV/ Resume below" />
                                    <div class=" overflow-hidden shadow-sm sm:rounded-lg dark:text-white">
                                        <QuillEditor class=" min-h-full" v-model:content="form.resumeDetails" contentType="html" theme="snow"  toolbar="minimum"/>
                                    </div>
                                     <InputError class="mt-2" :message="form.errors.resumeDetails" />
                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Create Resume
                                        </PrimaryButton>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </AuthenticatedLayout>
</template>
