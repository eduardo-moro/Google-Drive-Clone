<template>
    <Head title="My Files"> </Head>

    <AuthenticatedLayout>
        <nav class="mb-3 flex items-center justify-between p-1">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li
                    v-for="ans of ancestors.data"
                    :key="ans.id"
                    class="inline-flex items-center"
                >
                    <Link
                        v-if="!ans.parent_id"
                        :href="route('dashboard')"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-700 dark:text-gray-100 dark:hover:text-indigo-700"
                    >
                        <HomeIcon class="mr-2 h-5 w-5"></HomeIcon>
                        My Files
                    </Link>
                    <div v-else class="flex items-center">
                        <ChevronRightIcon
                            class="mr-2 h-5 w-5"
                        ></ChevronRightIcon>
                        <Link
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-700 dark:text-gray-100 dark:hover:text-indigo-700"
                            :href="route('dashboard', { folder: ans.path })"
                        >
                            {{ ans.name }}
                        </Link>
                    </div>
                </li>
            </ol>
        </nav>

        <table
            v-if="files?.data.length > 0"
            class="min-w-full overflow-hidden rounded-2xl"
        >
            <thead class="bg-gray-100 dark:border-gray-600 dark:bg-gray-900">
                <tr>
                    <th
                        class="px-6 py-4 text-left text-lg font-normal text-gray-900 dark:text-white"
                    >
                        Name
                    </th>
                    <th
                        class="px-6 py-4 text-left text-lg font-normal text-gray-900 dark:text-white"
                    >
                        Owner
                    </th>
                    <th
                        class="px-6 py-4 text-left text-lg font-normal text-gray-900 dark:text-white"
                    >
                        Last Modified
                    </th>
                    <th
                        class="px-6 py-4 text-left text-lg font-normal text-gray-900 dark:text-white"
                    >
                        Size
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="file of files?.data"
                    @dblclick="openFolder(file)"
                    v-bind:key="file.id"
                    class="cursor-pointer border-t bg-white p-4 hover:bg-black hover:bg-opacity-5 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-white dark:hover:bg-opacity-5"
                >
                    <td
                        class="whitespace-nowrap px-6 py-5 text-sm font-medium text-gray-900 dark:text-gray-100"
                    >
                        {{ file.name }}
                    </td>
                    <td
                        class="whitespace-nowrap px-6 py-5 text-sm font-medium text-gray-900 dark:text-gray-100"
                    >
                        {{ file.owner }}
                    </td>
                    <td
                        class="whitespace-nowrap px-6 py-5 text-sm font-medium text-gray-900 dark:text-gray-100"
                    >
                        {{ file.updated_at }}
                    </td>
                    <td
                        class="whitespace-nowrap px-6 py-5 text-sm font-medium text-gray-900 dark:text-gray-100"
                    >
                        {{ file.size }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div
            v-else
            class="flex min-h-48 w-full text-gray-900 dark:text-gray-100"
        >
            <p class="text-2xl font-light text-gray-500">
                There are no files here,
                <a
                    class="cursor-pointer hover:text-gray-700 dark:hover:text-gray-400"
                    >would you like to upload a new file?</a
                >
            </p>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="js">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/24/outline/index.js';
import { Head, Link, router } from '@inertiajs/vue3';

const { files } = defineProps({
    files: Object,
    folder: Object,
    ancestors: Array,
});

function openFolder(file) {
    if (!file.is_folder) return;

    router.visit(route('dashboard', { folder: file.path }));
}
</script>
