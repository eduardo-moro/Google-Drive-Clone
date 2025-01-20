<template>
    <Head title="My Files"> </Head>

    <AuthenticatedLayout>
        {{ $page.url }}
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>