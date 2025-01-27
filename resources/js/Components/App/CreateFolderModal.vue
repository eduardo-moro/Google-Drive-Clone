<template>
    <modal :show="modelValue" closeable maxWidth="sm" @show="onShow">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">
                Create new folder.
            </h2>
            <div class="mt-6">
                <InputLabel
                    for="folderName"
                    class="sr-only"
                    value="Folder Name:"
                >
                </InputLabel>
                <TextInput
                    ref="folderNameInput"
                    type="text"
                    id="folderName"
                    class="bg mt-1 block w-full rounded-md"
                    v-model="form.name"
                    :class="
                        form?.errors.name
                            ? 'border-pink-500 focus:border-pink-500 focus:ring-pink-500'
                            : ''
                    "
                    placeholder="Inform a cool name for your folder!"
                    @keyup.enter="createFolder"
                />
                <InputError
                    :message="form?.errors.name"
                    class="mt-2"
                ></InputError>
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton @click="createFolder">Create</PrimaryButton>
            </div>
        </div>
    </modal>
</template>
<script setup>
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, usePage } from "@inertiajs/vue3";
import { nextTick, ref } from 'vue';

const page = usePage();

const { modelValue } = defineProps({
    modelValue: Boolean,
});

const form = useForm({
    name: '',
    parent_id: null,
});

const folderNameInput = ref(null);

const emit = defineEmits(['update:modelValue']);

function createFolder() {
    form.parent_id = page.props.folder.data.id;
    console.log(form.parent_id);
    form.post(route('folder.create'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            form.reset();
        },
        onError: () => folderNameInput.value.focus(),
    });
}

function closeModal() {
    emit('update:modelValue');
    form.clearErrors;
    form.reset;
}

function onShow() {
    nextTick(() => {
        folderNameInput.value.focus();
    });
}
</script>
<style lang=""></style>
