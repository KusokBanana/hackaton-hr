<template>
  <div class="w-full mt-1 flex">
    <select class="w-full p-0 appearance-none border-b-2">
      <option value="">Все</option>
      <option :value="item" v-for="item in options" :key="item">{{item}}</option>
    </select>
  </div>
</template>

<script>
export default {
    props: ['options']
};
</script>

<style>
</style>