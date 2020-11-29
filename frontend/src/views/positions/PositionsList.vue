<template>
  <div class="flex flex-col">
    <div class="flex flex-row items-center mb-5">
      <div class="divide-x divide-appdivider flex items-center space-x-4">
        <div class="text-2xl">Вакансии</div>
        <div class="pl-4 text-menugrey">сегодня {{ new Date() | moment("D.MM.YYYY") }}</div>
      </div>
      <div class="flex-grow"></div>
      <div class="flex h-full items-center border-b">
        <div
          class="px-4 py-2 font-medium border-b-2 border-appblue cursor-pointer"
        >
          Вакансии
        </div>
        <div
          class="p-4 px-4 py-2 font-medium border-b-2 cursor-pointer"
          @click="$router.push('/positions/candidates')"
        >
          Все кандидаты
        </div>
      </div>
    </div>
    <div class="flex">
      <div class="flex-grow posgrid gap-8 grid">
        <PositionListCard
          v-for="item in vacancies"
          :key="item.id"
          :item="item"
        />
      </div>
      <div class="pl-5">
        <div
          class="ml-3 rounded shadow-card h-auto w-500px bg-white p-5 flex flex-col space-y-6"
        >
          <div class="flex flex-col w-full">
            <div class="font-medium mb-2">Статус вакансии</div>
            <Select :value="null" />
          </div>
          <div class="flex flex-col w-full">
            <div class="font-medium">Подразделение</div>
            <Select v-model="filter.service" :options="services" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PositionListCard from "./PositionListCard";
import Select from "../../components/ui/Select";
export default {
  components: {
    PositionListCard,
    Select,
  },
  data() {
    return {
      filter: {
        service: null,
      },
    };
  },
  computed: {
    currentDate() {
      return "29.11.2020";
    },
    vacancies() {
      let data = this.$store.state.vacancies.items;
      if (this.filter.service) {
        data = data.filter((item) => item.department === this.filter.service);
      }
      return data;
    },
    services() {
      let data = this.$store.getters["vacancies/services"];

      return data;
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