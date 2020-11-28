<template>
  <div class="flex flex-col">
    <div
      class="flex flex-row items-center divide-x divide-appdivider space-x-4 mb-5"
    >
      <div class="text-2xl">Вакансии</div>
      <div class="pl-4 text-menugrey">сегодня {{ currentDate }}</div>
      <div class="flex-grow"></div>
    </div>
    <div class="flex">
      <div class="flex-grow posgrid gap-8 grid">
        <PositionCard v-for="item in vacancies" :key="item.id" :item="item" />
      </div>
      <div class="pl-5">
        <div
          class="ml-3 rounded shadow-card h-auto w-500px bg-white p-5 flex flex-col space-y-6"
        >
          <div class="flex flex-col w-full">
            <div class="font-medium mb-2">Статус вакансии</div>
            <Select />
          </div>
          <div class="flex flex-col w-full">
            <div class="font-medium">Подразделение</div>
            <Select v-model="filter" :options="services"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PositionCard from "./PositionCard";
import Select from "../../components/ui/Select";
export default {
  components: {
    PositionCard,
    Select,
  },
  data() {
    return {
        filter: {
            service: null
        }
    }
  },
  computed: {
    currentDate() {
      return "29.11.2020";
    },
    vacancies() {
      return this.$store.state.vacancies.items;
    },
    services() {
      return this.$store.getters["vacancies/services"];
    },
  },
  created() {
    this.$store.dispatch("vacancies/getVacancies");
  },
};
</script>

<style>
.posgrid {
  grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
}
</style>