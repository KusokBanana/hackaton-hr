<template>
  <div class="flex flex-col">
    <div class="flex flex-row items-center mb-5">
      <div class="divide-x divide-appdivider flex items-center space-x-4">
        <div class="text-2xl">Все кандидаты на вакансию</div>
        <div
            class="pl-4 text-menugrey cursor-pointer"
            @click="$router.go(-1)"
          >
            назад
          </div>
      </div>
      <div class="flex-grow"></div>
      <div class="flex h-full items-center border-b">
        <div
          class="p-4 px-4 py-2 font-medium border-b-2 cursor-pointer"
          @click="$router.push('/positions')"
        >
          Вакансии
        </div>
        <div
          class="px-4 py-2 font-medium border-b-2 border-appblue cursor-pointer"
        >
          Все кандидаты
        </div>
      </div>
    </div>
    <div class="flex">
      <div class="flex-grow posgrid gap-8 grid">
        <CandidateListCard
          v-for="item in candidates"
          :maxfit="maxFit"
          :key="item.id"
          :data="item"
        />
      </div>
      <div class="pl-5">
        <div
          class="ml-3 rounded shadow-card h-auto w-500px bg-white p-5 flex flex-col space-y-6"
        >
          <div class="flex flex-col w-full">
            <div class="font-medium mb-2">Статус кандидата</div>
            <Select :value="null" />
          </div>
          <!-- <div class="flex flex-col w-full">
            <div class="font-medium">Подразделение</div>
            <Select v-model="filter.service" :options="services" />
          </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CandidateListCard from "./CandidateListCardVac";
import Select from "../../components/ui/Select";
import Api from '../../api/vacancies'
export default {
  components: {
    CandidateListCard,
    Select,
  },
  data() {
    return {
      filter: {
        service: null,
      },
      candidates: []
    };
  },
  computed: {
    // candidates() {
    //   let data = this.$store.state.candidates.items;

    //   return data;
    // },
    vacancy() {
        return this.$store.getters["vacancies/vacancy"](this.$route.params.id)
    },
    maxFit() {
        return Math.max(...this.candidates.map(item => item.fit))
    }
  },
  created() {
    this.$store.dispatch('vacancies/getVacancies')
    Api.relevance(this.$route.params.id).then((data) => {
        this.candidates = data.data.data
    })
  },
};
</script>

<style>
.posgrid {
  grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
}
</style>