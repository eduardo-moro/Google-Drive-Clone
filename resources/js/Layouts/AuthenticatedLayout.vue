<template>
    <div class="h-screen flex w-full gap-4 dark:bg-gray-800">
        <Navigation />

        <main class="flex flex-col flex-1 px-4 overflow-hidden">
            <div class="flex items-center justify-between w-full">
                <SearchForm></SearchForm>
                <UserSettingsDropdown></UserSettingsDropdown>
            </div>
            <div class="dark:text-white">
                <slot/>
            </div>
        </main>
    </div>
</template>


<script setup lang="ts">
import Navigation from '@/Components/App/Navigation.vue';
import SearchForm from '@/Components/App/SearchForm.vue';
import UserSettingsDropdown from '@/Components/App/UserSettingsDropdown.vue';

</script>
