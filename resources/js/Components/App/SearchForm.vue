<template lang="">
    <form class="w-[600px] h-[80px] flex items-center">
        <TextInput type="text" 
                   class="block w-full mr" 
                   autocomplete
                   v-model="form.search"
                   placeholder="Search files"
                   />

    </form>
</template>
<script setup>
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    search: '',
})

</script>
<style lang="">
    
</style>