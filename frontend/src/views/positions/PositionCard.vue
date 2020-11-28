<template>
  <div
    class="position-card flex flex-col bg-white bg-no-repeat bg-right-bottom rounded shadow-card p-5"
    :style="{
      'background-image': require('@/assets/images/cardbg.png'),
    }"
  >
    <div class="font-medium">{{item.title}}</div>
    <div class="text-positiongrey mt-3">{{item.department}}</div>
    <div class="flex-grow"></div>
    <div class="flex flex-row-reverse items-center">
      <div
        class="rounded-full text-white bg-appblue w-8 h-8 font-medium text-md flex items-center justify-center"
      >
        <span class="text-shadow">{{item.processed_count + item.unprocessed_count}}</span>
      </div>
      <div class="mx-3 font-medium text-md">+{{item.unprocessed_count}}</div>
    </div>
  </div>
</template>

<script>
export default {
    props:['item'],
  computed: {
    styles() {
      return {
        "background-image": require("@/assets/images/cardbg.png"),
      };
    },
  },
};
</script>

<style>
.position-card {
  min-width: 330px;
  min-height: 140px;
}
</style>