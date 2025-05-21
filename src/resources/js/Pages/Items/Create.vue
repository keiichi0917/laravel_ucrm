<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    errors: Object, // ← バリデーションエラー受け取り
});

const form = reactive({
    name: null,
    memo: null,
    price: null,
});

const storeItem = () => {
    Inertia.post('/items', form);
};
</script>

<template>
    <Head title="商品登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                商品登録
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="body-font relative text-gray-600">
                            <form @submit.prevent="storeItem">
                                <div class="container mx-auto px-5 py-8">
                                    <div class="mx-auto md:w-2/3 lg:w-1/2">
                                        <div class="-m-2 flex flex-wrap">
                                            <!-- 商品名 -->
                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label
                                                        for="name"
                                                        class="text-sm leading-7 text-gray-600"
                                                        >商品名</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="name"
                                                        name="name"
                                                        v-model="form.name"
                                                        class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
                                                    />
                                                    <p
                                                        v-if="errors.name"
                                                        class="mt-1 text-sm text-red-500"
                                                    >
                                                        {{ errors.name }}
                                                    </p>
                                                    <!-- ← エラー表示 -->
                                                </div>
                                            </div>

                                            <!-- メモ -->
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
                                                    <!-- ← エラー表示 -->
                                                </div>
                                            </div>

                                            <!-- 商品価格 -->
                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label
                                                        for="price"
                                                        class="text-sm leading-7 text-gray-600"
                                                        >商品価格</label
                                                    >
                                                    <input
                                                        type="number"
                                                        id="price"
                                                        name="price"
                                                        v-model="form.price"
                                                        class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
                                                    />
                                                    <p
                                                        v-if="errors.price"
                                                        class="mt-1 text-sm text-red-500"
                                                    >
                                                        {{ errors.price }}
                                                    </p>
                                                    <!-- ← エラー表示 -->
                                                </div>
                                            </div>

                                            <!-- 登録ボタン -->
                                            <div class="w-full p-2">
                                                <button
                                                    type="submit"
                                                    class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none"
                                                >
                                                    商品登録
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
