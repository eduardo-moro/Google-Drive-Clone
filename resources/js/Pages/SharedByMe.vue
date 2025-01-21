<template>
    <Head title="Shared By Me"> </Head>

    <AuthenticatedLayout>
        {{ $page.url }}
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>