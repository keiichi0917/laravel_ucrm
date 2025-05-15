<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
</script>

<template>
  <GuestLayout>
    <InputLable value="件名">タイトル</InputLable>
    <TextInput modelValue="初期値が入ります"></TextInput>
  </GuestLayout>
</template>