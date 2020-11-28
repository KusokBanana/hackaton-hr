<template>
  <div>
    <div class="p-3 pl-8 text-menugrey font-medium">{{ section.name }}</div>
    
    <MenuItem v-for="item in section.items" :key="item.path" :item="item"/>
  </div>
</template>

<script>
import MenuItem from "./MenuItem"
export default {
  components: {
    MenuItem
  },
  props: ["section"],
};
</script>

<style>
</style>