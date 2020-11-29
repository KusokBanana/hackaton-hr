import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  { path: "/", redirect: "/login" },
  {
    path: "/login",
    redirect: "/tasks",
    // component: LoginPage,
    // name: "Login",
    // meta: { isPublic: true },
  },
  {
    path: "/tasks",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/tasks/TaskList.vue"),
  },
  {
    path: "/positions",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/positions/PositionsList.vue"),
  },
  {
    path: "/positions/candidates",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/candidates/CandidatesList.vue"),
  },
  {
    path: "/positions/:id/candidates",
    name: "Position Candidates",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/candidates/CandidatesVacancyList.vue"),
  },
  {
    path: "/resume/:id/",
    name: "Resume",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/resume/ResumeCard.vue"),
  },
  {
    path: "/position/add",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/positions/PositionCreator.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
