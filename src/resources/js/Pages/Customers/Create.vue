<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Core as YubinBangoCore } from 'yubinbango-core2';

defineProps({
    errors: Object,
});

const form = reactive({
    name: null,
    kana: null,
    tel: null,
    email: null,
    postcode: null,
    address: null,
    birthday: null,
    gender: null,
    memo: null,
});

const storeCustomer = () => {
    Inertia.post('/customers', form);
};

const fetchAddress = () => {
    new YubinBangoCore(String(form.postcode), (value) => {
        form.address = value.region + value.locality + value.street;
    });
};
</script>

<template>
    <Head title="顧客登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                顧客登録
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="body-font relative text-gray-600">
                            <form @submit.prevent="storeCustomer">
                                <div class="container mx-auto px-5 py-8">
                                    <div class="mx-auto md:w-2/3 lg:w-1/2">
                                        <div class="-m-2 flex flex-wrap">
                                            <div
                                                class="w-full p-2"
                                                v-for="field in [
                                                    {
                                                        id: 'name',
                                                        label: '顧客名',
                                                        type: 'text',
                                                    },
                                                    {
                                                        id: 'kana',
                                                        label: '顧客名カナ',
                                                        type: 'text',
                                                    },
                                                    {
                                                        id: 'tel',
                                                        label: '電話番号',
                                                        type: 'tel',
                                                    },
                                                    {
                                                        id: 'email',
                                                        label: 'メールアドレス',
                                                        type: 'email',
                                                    },
                                                    {
                                                        id: 'postcode',
                                                        label: '郵便番号',
                                                        type: 'text',
                                                    },
                                                    {
                                                        id: 'address',
                                                        label: '住所',
                                                        type: 'text',
                                                    },
                                                    {
                                                        id: 'birthday',
                                                        label: '誕生日',
                                                        type: 'date',
                                                    },
                                                ]"
                                                :key="field.id"
                                            >
                                                <div class="relative">
                                                    <label
                                                        :for="field.id"
                                                        class="text-sm leading-7 text-gray-600"
                                                    >
                                                        {{ field.label }}
                                                    </label>
                                                    <input
                                                        :type="field.type"
                                                        :id="field.id"
                                                        :name="field.id"
                                                        v-model="form[field.id]"
                                                        :inputmode="
                                                            field.id ===
                                                            'postcode'
                                                                ? 'numeric'
                                                                : null
                                                        "
                                                        @change="field.id === 'postcode' ? fetchAddress : null"  <!-- ★追加 -->
                                                        class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
                                                    />
                                                    <p
                                                        v-if="errors[field.id]"
                                                        class="mt-1 text-sm text-red-500"
                                                    >
                                                        {{ errors[field.id] }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label
                                                        for="memo"
                                                        class="text-sm leading-7 text-gray-600"
                                                        >メモ</label
                                                    >
                                                    <textarea
                                                        id="memo"
                                                        name="memo"
                                                        v-model="form.memo"
                                                        class="h-32 w-full resize-none rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
                                                    ></textarea>
                                                    <p
                                                        v-if="errors.memo"
                                                        class="mt-1 text-sm text-red-500"
                                                    >
                                                        {{ errors.memo }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label
                                                        class="text-sm leading-7 text-gray-600"
                                                        >性別</label
                                                    >
                                                    <div
                                                        class="mt-2 flex items-center space-x-4"
                                                    >
                                                        <label>
                                                            <input
                                                                type="radio"
                                                                id="gender0"
                                                                name="gender"
                                                                v-model="
                                                                    form.gender
                                                                "
                                                                value="0"
                                                            />
                                                            <span class="ml-1"
                                                                >男性</span
                                                            >
                                                        </label>
                                                        <label>
                                                            <input
                                                                type="radio"
                                                                id="gender1"
                                                                name="gender"
                                                                v-model="
                                                                    form.gender
                                                                "
                                                                value="1"
                                                            />
                                                            <span class="ml-1"
                                                                >女性</span
                                                            >
                                                        </label>
                                                        <label>
                                                            <input
                                                                type="radio"
                                                                id="gender2"
                                                                name="gender"
                                                                v-model="
                                                                    form.gender
                                                                "
                                                                value="2"
                                                            />
                                                            <span class="ml-1"
                                                                >その他</span
                                                            >
                                                        </label>
                                                    </div>
                                                    <p
                                                        v-if="errors.gender"
                                                        class="mt-1 text-sm text-red-500"
                                                    >
                                                        {{ errors.gender }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <button
                                                    type="submit"
                                                    class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none"
                                                >
                                                    顧客登録
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
