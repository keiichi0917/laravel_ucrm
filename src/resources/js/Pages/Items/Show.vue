<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    item: Object,
});
</script>

<template>
    <Head title="商品詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                商品詳細
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="body-font relative text-gray-600">
                            <div class="container mx-auto px-5 py-8">
                                <div class="mx-auto md:w-2/3 lg:w-1/2">
                                    <div class="-m-2 flex flex-wrap">
                                        <!-- 商品名 -->
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label
                                                    class="text-sm leading-7 text-gray-600"
                                                    >商品名</label
                                                >
                                                <div
                                                    class="w-full rounded border border-gray-300 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700"
                                                >
                                                    {{ item.name }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- メモ -->
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label
                                                    class="text-sm leading-7 text-gray-600"
                                                    >メモ</label
                                                >
                                                <div
                                                    class="h-32 w-full resize-none rounded border border-gray-300 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700"
                                                >
                                                    {{ item.memo }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 商品価格 -->
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label
                                                    class="text-sm leading-7 text-gray-600"
                                                    >商品価格</label
                                                >
                                                <div
                                                    class="w-full rounded border border-gray-300 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700"
                                                >
                                                    {{ item.price }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ステータス -->
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label
                                                    class="text-sm leading-7 text-gray-600"
                                                    >ステータス</label
                                                >
                                                <div
                                                    class="w-full rounded border border-gray-300 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700"
                                                >
                                                    <span
                                                        v-if="
                                                            item.is_selling ===
                                                            1
                                                        "
                                                        >販売中</span
                                                    >
                                                    <span v-else>停止中</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
