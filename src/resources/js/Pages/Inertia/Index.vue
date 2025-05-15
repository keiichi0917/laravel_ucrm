<script setup>

import { Link } from '@inertiajs/vue3';

defineProps({
  blogs: Array
})
</script>

<template>
  <!--  <pre>{{ $page.props }}</pre> -->
  <!-- フラッシュメッセージ -->
  <div v-if="$page.props.flash.message" class="bg-blue-300 text-black p-2 rounded mb-4">
    {{ $page.props.flash.message }}
  </div>

  <!-- ブログ一覧 -->
  <ul v-if="blogs && blogs.length">
    <li v-for="blog in blogs" :key="blog.id" class="mb-2">
      <strong>件名：
        <Link class="text-blue-400" :href="route('inertia.show', { id: blog.id })">
        {{ blog.title }}
        </Link>
      </strong><br>
      <strong>本文：</strong> {{ blog.content }}
    </li>
  </ul>
  <div v-else class="text-gray-500">記事がありません。</div>

  <!-- その他 -->
  <div class="mt-6">
    <h1>ああああ</h1>
  </div>
</template>