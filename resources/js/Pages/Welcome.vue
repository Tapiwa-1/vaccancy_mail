<template>
    <Nav >
        <template v-slot:content>
            home page
        </template>
    </Nav>

</template>

<script setup>
import Nav from '@/Layouts/Nav.vue';
const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<style>
</style>
