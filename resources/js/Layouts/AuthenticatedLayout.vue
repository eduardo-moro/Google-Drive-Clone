<template>
    <div class="h-screen flex w-full gap-4 dark:bg-gray-800">
        <Navigation />

        <main class="flex flex-col flex-1 px-4 overflow-hidden overflow-y-auto no-scrollbar">
            <div class="flex items-center justify-between w-full">
                <SearchForm />
                <div class="flex">
                    <button
                        @click="handleThemeToggle"
                        class="no-bg p-2 text-black dark:text-white"
                        aria-label="Toggle theme"
                    >
                        <component
                            :is="isDarkMode ? SunIcon : MoonIcon"
                            class="w-6 h-6"
                        />
                    </button>
                    <UserSettingsDropdown />
                </div>
            </div>
            <div class="dark:text-white">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup lang="ts">
import Navigation from '@/Components/App/Navigation.vue';
import SearchForm from '@/Components/App/SearchForm.vue';
import UserSettingsDropdown from '@/Components/App/UserSettingsDropdown.vue';

import { inject, ref } from 'vue';
import { MoonIcon } from '@heroicons/vue/24/outline';
import { SunIcon } from '@heroicons/vue/24/outline';

const toggleTheme = inject('toggleTheme') as (() => void) | undefined;

const isDarkMode = ref(document.documentElement.classList.contains('dark'));

const handleThemeToggle = () => {
    if (toggleTheme) {
        toggleTheme();
        isDarkMode.value = !isDarkMode.value;
    }
};
</script>
