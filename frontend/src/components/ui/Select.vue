<template>
  <div class="w-full mt-1 flex">
    <select class="w-full p-0 appearance-none border-b-2"  @input="updateVal" v-model="content">
      <option :value="null">Все</option>
      <option v-for="item in options" :key="item">{{item}}</option>
    </select>
  </div>
</template>

<script>
export default {
    props: ['options', 'value'],
    data() {
      return {
        content: this.value
      }
    },
    methods: {
      updateVal() {
        this.$emit('input', this.content)
      }
    }
};
</script>

<style>
</style>