<template>
  <div
    class="cursor-pointer px-4 h-8 flex items-center text-shadow text-white bg-appred rounded"
    :style="styles"
  >
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ["classes", "color"],
  computed: {
    styles() {
      let rgb = this.hexToRgb(this.color);
      return {
        "box-shadow": `0px 2px 6px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.4)`,
        "background-color": `#${this.color}`
      };
    },
  },
  methods: {
    hexToRgb(hex) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result
        ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16),
          }
        : null;
    },
  },
};
</script>

<style>
</style>