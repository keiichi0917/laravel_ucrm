<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ links: Array });
</script>
<template>
    <div v-if="links.length > 3">
        <div class="-mb-1 flex flex-wrap">
            <template v-for="(link, index) in links" :key="index">
                <div
                    v-if="link.url === null"
                    class="mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400"
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-blue-700 text-white': link.active }"
                    :href="link.url"
                    vhtml="link.label"
                />
            </template>
        </div>
    </div>
</template>
