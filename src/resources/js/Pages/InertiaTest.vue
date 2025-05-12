<script setup>
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
  title: '',
  content: ''
})

function submit() {
  form.post(route('inertia.store'))
}
</script>

<template>
  Inertiaテストです。<br>
  <a href="/">aタグ経由です</a><br>
  <Link href="/">Link経由です</Link><br>
  <Link :href="route('inertia.index')">名前付きルートの確認です</Link><br>
  <Link :href="route('inertia.show', { id: 1 })">ルートパラメータのテストです</Link>

  <div class="mb8"></div>
  <input type="text" v-model="form.title" placeholder="タイトルを入力" /><br>
  <input type="text" v-model="form.content" placeholder="内容を入力" /><br>
  <button @click="submit">DB保存テスト</button>
</template>