<template>
    <div class="">
      <Menu as="div" class="relative block">
        <MenuButton
            class="flex justify-between w-full rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
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
            class="absolute left-0 mt-2 w-[176px] origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
          >
            <div>
              <div @click="showCreateFolderModal" class="hover:bg-gray-200 px-2 py-2 w-full cursor-pointer">
                <MenuItem  v-slot="{ active }">
                  <p>New Folder</p>
                </MenuItem>
              </div>
            </div>
            <div class="flex flex-col">
                <div @click="" class="hover:bg-gray-200 px-2 py-2 w-full cursor-pointer">
                  <MenuItem v-slot="{ active }">
                    <p>Upload Folder</p>
                  </MenuItem>
                </div>
                <div @click="" class="hover:bg-gray-200 px-2 py-2 w-full cursor-pointer">
                  <MenuItem v-slot="{ active }">
                    <p>Upload File</p>
                  </MenuItem>
                </div>
            </div>
          </MenuItems>
        </transition>
      </Menu>

      <CreateFolderModal v-model="createFolderModal"/>
    </div>
  </template>

<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { PlusIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue';
import CreateFolderModal from './CreateFolderModal.vue';

const createFolderModal = ref(false);

function showCreateFolderModal(){
  createFolderModal.value = true;
}
</script>

<style lang="">
    
</style>