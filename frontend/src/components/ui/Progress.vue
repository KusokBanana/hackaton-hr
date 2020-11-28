<template>
  <div class="mt-3 w-100 bg-progress h-progress">
      <div class="bg-appblue rounded h-full" :style="style"></div>
  </div>
</template>

<script>
export default {
    props: ['progress'],
    computed: {
        style() {
            return {
                width: `${this.progress}%`
            }
        }
    }
}
</script>

<style>

</style>