<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'flex w-full items-center px-5 py-2 text-sm font-medium leading-5 text-indigo-700 bg-gray-200 dark:bg-gray-900 dark:text-indigo-200 rounded-md focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'flex w-full items-center px-5 py-2 text-sm font-medium leading-5 text-gray-700 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out',
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot></slot>
    </Link>
</template>
