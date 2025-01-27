<template>
    <div class="">
        <Menu as="div" class="relative block">
            <MenuButton
                class="flex w-full justify-between rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
            >
                Create New
                <PlusIcon class="h-5 w-5" />
            </MenuButton>

            <transition
                enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in"
                leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0"
            >
                <MenuItems
                    class="absolute left-0 mt-2 w-[176px] origin-top-right divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                >
                    <div>
                        <div
                            @click="showCreateFolderModal"
                            class="w-full cursor-pointer px-2 py-2 hover:bg-gray-200"
                        >
                            <MenuItem>
                                <p>New Folder</p>
                            </MenuItem>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <FileUploadMenuItem />
                        <FolderUploadMenuItem />
                    </div>
                </MenuItems>
            </transition>
        </Menu>

        <CreateFolderModal v-model="createFolderModal" />
    </div>
</template>

<script setup>
import FileUploadMenuItem from '@/Components/App/FileUploadMenuItem.vue';
import FolderUploadMenuItem from '@/Components/App/FolderUploadMenuItem.vue';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { PlusIcon } from '@heroicons/vue/24/solid';
import { ref } from 'vue';

const createFolderModal = ref(false);

function showCreateFolderModal() {
    createFolderModal.value = true;
}
</script>

<style lang=""></style>
