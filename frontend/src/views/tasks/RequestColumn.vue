<template>
  <div class="bg-white shadow-card rounded px-8 py-5">
    <div class="w-full flex flex-col shadow-bottom pb-3">
      <div class="flex">
        <div class="text-appblue font-medium">Запросы</div>
        <div class="ml-3 text-menugrey">{{procApps}} из {{totalApps}}</div>
        <div class="flex-grow"></div>
        <div class="text-pickergrey">
          Показывать:
          <select class="text-appblue w-auto">
            <option>Все</option>
            <option selected>Отработанные</option>
          </select>
        </div>
      </div>
      <Progress :progress="procApps/totalApps*100" />
    </div>
    <div class="w-full space-y-4 mt-3">
      <Card v-for="item in vacancies" :key="item.id" :item="item" />
    </div>
  </div>
</template>

<script>
import Progress from "../../components/ui/Progress.vue";
import Card from "./RequestCard";
export default {
  components: {
    Progress,
    Card,
  },
  computed: {
    vacancies() {
      return this.$store.state.vacancies.items;
    },
    procApps() {
      return this.vacancies.reduce((sum, item) => {
        return sum + item.processed_count;
      }, 0);
    },
    unprocApps() {
      return this.vacancies.reduce((sum, item) => {
        return sum + item.unprocessed_count;
      }, 0);
    },
    totalApps() {
      return this.procApps + this.unprocApps;
    },
  },
};
</script>

<style>
</style>