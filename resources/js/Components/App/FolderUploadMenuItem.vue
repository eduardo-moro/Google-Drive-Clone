<template>
    <div class="w-full cursor-pointer px-2 py-2 hover:bg-gray-200">
        <MenuItem>
            <p>Upload Folder</p>
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
