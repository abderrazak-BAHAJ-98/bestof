<template>
  <div class="container p-3">
    <div class="row">
      <div class="col-md-3">
        <categorais-said-bar :categorais="getAllCategorais" />
      </div>
      <div class="col-md-9" v-if="productIsLoaded">
        <div class="row m-md-4 m-sm-2">
          <div class="col-md-6 offset-md-4">
            <input
              class="form-control"
              v-model="searchWord"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
          </div>
          <button
            class="btn btn-outline-success col-md-2"
            @click="searchProduct"
          >
            Search
          </button>
        </div>
        <div class="row">
          <div
            class="col-md-4 col-lg-3"
            v-for="product in getAllProducts"
            :key="product.id"
          >
            <card-item :product="product" />
          </div>
        </div>
        <div div="row">
          <ul class="pagination pagination-lg justify-content-center">
            <li
              :class="
                getPaginationLinks.prev ? 'page-item' : 'disabled page-item'
              "
            >
              <button :class="clsPagination" @click="navigate(1)">
                <i class="fa-solid fa-angles-left"></i>
              </button>
            </li>
            <li
              :class="
                getPaginationLinks.prev ? 'page-item' : 'disabled page-item'
              "
            >
              <button :class="clsPagination" @click="navigate(2)">
                <i class="fa-solid fa-angle-left"></i>
              </button>
            </li>
            <li
              :class="
                getPaginationLinks.next ? 'page-item' : 'disabled page-item'
              "
            >
              <button :class="clsPagination" @click="navigate(3)">
                <i class="fa-solid fa-angle-right"></i>
              </button>
            </li>
            <li
              :class="
                getPaginationLinks.next ? 'page-item' : 'disabled page-item'
              "
            >
              <button :class="clsPagination" @click="navigate(4)">
                <i class="fa-solid fa-angles-right"></i>
              </button>
            </li>
          </ul>
        </div>
      </div>
      <loading-progress v-else />
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import LoadingProgress from "../components/Global/loadingProgress.vue";
import CardItem from "../components/shope/CardItem.vue";
import CategoraisSaidBar from "../components/shope/CategoraisSaidBar.vue";

export default {
  data: () => ({
    searchWord: "",
    dataCategory: "",
    clsPagination:
      "page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark",
  }),
  components: { CardItem, CategoraisSaidBar, LoadingProgress },
  computed: {
    ...mapGetters([
      "productIsLoaded",
      "getAllProducts",
      "getAllCategorais",
      "getPaginationLinks",
    ]),
  },
  methods: {
    navigate: function (index) {
      this.$store.dispatch("getProducts", index);
    },
    searchProduct: function () {
      if (this.searchWord) {
        this.$store.dispatch("searchProduct", this.searchWord);
      } else {
        this.$store.dispatch("getProducts", this.searchWord);
      }
    },
  },
};
</script>

<style scoped>
.disabled {
  opacity: 0.4;
}
</style>
