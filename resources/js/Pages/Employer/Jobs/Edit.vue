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
import { ref } from 'vue';
const props = defineProps({
    job:String
});


const form = useForm({
    jobDescription: props.job.jobDescription,
    jobTitle: props.job.jobTitle,
    jobSummary: props.job.jobSummary,
    dueDate: props.job.dueDate
});
const submit = () => {
    form.put(route('employer.jobs.update', props.job.slug)
    );
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Edit - {{job.jobTitle  }}</h2>
        </template>
         <div class="py-12">
            <div class=" min-h-screen mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" shadow-md sm:rounded-lg">
                         <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <form class="m-1" @submit.prevent="submit">
                                     <div>
                                            <InputLabel for="name" value="Job Title" />

                                            <TextInput
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.jobTitle"
                                                autocomplete="jobTitle"
                                            />

                                            <InputError class="mt-2" :message="form.errors.jobTitle" />
                                        </div>
                                          <div>
                                            <InputLabel for="name" value="Job Title" />

                                            <TextInput
                                                id="date"
                                                type="date"
                                                class="mt-1 block w-full"
                                                v-model="form.dueDate"
                                                autocomplete="dueDate"
                                            />

                                            <InputError class="mt-2" :message="form.errors.dueDate" />
                                        </div>
                                         <div>
                                            <InputLabel for="name" value="Job Summary" />

                                            <TextInput
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.jobSummary"

                                                autofocus
                                                autocomplete="jobSummary"
                                            />

                                            <InputError class="mt-2" :message="form.errors.jobSummary" />
                                        </div>
                                    <InputLabel for="jobDescription" value="Job Description" />

                                    <div class="h-80 overflow-hidden shadow-sm sm:rounded-lg dark:text-white">
                                        <QuillEditor class=" min-h-full" v-model:content="form.jobDescription" contentType="html" theme="snow"  toolbar="minimum"/>
                                    </div>
                                     <InputError class="mt-2" :message="form.errors.jobDescription" />
                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Post Job
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
