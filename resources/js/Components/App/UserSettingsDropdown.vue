<template>
    <div class="text-right">
      <Menu as="div" class="relative inline-block text-left">
        <div>
          <MenuButton
            class="inline-flex w-full justify-center rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
          >
            {{$page.props.auth.user.name.split(' ')[0]}}
            <ChevronDownIcon
              class="-mr-1 ml-2 h-5 w-5 text-violet-200 hover:text-violet-100"
              aria-hidden="true"
            />
          </MenuButton>
        </div>
  
        <transition
          enter-active-class="transition duration-100 ease-out"
          enter-from-class="transform scale-95 opacity-0"
          enter-to-class="transform scale-100 opacity-100"
          leave-active-class="transition duration-75 ease-in"
          leave-from-class="transform scale-100 opacity-100"
          leave-to-class="transform scale-95 opacity-0"
        >
          <MenuItems
            class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
          >
            <div class="px-1 py-1">
              <ResponsiveNavLink :href="route('profile.edit')">
                <button
                  :class="[
                    active ? 'bg-violet-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                  ]"
                >
                  <UserIcon
                    class="mr-2 h-5 w-5"
                    aria-hidden="true"
                  />
                  Profile
                </button>
              </ResponsiveNavLink>
              <ResponsiveNavLink :href="route('logout')" method="post">
                <button
                  :class="[
                    active ? 'bg-violet-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                  ]"
                >
                  <ArrowRightStartOnRectangleIcon
                    :active="active"
                    class="mr-2 h-5 w-5"
                    aria-hidden="true"
                  />
                  Logout
                </button>
              </ResponsiveNavLink>
            </div>
          </MenuItems>
        </transition>
      </Menu>
    </div>
  </template>

<script setup>
import { Menu, MenuButton, MenuItems } from '@headlessui/vue'
import { ArrowRightStartOnRectangleIcon, ChevronDownIcon, UserIcon } from '@heroicons/vue/24/solid'
import ResponsiveNavLink from '../ResponsiveNavLink.vue';
</script>

<style lang="">
    
</style>