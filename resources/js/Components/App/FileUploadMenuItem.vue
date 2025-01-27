<template>
    <div class="w-full cursor-pointer px-2 py-2 hover:bg-gray-200">
        <MenuItem>
            <a href="#" class="relative">
                <p class="cursor-pointer">Upload File</p>
                <input
                    type="file"
                    class="absolute bottom-0 left-0 right-0 cursor-pointer opacity-0 file:cursor-pointer"
                />
            </a>
        </MenuItem>
    </div>
</template>
<script>
import { MenuItem } from '@headlessui/vue';

export default {
    name: 'FileUploadMenuItem',
    components: { MenuItem },
};
</script>
