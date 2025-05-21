<script setup></script>

<template>
    <div
        v-if="$page.props.flash.status === 'success'"
        class="mb-4 rounded bg-blue-300 p-4 text-white"
    >
        {{ $page.props.flash.message }}
    </div>
</template>
