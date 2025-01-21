<template>
    <nav class="min-w-[200px]">
        <div class="h-[80px] px-3 flex items-center gap-3 dark:text-gray-300">
            <Link :href="route('myFiles')">
                <ApplicationLogo
                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                    />
            </Link>
            LaraStorage
        </div>
        
        <div class="px-3">
            <CreateNewDropdown />

            <div class="py-3">
                <NavLink :href="route('myFiles')" :active="$page.url === '/my-files'">My Files</NavLink>
                <NavLink :href="route('sharedWithMe')" :active="$page.url === '/shared/with-me'">Shared with me</NavLink>
                <NavLink :href="route('sharedByMe')" :active="$page.url === '/shared/by-me'">Shared by me</NavLink>
                <NavLink :href="route('trash')" :active="$page.url === '/trash'">Trash</NavLink>
            </div>
        </div>
    </nav>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import CreateNewDropdown from '@/Components/App/CreateNewDropdown.vue';
import NavLink from '@/Components/NavLink.vue';
</script>

<style lang="">
    
</style>