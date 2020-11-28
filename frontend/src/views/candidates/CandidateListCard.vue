<template>
  <div
    class="position-card flex flex-col bg-white bg-no-repeat bg-right-bottom rounded shadow-card p-5"
  >
    <div
      class="font-medium cursor-pointer"
      @click="$router.push({ name: 'Resume', params: { id: item.id } })"
    >
      {{ item.name }}
    </div>
    <!-- <div class="text-positiongrey mt-3">{{ item.department }}</div> -->
    <div class="flex mt-3">
      <div class="" :style="{ color: relColor }">
        {{ item.most_relevant.fit }}%
      </div>
      <div class="text-candidategrey ml-2">Вакансия</div>
    </div>
    <div class="flex-grow"></div>
    <div class="flex items-center">
      <div class="flex-grow flex overflow-hidden h-8 space-x-3 mr-8">
        <div
          class="border p-3 rounded flex items-center whitespace-nowrap"
          v-for="skill in item.skills"
          :key="skill.id"
        >
          {{ skill.name }}
        </div>
      </div>
      <div
        class="rounded-full text-white bg-appblue w-8 h-8 font-medium text-md flex items-center justify-center"
      >
        <span class="text-shadow">{{ NaN }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["item", "maxfit"],
  computed: {
    relColor() {
      if (this.item.most_relevant.fit > this.maxfit * (2 / 3)) {
        return "#86B44D";
      }
      if (this.item.most_relevant.fit > this.maxfit * (1 / 3)) {
        return "#FFB72C";
      }
      return "#FF4E58";
    },
  },
};
</script>

<style>
.position-card {
  min-width: 330px;
  min-height: 140px;
  background-image: url("~@/assets/images/cardbg.png");
}
</style>