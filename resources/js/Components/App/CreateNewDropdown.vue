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
              <div class="hover:bg-gray-200 px-2 py-2">
                <MenuItem v-slot="{ active }">
                  <a href="">New Folder</a>
                </MenuItem>
              </div>
            </div>
            <div class="flex flex-col">
                <div class="hover:bg-gray-200 px-2 py-2">
                  <MenuItem v-slot="{ active }">
                    <a href="">Upload Folder</a>
                  </MenuItem>
                </div>
                <div class="hover:bg-gray-200 px-2 py-2">
                  <MenuItem v-slot="{ active }">
                    <a href="">Upload File</a>
                  </MenuItem>
                </div>
            </div>
          </MenuItems>
        </transition>
      </Menu>
    </div>
  </template>

<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { PlusIcon } from '@heroicons/vue/24/solid'
</script>

<style lang="">
    
</style>