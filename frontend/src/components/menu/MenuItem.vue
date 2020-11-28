<template>
  <div
    class="flex p-3 pl-8 items-center cursor-pointer text-apptext"
    :style="blockStyle"
    @click="pushRoute"
  >
    <div><img :src="require(`@/assets/icons/${this.item.path}.svg`)" /></div>
    <div class="ml-4">{{ item.name }}</div>
  </div>
</template>

<script>
export default {
  props: ["item"],
  computed: {
    isActive() {
      return this.$route.path.startsWith(`/${this.item.path}`);
    },
    blockStyle() {
      let styles = {};
      if (this.isActive) {
        styles["border-left"] = `4px solid #${this.item.borderActive}`;
        styles["background-color"] = `#${this.item.bgActive}`;
        styles["color"] = `#${this.item.fontActive}`;
      }
      return styles;
    },
  },

  methods: {
    pushRoute() {
      if (!this.isActive) {
        this.$router.push(`/${this.item.path}`);
      }
    },
  },
};
</script>

<style>
</style>